<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>fifa8teen</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
            @media (max-width: 767px) {
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
                    font-size: 26px;
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
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Leaderboard</a>
                        </li>
                        <li>
                            <a href="#">Match</a>
                        </li>
                        <li class="">
                            <a href="#">Rules</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="row full-height">
            <nav class="navbar">
                <div class="container">
                </div>
            </nav>
            <div class="content">
                <div class="text-center heading">
                    <h2>BUILD YOUR TOP SCORING SQUAD & PREDICT MATCH SCORES TO WIN</h4>
                        <h4>NOT A MEMBER AS YET?</h5>
                            <br><br>
                            <a href="/redirect" class="root-btn green-btn big-btn">LOGIN WITH FACEBOOK</a>
                </div>
            </div>
        </div>
    </body>
</html>
