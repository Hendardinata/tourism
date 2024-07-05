<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan gaya kustom di sini */
        .invoice-container {
            margin-top: 50px;
        }
        .invoice-header {
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container invoice-container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Invoice</h1>
                <hr>
            </div>
        </div>
        <div class="row invoice-header">
            <div class="col-md-6">
                <h5>ID Pesanan: {{ $order->id }}</h5>
                <h5>Nama Pemesan: {{ $order->name }}</h5>
                <h5>Nama Destinasi: {{ $order->destination->title }}</h5>
            </div>
            <div class="col-md-6 text-right">
                <h5>Tanggal: {{ date('d-m-Y') }}</h5>
            </div>
        </div>
        <div class="row invoice-details">
            <div class="col-12">
                <h5>Status Pembayaran:</h5>
                <ul class="list-group">
                    <li class="list-group-item">Status: {{ $order->status }}</li>
                    <li class="list-group-item">Kode Status: {{ $order->payment_status }}</li>
                    <li class="list-group-item">Pesan Status: {{ $order->payment_status_message }}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5>Jumlah: {{ $order->quantity }}</h5>
            </div>
        </div>
        <!-- Tambahkan detail pesanan lainnya di sini -->
        <div class="row invoice-footer">
            <div class="col-12 text-center">
                <p>Terima kasih telah berbelanja dengan kami!</p>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
