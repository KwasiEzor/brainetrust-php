<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

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
    <script defer src="https://unpkg.com/scrollreveal"></script>

    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
      {{-- <!-- Tempus Dominus JavaScript -->
    <script defer src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"
        crossorigin="anonymous"></script>
      
      <!-- Tempus Dominus Styles -->
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css"
        rel="stylesheet" crossorigin="anonymous"> --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md app-navbar navbar-primary  shadow-sm bg-white" id="navbar_top">
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
                            <a href="{{ route('home-page') }}" aria-current="page" class="nav-link text-primary" >Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('agendas.index') }}" class="nav-link text-primary">Agendas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('scrabble-page') }}" class="nav-link text-primary">Scrabble</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-primary dropdown-toggle" href="#" id="navbarDropdown" role="button"
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
                            <a class="nav-link text-primary dropdown-toggle" href="#" id="navbarDropdown" role="button"
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
                            <a href="{{ route('contact-page') }}" class="nav-link text-primary">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link text-primary">Blog</a>
                        </li>
                        @if(!Auth::guest())
                        <li class="nav-item ">
                            <a href="{{ url('/chatify') }}" target="_blank" class="nav-link text-primary chat-link d-flex align-items-center justify-content-center gap-1">Chat <i class="bi bi-chat-text-fill"></i></a>
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
                                    <a class="nav-link text-primary login-link"  href="{{ route('login') }}"><i class="bi bi-person-circle"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link text-primary dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a href="{{ route('home') }}" class="dropdown-item"> {{ __('Mon compte') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/chatify') }}" target="_blank" class="dropdown-item"> {{ __('Chat') }}</a>
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
    


    @stack('custom-script')
    @yield('stripe-payment-js')
    @livewireScripts
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        ScrollReveal().reveal('.page-title',{
            delay:500
        });
    </script>
   
    
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
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
       
       
</body>

</html>
