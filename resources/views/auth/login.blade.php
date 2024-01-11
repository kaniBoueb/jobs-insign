<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login | Jobs Insign.africa') }}</title>
    @notifyCss
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    
    <!-- Styles -->   
    <style>
        #login {
            height: 100vh;
            display: flex;
            align-items: center;
            background: #18224F;
            background: linear-gradient(to top right,#18224F,#7BE4B5);
        }

        .le-form {
            width: 600px;
            margin: 0 auto !important;
            padding: 50px 30px;
            border: 1px solid #18224F;
            background: #fff;
        }

        input {
            outline: none !important;
            border: 1px solid #18224F !important;
        }

        .logo {
            width: 100px !important;
        }
    </style>
    {{-- @notifyCss --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset("js/perso.js") }}"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
    <div id="login">
    <div class="container">
        <div class="row justify-content-center le-form">
            <div class="logo">
                <img src="{{ asset("logo.png") }}" alt="logo Insign" srcset="">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    
                    <div class="col-md-12">
                        <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('E-mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    
                    <div class="col-md-12">
                        <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Mot de passe') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Se souvenir de moi') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8">
                        <button type="submit" class="btn text-light" style="background: #18224F">
                            {{ __('Se connecter') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    @notifyJs
</body>
</html>