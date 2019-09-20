<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
        <script src="https://kit.fontawesome.com/9fa0f078e1.js"></script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css')}}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('./css/owl.carousel.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,500,600|Nunito" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-67819237-4"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-67819237-4');
        </script>
    </head>
    <body>
        <nav class="nav-menu {{ request()->routeIs('index') ? '' : 'bg-dark' }}">
            <a href="{{ route('index') }}" class="logo"><img src="{{ url('img/logo.svg') }}" alt="Page logo" width="130px"></a>
            <ul class="menu">
                <li><a class="{{ request()->routeIs('index') ? 'link-active' : '' }}" href="{{ route('index') }}">Inicio</a></li>
                <li><a class="{{ request()->routeIs('about') ? 'link-active' : '' }}" href="{{ route('about') }}">Sobre mí</a></li>
                <li><a class="{{ request()->routeIs('projects.index') ? 'link-active' : '' }}" href="{{ route('projects.index') }}">Proyectos</a></li>
                <li><a class="{{ request()->routeIs('blog.index') ? 'link-active' : '' }}" href="{{ route('blog.index') }}">Blog</a></li>
                <li><a class="{{ request()->routeIs('contact') ? 'link-active' : '' }}" href="{{ route('contact') }}">Contacto</a></li>
            </ul>
            <button class="burger">
                <div class="line-burger-one"></div>
                <div class="line-burger-two"></div>
                <div class="line-burger-three"></div>
            </button>
        </nav>
         @yield('content')
        <div class="line-footer"></div>
        <footer>
            <div class="brand-page">
            <a href=""><img src="{{ asset('img/logo.svg') }}" width="100px" alt="Page logo"></a>
            <p>Tengo muchos desafíos por delante, pienso cómo enfrentarlos</p>
            </div>
            <div class="box-social-media">
            <div class="title-social-media"><h4>Sígueme</h4></div>
            <ul class="social-media">
                <li><a href="https://www.github.com/moncadayunuen/" target="_blank"><i class="fab fa-github"></i></a></li>
                <li><a href="https://www.linkedin.com/in/yunuen-moncada/"  target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCAzvFEr5UVf4FDcTgL2Rafg?view_as=subscriber"  target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
            </div>
            
        </footer>
        <div class="info-footer">Copyright ©2019 All rights reserved | This template was made by YM23</div>
        @stack('js-scripts')
        <script src="{{ asset('./js/main.js') }}"></script>
        @stack('scripts')
    </body>
</html>
