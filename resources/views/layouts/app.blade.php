<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>J4rs - Online Catering Reservation</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
    <!-- <link href="./css/custom.css" rel="stylesheet">
     -->

     <style>
        .picture-container{
            position: relative;
            cursor: pointer;
            text-align: center;
        }
        .picture{
            width: 106px;
            height: 106px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 50%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }
        .picture:hover{
            border-color: #2ca8ff;
        }
        .content.ct-wizard-green .picture:hover{
            border-color: #05ae0e;
        }
        .content.ct-wizard-blue .picture:hover{
            border-color: #3472f7;
        }
        .content.ct-wizard-orange .picture:hover{
            border-color: #ff9500;
        }
        .content.ct-wizard-red .picture:hover{
            border-color: #ff3b30;
        }
        .picture input[type="file"] {
            cursor: pointer;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0 !important;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .picture-src{
            width: 100%;
            
        }
     </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                @if($business == '')
                
                @else
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="/storage/business_logo/{{$business->image}}" width="40" height="40" class="rounded-circle"> {{$business->btitle}}
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item p-1">
                            <a href="/" class="nav-link"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item p-1">
                            <a href="#about" class="nav-link"><i class="fas fa-address-card"></i> About Us</a>
                        </li>
                        <li class="nav-item p-1">
                            <a href="#contact" class="nav-link"><i class="fas fa-paper-plane"></i> Contact Us</a>
                        </li>
                        <li class="nav-item p-1">
                            <a href="#services" class="nav-link"><i class="fas fa-utensils"></i> Services</a>
                        </li>
                        <li class="nav-item p-1">
                            <a href="#services" class="nav-link"><i class="fas fa-drumstick-bite"></i> Products</a>
                        </li>
                        <li class="nav-item p-1">
                            <a href="{{route('events')}}" class="nav-link"><i class="fas fa-calendar-alt"></i> Schedule Reserve</a>
                        </li>
                        <li class="nav-item p-1">
                            <a href="{{route('reservation')}}" class="nav-link"><i class="fas fa-calendar-check"></i> Reservation</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item p-1">
                                    <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item p-1">
                                    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown p-1">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i> {{ Auth::user()->first_name }}
                                </a>
                        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('home')}}">
                                    <i class="fas fa-user-circle"></i> {{ __('My Account') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('transaction.history')}}">
                                    <i class="fas fa-history"></i> {{ __('Reservation History') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('current.history')}}">
                                    <i class="fas fa-money-check"></i> {{ __('Current Reservation') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
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

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

<script>
  $(function () {
    $("#table_item").DataTable({
      "order":[[0,'desc']],
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "lengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
    });
  });
</script>