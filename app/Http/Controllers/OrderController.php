<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function order()
    {
        $orders = Order::with('destination')->get();
        return view('order', compact('orders'));
    }

}
