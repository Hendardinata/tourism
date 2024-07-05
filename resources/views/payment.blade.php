<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

     <!-- Styles -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
     <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
     <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
     <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
     <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <style>
        body {
            background-image: url('{{ asset('images/forest.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            /* background-color: #153e52; */
        }
        .orders {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        button{
            outline: none;
            border: none;
        }

    </style>

    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="card orders" style="width: 18rem;">
        <img src="{{ asset('images/tourism1.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Let's quickly complete your payment to start enjoying your vacation right away.</p>
          <button id="pay-button" class="btn btn-info">Pay Now</button>
        </div>
    </div>

    <form action="{{ route('payment.callback') }}" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="order_id" id="order_id">
        <input type="hidden" name="status_code" id="status_code">
        <input type="hidden" name="gross_amount" id="gross_amount">
        <input type="hidden" name="transaction_status" id="transaction_status">
        <input type="hidden" name="status_message" id="status_message">
    </form>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    send_response_to_form(result);
                },
                onPending: function(result) {
                    send_response_to_form(result);
                },
                onError: function(result) {
                    send_response_to_form(result);
                },
                onClose: function() {
                    alert('You closed the popup without finishing the payment');
                }
            });
        });

        function send_response_to_form(result){
            console.log(result);
            document.getElementById('order_id').value = result.order_id;
            document.getElementById('status_code').value = result.status_code;
            document.getElementById('gross_amount').value = result.gross_amount;
            document.getElementById('transaction_status').value = result.transaction_status;
            document.getElementById('status_message').value = result.status_message;
            document.getElementById('submit_form').submit();
        }
    </script>
</body>
</html>
