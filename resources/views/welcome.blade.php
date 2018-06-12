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
                padding: 0 25px;
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
                border-bottom: 2px solid #fff; 
                background: #000;
                opacity: 0.6;
            }
            .root-btn {
                display: inline-block;
                padding: 0 50px;
                color: #fff;
                text-decoration: none;
                border-radius: 50px;
                box-sizing: border-box;
                border: 2px;
                border-style: solid;
                background-color: #1db954;
                border-color: #1db954;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
                height: 80px;
                font-size: 32px;
                line-height: 76px;
            }

            .green-btn.big-btn:hover {
                background-color: transparent;
                border-color: #1db954;
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
              background-color: #003300
            }

            .navbar-inverse .navbar-nav>.active>a:hover,
            .navbar-inverse .navbar-nav>li>a:hover,
            .navbar-inverse .navbar-nav>li>a:focus {
              background-color: #002200
            }

            .navbar-inverse .navbar-nav>.active>a,
            .navbar-inverse .navbar-nav>.open>a,
            .navbar-inverse .navbar-nav>.open>a,
            .navbar-inverse .navbar-nav>.open>a:hover,
            .navbar-inverse .navbar-nav>.open>a,
            .navbar-inverse .navbar-nav>.open>a:hover,
            .navbar-inverse .navbar-nav>.open>a:focus {
              background-color: #003300
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
              border-color: #003300
            }

            .navbar-inverse .navbar-brand {
              color: #FFFFFF
            }

            .navbar-inverse .navbar-brand:hover {
              color: #FFCC00
            }

            .navbar-inverse .navbar-nav>li>a {
              color: #FFFFFF
            }

            .navbar-inverse .navbar-nav>li>a:hover,
            .navbar-inverse .navbar-nav>li>a:focus {
              color: #FFCC00
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
                    <a href="./" class="navbar-brand">Bootstrap Menu</a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mission</a></li>
                                <li><a href="#">Vision</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Products</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li class="active">
                            <a href="#">Contact</a>
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
                            <a href="/redirect" class="root-btn green-btn big-btn">JOIN NOW</a>
                </div>
            </div>
        </div>
    </body>
</html>
