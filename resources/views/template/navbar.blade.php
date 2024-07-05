    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        {{-- <a class="navbar-brand logo-image" href="index.html"><img src="{{ asset('images/logo.svg') }}" alt="alternative"></a> --}}
        <a class="navbar-brand logo-image" href="index.html"><img src="{{ asset('images/tourism-title.png') }}" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ route('test') }}">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#intro">INTRO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#callMe">CALL ME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#projects">PROJECTS</a>
                </li>

                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">CONTACT</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('register') }}">REGISTER</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        LOGOUT
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                        @csrf
                    </form>
                @endauth

            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="#your-link">
                        <span class="hexagon"></span>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="#your-link">
                        <span class="hexagon"></span>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
