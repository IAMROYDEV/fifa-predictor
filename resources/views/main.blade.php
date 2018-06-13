<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#88b02c" />
        <meta name="Description" content="Create top scoring squad and predict the match score during the 2018 FIFA world cup and earn points. Stand a chance to win exciting prizes at the end of the tournament.">
        <meta name="Keywords" content="fifa8teen fifaworldcup fifa worldcup matchpredictor football messi ronaldo earnpoints 2018 FIFA World Cup Russia">
        @yield('metadata')
        <!-- Fonts -->
        <link rel="icon" href="{{asset('img/Fantasy-football-edge-logo-transparent.png')}}" type="image/gif" sizes="16x16">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #2e2f30;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 20px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)),url("/img/background.jpg");
                background-size: cover;
                background-position: center; 
            }
            .navbar {
                width: 100%;
                height: 80px;
                 
                
                
            }
            .root-btn {
                display: inline-block;
                padding: 0 30px;
                color: #fff;
                text-decoration: none;
                border-radius: 30px;
                box-sizing: border-box;
                border: 2px;
                border-style: solid;
                background-color: #88b02c;
                border-color: #88b02c;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
                height: 80px;
                font-size: 24px;
                line-height: 76px;
            }

            .green-btn.big-btn:hover {
                background-color: transparent;
                border-color: #88b02c;
                text-transform: none;
                text-decoration: none;
                color: #fff;
            }
            .heading {
                color: #fff;
            }
            @import 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans';
            .navbar-brand {
              font-family: 'Montserrat', sans-serif;
              text-transform: uppercase
            }

            .navbar .nav {
              font-family: 'Open Sans', sans-serif;
              text-transform: uppercase;
              letter-spacing: 3px;
              font-size: 1.2rem
            }

            .navbar-inverse {
              
            }

            .navbar-inverse .navbar-nav>.active>a:hover,
            .navbar-inverse .navbar-nav>li>a:hover,
            .navbar-inverse .navbar-nav>li>a:focus {
              background-color: #88b02c;
              border-radius: 30px;
            }

            .navbar-inverse .navbar-nav>.active>a,
            .navbar-inverse .navbar-nav>.open>a,
            .navbar-inverse .navbar-nav>.open>a,
            .navbar-inverse .navbar-nav>.open>a:hover,
            .navbar-inverse .navbar-nav>.open>a,
            .navbar-inverse .navbar-nav>.open>a:hover,
            .navbar-inverse .navbar-nav>.open>a:focus {
              
            }

            .dropdown-menu {
              background-color: #006B00
            }

            .dropdown-menu>li>a:hover,
            .dropdown-menu>li>a:focus {
              background-color: #002200
            }

            .navbar-inverse {
              background-image: none;
            }

            .dropdown-menu>li>a:hover,
            .dropdown-menu>li>a:focus {
              background-image: none;
            }

            .navbar-inverse {
              background: none;
              border: none;
            }

            .navbar-inverse .navbar-brand {
              color: #FFFFFF;
              padding: 0;
            }

            .navbar-inverse .navbar-brand:hover {
              color: #FFCC00
            }

            .navbar-inverse .navbar-nav>li>a {
              color: #FFFFFF
            }

            .navbar-inverse .navbar-nav>li>a:hover,
            .navbar-inverse .navbar-nav>li>a:focus {
              color: #FFF
            }

            .navbar-inverse .navbar-nav>.active>a,
            .navbar-inverse .navbar-nav>.open>a,
            .navbar-inverse .navbar-nav>.open>a:hover,
            .navbar-inverse .navbar-nav>.open>a:focus {
              color: #FFCC00
            }

            .navbar-inverse .navbar-nav>.active>a:hover,
            .navbar-inverse .navbar-nav>.active>a:focus {
              color: #FFCC00
            }

            .dropdown-menu>li>a {
              color: #FFFFFF
            }

            .dropdown-menu>li>a:hover,
            .dropdown-menu>li>a:focus {
              color: #FFCC00
            }

            .navbar-inverse .navbar-nav>.dropdown>a .caret {
              border-top-color: #FFFFFF
            }

            .navbar-inverse .navbar-nav>.dropdown>a:hover .caret {
              border-top-color: #FFFFFF
            }

            .navbar-inverse .navbar-nav>.dropdown>a .caret {
              border-bottom-color: #FFFFFF
            }

            .navbar-inverse .navbar-nav>.dropdown>a:hover .caret {
              border-bottom-color: #FFFFFF
            }
            .navbar-right {
                margin-top: 20px;
            }
            .navbar-header {
                height: 80px;
            }
            .card {
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
                position: relative;
                margin-bottom: 1.5rem;
                width: 100%;
            }

            .card {
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid rgba(0, 40, 100, 0.12);
                border-radius: 3px;
            }
            .card-header:first-child {
                border-radius: calc(3px - 1px) calc(3px - 1px) 0 0;
            }

            .card-header:first-child {
                border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
            }
            .card-header {
                background: none;
                padding: 0.5rem 1.5rem;
                display: -ms-flexbox;
                display: flex;
                min-height: 3.5rem;
                -ms-flex-align: center;
                align-items: center;
            }
            .card-header {
                padding: 1.5rem 1.5rem;
                margin-bottom: 0;
                background-color: rgba(0, 0, 0, 0.03);
                border-bottom: 1px solid rgba(0, 40, 100, 0.12);
            }
            
            .circle {
              width: 20px;
              height: 20px;
              line-height: 20px;
/*              border-radius: 50%;  the magic 
              -moz-border-radius: 50%;
              -webkit-border-radius: 50%;*/
              text-align: center;
              color: #080808e3;
              font-size: 14px;
              text-transform: uppercase;
              font-weight: 700;
              margin: 0 auto 5px;
              background-color: rgba(225,225,225,1);  
            }
            .navbar-inverse .navbar-nav>li>a.fb-link:hover,
            .navbar-inverse .navbar-nav>li>a.fb-link:focus {
                background: none;
            }
            @media (max-width: 767px) {
                .navbar-inverse .navbar-toggle {
                   margin-top: 20px;
               }
                .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
                    border-color: #101010;
                    background: #000;
                    opacity: 0.8;
                }
                .root-btn {
                   font-size: 20px;
                   padding: 0 15px; 
                }
                .heading h2 {
                    font-size: 22px;
                }
                .nav.navbar-nav.navbar-right li a {
                        padding-right: 20px;
                    padding-left: 30px;
                }
            }
        </style>
    </head>
    <body>
        <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand"><img src="/img/Fantasy-football-edge-logo-transparent.png" alt="logo" style="height: 80px;"></a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            @auth
                            <a href="/dashboard">Home</a>
                            @else
                            <a href="/">Home</a>
                            @endauth
                            
                        </li>
                        <li>
                            <a href="/leaderboard">Leaderboard</a>
                        </li>
                        <li>
                            <a href="/matches">Match</a>
                        </li>
                        <li class="">
                            <a href="/rules">Rules</a>
                        </li>
                        <li class="">
                            <a href="/privacy-policy">Privacy</a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/fifa8teen/" target="_blank" style="padding-top: 0px;" class="fb-link"><img src="/img/facebook-icon-preview-200x200.png" height="60px"alt="facebook-page" title="Find us on Facebook"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="full-height">
            <nav class="navbar">
                <div class="container">
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            function getOffset(){
                var d=new Date().getTimezoneOffset();
                return (d+(2*-d));
            }
            if(!document.cookie.match(/timezone/g)){
                document.cookie = `timezone=${getOffset()}`
                window.location.reload();
            }
            document.cookie = `timezone=${getOffset()}`


        });
    </script>
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
</html>
