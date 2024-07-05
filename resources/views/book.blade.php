<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- SEO Meta Tags -->
        <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
        <meta name="author" content="Inovatik">

        <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
        <meta property="og:site_name" content="" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta property="og:type" content="article" />

        <!-- Website Title -->
        <title>Book Ticket</title>

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

            input{
                color: white;
            }

        </style>
    </head>
<body>

    <div class="container orders">
        <h1 class="text-center pt-2 pb-5 white">Book Ticket for {{ $destination->title }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="col-lg-6 m-auto pt-10">
            <form action="{{ route('book.ticket.post', $destination->id) }}" method="POST" data-toggle="validator" data-focus="false">
                @csrf
                <div class="form-group">
                    <label for="name" class="white">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <label for="email" class="white">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required value="{{ Auth::user()->email }}">
                </div>

                <div class="form-group">
                    <label for="quantity" class="white">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="wt form-control" min="1" required>
                </div>

                <button type="submit" class="btn btn-primary">Book Now</button>
                <a href="{{ route ('test') }}" type="submit" class="btn btn-danger" style="text-decoration: none">Cancel</a>
            </form>
        </div>
    </div>


 <!-- Scripts -->
 <script src="{{ asset('js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
 <script src="{{ asset('js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
 <script src="{{ asset('js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
 <script src="{{ asset('js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
 <script src="{{ asset('js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
 <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
 <script src="{{ asset('js/morphext.min.js') }}"></script> <!-- Morphtext rotating text in the header -->
 <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> <!-- Isotope for filter -->
 <script src="{{ asset('js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
 <script src="{{ asset('js/scripts.js') }}"></script> <!-- Custom scripts -->

</body>
</html>
