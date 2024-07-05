<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">

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
</head>
<body>
    {{-- <nav class="navbar navbar-expand-custom navbar-mainbg">
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav ml-auto" style="margin: auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('test') }}"><i class="far fa-address-book"></i>Destination</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="far fa-chart-bar"></i>Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('register') }}"><i class="far fa-copy"></i>Register</a>
                </li>
            </ul>
        </div>
    </nav> --}}

    @extends('template.navbar')

    <section class="hold-transition login-page header" style="background-color: #fff">
        <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-lightblue">
            <div class="card-header text-center">
            <a class="h1">
                <img src="{{ asset('/lte/dist/img/tourism1.png') }}" alt="Tourism Logo" class="brand-image img-circle elevation-3" width="150" >
                <p class="brand-text font-weight-light mt-3">Tourism App Register</p>
            </a>
            </div>
            <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('register_proses') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                    </div>
                </div>
                @error('name')
                    <small>{{ $message }}</small>
                @enderror
                <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
                <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </section>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ $message }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
@endif

@if ($message = Session::get('failed'))
    <script>
        Swal.fire({
        position: "center",
        icon: "error",
        title: "{{ $message }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
@endif

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>

// ---------Responsive-navbar-active-animation-----------
function test(){
	var tabsNewAnim = $('#navbarSupportedContent');
	var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
	var activeItemNewAnim = tabsNewAnim.find('.active');
	var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
	var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
	var itemPosNewAnimTop = activeItemNewAnim.position();
	var itemPosNewAnimLeft = activeItemNewAnim.position();
	$(".hori-selector").css({
		"top":itemPosNewAnimTop.top + "px",
		"left":itemPosNewAnimLeft.left + "px",
		"height": activeWidthNewAnimHeight + "px",
		"width": activeWidthNewAnimWidth + "px"
	});
	$("#navbarSupportedContent").on("click","li",function(e){
		$('#navbarSupportedContent ul li').removeClass("active");
		$(this).addClass('active');
		var activeWidthNewAnimHeight = $(this).innerHeight();
		var activeWidthNewAnimWidth = $(this).innerWidth();
		var itemPosNewAnimTop = $(this).position();
		var itemPosNewAnimLeft = $(this).position();
		$(".hori-selector").css({
			"top":itemPosNewAnimTop.top + "px",
			"left":itemPosNewAnimLeft.left + "px",
			"height": activeWidthNewAnimHeight + "px",
			"width": activeWidthNewAnimWidth + "px"
		});
	});
}
$(document).ready(function(){
	setTimeout(function(){ test(); });
});
$(window).on('resize', function(){
	setTimeout(function(){ test(); }, 500);
});
$(".navbar-toggler").click(function(){
	$(".navbar-collapse").slideToggle(300);
	setTimeout(function(){ test(); });
});



// --------------add active class-on another-page move----------
jQuery(document).ready(function($){
	// Get current path and find target link
	var path = window.location.pathname.split("/").pop();

	// Account for home page with empty path
	if ( path == '' ) {
		path = 'index.html';
	}

	var target = $('#navbarSupportedContent ul li a[href="'+path+'"]');
	// Add active class to target link
	target.parent().addClass('active');
});


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

</script>


</body>
</html>
