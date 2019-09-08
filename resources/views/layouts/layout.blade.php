<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
        <script src="https://kit.fontawesome.com/9fa0f078e1.js"></script>
        <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/main.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,500,600|Roboto:400,700" rel="stylesheet">
    </head>
    <body>
	    <div class="preloader-area">
            <div class="loader-box">
                <div class="loader"></div>
            </div>
        </div>
	    <header id="header">
            <div class="container">
                <div class="main-menu">
                    <div id="logo">
                        <a href="{{ route('index') }}"><img src="{{ url('img/logo.svg') }}" width="150px" alt="logo" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="nav-link"><a class="{{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
                            <li class="nav-link"><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('aboutMe.index') }}">About</a></li>
                            <li class="nav-link menu-has-children"><a style="cursor:pointer;">Projects</a>
                                <ul>
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('projects.categories', $category->url) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a class="{{ request()->routeIs('blog.index') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a></li>
                            <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
         @yield('content')
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>About Me</h6>
                            <p>I am someone who hopes to get ahead with effort</p>
                        </div>
                    </div>
                    <div class="col-lg-5  col-md-6 col-sm-6"></div>
                    <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                        <div class="single-footer-widget">
                            <h6>Follow Me</h6>
                            <p>Let me be social</p>
                            <div class="footer-social d-flex align-items-center">
                                <a href="https://www.youtube.com/channel/UCAzvFEr5UVf4FDcTgL2Rafg?view_as=subscriber" target="_blank"><i class="ti-youtube"></i></a>
                                <a href="https://www.github.com/moncadayunuen/" target="_blank"><i class="ti-github"></i></a>
                                <a href="https://www.linkedin.com/in/yunuen-moncada/" target="_blank"><i class="ti-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by YM23</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->
        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/easing.min.js') }}"></script>
        <script src="{{ asset('js/hoverIntent.js') }}"></script>
        <script src="{{ asset('js/superfish.min.js') }}"></script>
        <script src="{{ asset('js/mn-accordion.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
