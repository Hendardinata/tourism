<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Order;
use Midtrans\Config;
use Midtrans\Snap;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TicketController extends Controller
{
    public function showBookingForm($id)
    {
        $destination = Destination::findOrFail($id);
        return view('book', compact('destination'));
    }

    // Membuat data order sementara

    public function bookTicket(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'quantity' => 'required|integer|min:1'
        ]);

        $destination = Destination::findOrFail($id);

        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->quantity = $request->input('quantity');
        $order->destination_id = $destination->id;
        $order->total_price = $destination->price * $request->input('quantity');
        $order->save();

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Payload untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->name,
                'email' => $order->email,
            ],
            'item_details' => [
                [
                    'id' => $destination->id,
                    'price' => $destination->price,
                    'quantity' => $order->quantity,
                    'name' => $destination->title,
                ],
            ],
        ];

        // Mendapatkan snap token dari Midtrans
        $snapToken = Snap::getSnapToken($params);

        return view('payment', compact('snapToken', 'order'));
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $order_id = $request->order_id;
        $status_code = $request->status_code;
        $gross_amount = $request->gross_amount;
        $transaction_status = $request->transaction_status;
        $status_message = $request->status_message;

        $calculated_signature_key = hash("sha512", $order_id . $status_code . $gross_amount . $serverKey);

        if ($calculated_signature_key) {

        $order = Order::findOrFail($order_id);

        // Update status pembayaran dan atribut lainnya berdasarkan respons dari Midtrans
        if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
            $order->status = 'paid';
            $order->payment_status = $transaction_status; // Update status pembayaran
            $order->payment_status_message = $status_message; // Pesan status pembayaran
        } elseif ($transaction_status == 'deny' || $transaction_status == 'expire' || $transaction_status == 'cancel') {
            $order->status = 'rejected';
            $order->payment_status = $transaction_status; // Update status pembayaran
            $order->payment_status_message = $status_message; // Pesan status pembayaran
        } else {

            $order->status = 'pending'; // Atur status default atau sesuai kebutuhan
            $order->payment_status = $transaction_status; // Update status pembayaran
            $order->payment_status_message = $status_message; // Pesan status pembayaran
        }

        $order->save();

        $pdf = PDF::loadView('pdf.invoice', ['order' => $order]);
        return $pdf->download('invoice-' . $order->id . '.pdf');
    }
}

}
