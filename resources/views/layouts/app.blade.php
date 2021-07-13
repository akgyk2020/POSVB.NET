<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dasboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- mdbootstrap -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"/>
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
            @auth  
            <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{asset('/images/anggun.ico')}}" width="30" height="30" alt="Logo"></a>
                            
                <a class="navbar-brand" href="{{ url('/cart') }}">
                   Point of Sale
                </a>
            @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href=" {{ url('/cart') }}">Point Of Sale</a>
                                <a class="dropdown-item" href="#"><i class="bi bi-broadcast-pin"></i>Master</a>
                                <a class="dropdown-item" href="{{ url('/products') }}">-Product</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Supplier</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Price</a>
                                <a class="dropdown-item" href="#"><i class="bi bi-broadcast-pin"></i>Transaction</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Sales</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Order</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Recieved</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Stock Opname</a>
                                <a class="dropdown-item" href="#"><i class="bi bi-broadcast-pin"></i>Report</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Sales</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Order</a>
                                <a class="dropdown-item" href="{{ url('/master') }}">-Stock</a>
                                 
                                <livewire:auth.logout />
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

            <div class="container-fluid">
            {{isset($slot)? $slot:null}}
            </div>
        </main>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    @stack('script-custom')
</body>
</html>
