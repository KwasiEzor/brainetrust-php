<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{-- <link rel="stylesheet" href="node_modules/swiper/swiper.bundle.min.css"> --}}
<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md app-navbar navbar-primary shadow-sm bg-white" id="navbar_top">
            <div class="container-xl">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{ asset('images/logo-braine.svg') }}" class="logo-braine" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon">
                        <i class="bi bi-list fs-1"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto nav-menu">
                        <li class="nav-item">
                            <a href="{{ route('home-page') }}" aria-current="page" class="nav-link" >Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('agendas.index') }}" class="nav-link">Agendas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('scrabble-page') }}" class="nav-link">Scrabble</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Compétitions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('scgames.index')}}">Amicales</a></li>
                                <li><a class="dropdown-item" href="{{route('interclubs.index')}}">Interclubs</a></li>
                                <li><a class="dropdown-item" href="{{route('rankings.index')}}">Classements</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('clubs.index') }}">Liste des Clubs</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Notre Club
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('about-page') }}">A propos</a></li>
                                <li><a class="dropdown-item" href="{{ route('users.index') }}">Membres</a></li>

                               
                                <li>
                                    <a class="dropdown-item" href="{{route('abonnement.index')}}">Abonnement</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('infos')}}">Infos pratiques</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact-page') }}" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link">Blog</a>
                        </li>
                        @if(!Auth::guest())
                        <li class="nav-item ">
                            <a href="{{ url('/chatify') }}" class="nav-link chat-link d-flex align-items-center justify-content-center gap-1">Chat <i class="bi bi-chat-text-fill"></i></a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link register-link" href="{{ route('register') }}" >{{ __('S\'inscrire') }}</a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link login-link"  href="{{ route('login') }}"><i class="bi bi-person-circle"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        
                                        @can('admin')                          
                                            <li>
                                                <a href="{{ route('admin-dashboard') }}" class="dropdown-item"> {{ __('Admindashbord') }}</a>
                                            </li> 
                                        @endcan
                                  
                                    <li>
                                        <a href="{{ route('home') }}" class="dropdown-item"> {{ __('Mon compte') }}</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ url('/chatify') }}" class="dropdown-item"> {{ __('Chat') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="" style="min-height: 100vh;">
            @yield('content')
        </main>
        @include('inc.app-widgets')
        @include('inc.scrolltop-btn')
        @include('inc.footer')
           
        @include('cookie-consent::index')
        
    </div>
    @yield('stripe-payment-js')
    <script src="{{ asset('js/index.js') }}"></script>
    {{-- <script src="node_modules/swiper/swiper.bundle.min.js"></script> --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
         let swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        autoplay: {
            delay: 5000,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function () {
                    if ($(this).scrollTop() > 50) {
                        $('#back-to-top').fadeIn();
                    } else {
                        $('#back-to-top').fadeOut();
                    }
                });
                // scroll body to 0px on click
                $('#back-to-top').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 400);
                    return false;
                });
        });
        </script>
</body>

</html>
