<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JOBS | Insign Africa') }}</title>
    @notifyCss
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Styles -->   
    {{-- @notifyCss --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .nav-btn{
            border: 1px solid #18224F !important;
            color: #18224F !important;
            border-radius: 18px !important; 
            padding: 5px 15px !important;
            transition: .3s !important;
        }

        .nav-btn:hover{
            box-shadow: 8px 6px #18224F;
            transition: .3s;
        }

        .logo-nav{
            width: 130px;
        }

        .front-nav .nav-item a{
            font-size: 16px
        }

        .banner {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            height: 28vh !important;
            background: #18224F;
            background: linear-gradient(to right,#223EA5,#18224F);
            padding: 50px;
            border-radius: 18px;
            color: #fff;
        }
        
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset("js/perso.js") }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <div class="logo-nav">
                    <img src="{{ asset("logo-insign.png") }}" alt="logo Insign" srcset="">
                </div>
                <div class="collapse navbar-collapse front-nav" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link dropdown" href="{{ route('login') }}">Qui sommes-nous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown" href="{{ route('login') }}">Nos métiers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown" href="{{ route('login') }}">Postuler à une offre</a>
                        </li>
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link btn nav-btn" href="{{ route('login') }}">{{ __('Déposer une candidature spontannée') }}</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Bonjour, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Mon dashboard') }}
                                    </a>
                                </div>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main>
            @include('notify::components.notify')
            @yield('content')
        </main>
    </div>
    <script>
        var contrat = document.querySelector('.articles-contrat');
if (contrat != '') {
    contrat.addEventListener('change', function () {
        var valeurContrat = contrat.value;
        var dateE = document.querySelector('#date_em').value;
        var refOffre = document.querySelector('#reference_offre');
        var fonctionElement = document.querySelector('.articles-fonction');
        
        // Vérifier si l'élément .articles-fonction existe
        if (fonctionElement) {
            var fonction = fonctionElement.value;
            refOffre.value = valeurContrat + "-" + fonction.replace(/" "/g, "") + "-" + dateE;
        } else {
            console.error('Element .articles-fonction introuvable.');
        }
    });
}

    </script>
    @notifyJs
</body>
</html>
