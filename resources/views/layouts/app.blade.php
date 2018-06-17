<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#88b02c" />
    <meta name="Description" content="Create top scoring squad and predict the match score during the 2018 FIFA world cup and earn points. Stand a chance to win exciting prizes at the end of the tournament.">
    <meta name="Keywords" content="fifa8teen fifaworldcup fifa worldcup matchpredictor football messi ronaldo earnpoints 2018 FIFA World Cup Russia">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    @if(env('APP_ENV')==='production')
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120655950-1"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-120655950-1');
      </script>
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>fifa8teen</title>

    <!-- Scripts -->
    
    
    <script src="{{ asset('assets/js/require.min.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="{{ asset('js/prediction.js') }}" defer></script>
    
    
    
    
    <!-- Fonts -->
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" type="text/css">
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
                      <a href="/dashboard" class="nav-link active"><i class="fe fe-pocket"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link active"><i class="fe fe-users"></i>Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/global-settings" class="nav-link active"><i class="fe fe-globe"></i>Global Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/list_matches" class="nav-link active"><i class="fe fe-share-2"></i>Update Match</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/match-stages" class="nav-link active"><i class="fe fe-share-2"></i>Match Stages</a>
                    </li>
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
    @if(env('APP_ENV')==='production')
    <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5b1fe3c39b5236437c3df8b9/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
    @endif
</body>
</html>
