<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Buzplace') }}</title>
    <link rel="icon" type="image/png" href="/images/logo.png" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
  <script src="{{ asset('js/typed.min.js')}}"></script>
    <style>
            * {
                box-sizing: border-box;
            }
        
            /* The grid: Four equal columns that floats next to each other */
        
            .column {
                float: left;
                width: 25%;
                padding: 10px;
            }
        
            /* Style the images inside the grid */
        
            .column img {
                opacity: 0.8;
                cursor: pointer;
            }
        
            .column img:hover {
                opacity: 1;
            }
        
            /* Clear floats after the columns */
        
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        
            /* The expanding image container */
        
            .container {
                position: relative;
                /* display: none; */
            }
        
            /* Expanding image text */

            .closebtn {
                position: absolute;
                top: 0.02px;
                right: 30px;
                color: white;
                font-size: 35px;
                cursor: pointer;
            }
            .nav-link{
                font-size: 20px;
            }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
        crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo2.png" alt="" style="width:220px;">
                 </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else
                    <ul class="navbar-nav ml-auto">
                    <form class="form-inline" action="{{action('PostsController@search', "searchKey")}}">
                        <div class="input-group">
                            <div class="input-group-prepend" style="background-color:#0C0C0C">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" style="background-color:#383838" class="form-control form-control-lg" placeholder="Search" name="searchKey">
                        </div>
                    </form>
                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <li><a class="nav-link" href="/">Home</a></li>
                        <li><a href="/newsArticles" class="nav-link">News</a></li>
                        <li><a class="nav-link" href="/forums">Forums</a></li>
                        <li><a href="/directory" class="nav-link">Directories</a></li>
                        <li><a class="nav-link" href="/consult/create">Consultation</a></li>
                        {{-- <li><a class="nav-link" href="/messages">Messages @include('messenger.unread-count')</a></li> --}}
                        <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                        <strong>{{ substr(Auth::user()->name, 0,1) }} <span class="caret"></span></strong>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
            @include('inc.alerts')
            </div>
            @yield('content')
        </main>
    </div>
    
    @yield('js')
</body>
</html>