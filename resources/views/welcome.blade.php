<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>fifa8teen</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
        </style>
    </head>
    <body>
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
