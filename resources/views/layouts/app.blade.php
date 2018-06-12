<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120655950-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-120655950-1');
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>fifa8teen</title>

    <!-- Scripts -->
    
    
    <script src="{{ asset('assets/js/require.min.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="{{ asset('js/prediction.js') }}" defer></script>
    
    
    
    
    <!-- Fonts -->
    <link rel="icon" href="{{asset('img/Fantasy-football-edge-logo-transparent.png')}}" type="image/gif" sizes="16x16">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                    <img src="{{asset('img/Fantasy-football-edge-logo-transparent.png')}}" height="80px" style="margin-left: 10px;">
                </a>
                @auth
                <div class="">
                    <span class="avatar" style="background-image: url({{Auth::user()->avatar}})"></span>
                    <span class="ml-2">
                        <span class="text-default">{{ Auth::user()->name }}</span>
                    </span>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @endauth
            </div>
        </nav>

        @if(isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg order-lg-first">
                  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                      <a href="/admin" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link active"><i class="fe fe-users"></i>Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/global-settings" class="nav-link active"><i class="fe fe-globe"></i>Global Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/match-stages" class="nav-link active"><i class="fe fe-share-2"></i>Match Stages</a>
                    </li>
                    {{-- <li class="nav-item">
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Interface</a>
                      <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="./cards.html" class="dropdown-item ">Cards design</a>
                        <a href="./charts.html" class="dropdown-item ">Charts</a>
                        <a href="./pricing-cards.html" class="dropdown-item ">Pricing cards</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Components</a>
                      <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="./maps.html" class="dropdown-item ">Maps</a>
                        <a href="./icons.html" class="dropdown-item ">Icons</a>
                        <a href="./store.html" class="dropdown-item ">Store</a>
                        <a href="./blog.html" class="dropdown-item ">Blog</a>
                        <a href="./carousel.html" class="dropdown-item ">Carousel</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Pages</a>
                      <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="./profile.html" class="dropdown-item ">Profile</a>
                        <a href="./login.html" class="dropdown-item ">Login</a>
                        <a href="./register.html" class="dropdown-item ">Register</a>
                        <a href="./forgot-password.html" class="dropdown-item ">Forgot password</a>
                        <a href="./400.html" class="dropdown-item ">400 error</a>
                        <a href="./401.html" class="dropdown-item ">401 error</a>
                        <a href="./403.html" class="dropdown-item ">403 error</a>
                        <a href="./404.html" class="dropdown-item ">404 error</a>
                        <a href="./500.html" class="dropdown-item ">500 error</a>
                        <a href="./503.html" class="dropdown-item ">503 error</a>
                        <a href="./email.html" class="dropdown-item ">Email</a>
                        <a href="./empty.html" class="dropdown-item ">Empty page</a>
                        <a href="./rtl.html" class="dropdown-item ">RTL mode</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="./form-elements.html" class="nav-link"><i class="fe fe-check-square"></i> Forms</a>
                    </li>
                    <li class="nav-item">
                      <a href="./gallery.html" class="nav-link"><i class="fe fe-image"></i> Gallery</a>
                    </li>
                    <li class="nav-item">
                      <a href="./docs/index.html" class="nav-link"><i class="fe fe-file-text"></i> Documentation</a>
                    </li> --}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endif

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-sm-8 offset-md-2">
                        @include('error')
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
        
    </div>
    <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="/rules">Rules</a></li>
                    <li class="list-inline-item"><a href="/faq">FAQ</a></li>
                    <li class="list-inline-item"><a href="/privacy-policy">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="/terms-service">Terms of Service</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 <a href=".">fifa8teen</a>. Created by <a href="https://fifa8teen.com" target="_blank">fifa8teen.com</a> All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    @yield('sub-scripts')
</body>
</html>
