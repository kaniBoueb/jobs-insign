<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
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

        #app{
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }
        i{
            font-size: 16px !important;
            padding: 2px 7px;
            /* color: #fff */
        }
        .content{
            display: flex;
            justify-content: space-between;
            /* background: red; */
            height: 100%;
            overflow: hidden;
        }

        .left-part{
            display: block;
            position: relative;
            height: 100%;
            background: #f8fafc;
            width: 300px;
            padding: 20px 0;
            padding-right: 30px;
            /* box-shadow: 0px 0px 0 1px rgba(0, 0, 0, 0.2); */
        }

        .right-part {
            position: relative;
            width: calc(100% - 300px);
            display: block;
            background: #fff;
        }

        ul, li {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar .side{
            display: flex;
            /* justify-content: start; */
            align-items: center;
            padding: 12px 20px;
            margin: 3px 0;
        }

        .sidebar i {
            font-size: 24px;
            color: #222c56;
            padding: 6px 10px;
            border: 1px solid #222c56;
            border-radius: 5px;
            margin-right: 20px;
            box-shadow: 2px 2px 0 0;
        }

        .sidebar a{
            color: #222c56;
            text-decoration: none;
            font-size: 16px;
        }

        hr {
            color: #aaa !important;
        }

        .side:hover {
            background: #fff;
            border-radius: 18px;
            box-shadow: 2px 2px 2px 0px #eee;
        }

    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset("js/perso.js") }}"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $('#date_em').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                closeText: 'Fermer',
                prevText: 'Précédent',
                nextText: 'Suivant',
                currentText: 'Aujourd\'hui',
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
                dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
                dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                weekHeader: 'Sem.'
            });
            $('#date_ec').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                closeText: 'Fermer',
                prevText: 'Précédent',
                nextText: 'Suivant',
                currentText: 'Aujourd\'hui',
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
                dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
                dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                weekHeader: 'Sem.'
            });
            }
        );
    </script>
</head>
<body>
    <div id="app" style="overflow: hidden">
        <div class="content">
            <div class="left-part">
                @include('dashboard.sidebar.sidebar')
            </div>
            <div class="right-part">
                @include('notify::components.notify')
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container-fluid">
                        <a class="navbar-brand upper fw-bold" href="{{ url('/home') }}">
                            <span class="text-primary fw-bold">JOBS.</span>INSIGN
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Gerer les offres
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('offre.create') }}">Ajouter une offre</a></li>
                                        <li><a class="dropdown-item" href="{{ route('offre.index') }}">Lister les offres</a></li>
                                        <hr>
                                        <li><a class="dropdown-item" href="{{ route('all.postes') }}">Gérer les postes</a></li>
                                        <li><a class="dropdown-item" href="{{ route('all.countries') }}">Gérer les pays</a></li>
                                        <li><a class="dropdown-item" href="{{ route('all.contrats') }}">Gérer les contrats</a></li>
                                        <hr>
                                        <li><a class="dropdown-item" href="{{ route('all.process') }}">Gérer les Process</a></li>
        
                                    </ul>
                                </li>
                            </ul>
        
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Les extras
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        {{-- <li><a class="dropdown-item" href="{{ route('all.postes') }}">Gérer les postes</a></li>
                                        <li><a class="dropdown-item" href="{{ route('all.countries') }}">Gérer les pays</a></li>
                                        <li><a class="dropdown-item" href="{{ route('all.contrats') }}">Gérer les contrats</a></li> --}}
                                    </ul>
                                </li>
                            </ul>
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
        
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Bonjour, {{ Auth::user()->name }}
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a href="#" class="dropdown-item">Mon profile</a>
                                            <hr>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Déconnexion') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        var contrat = document.querySelector('.articles-contrat');
        if (contrat != '' && contrat != null && contrat != undefined) {
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
