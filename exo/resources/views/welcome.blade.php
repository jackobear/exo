<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ExoColony</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('/img/art/starfield.jpg');
                background-repeat: repeat-x;
                color: #fff;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Exocolony
                </div>

                <div class="links">
                    <a href="/action">Actions</a>
                    <a href="/asteroid">Asteroids</a>
                    <a href="/card-back">Card Backs</a>
                    <a href="/dwarf-planet">Dwarf Planets</a>
                    <a href="/faction">Factions</a>
                    <a href="/habitable-world">Habitable Worlds</a> <br />
                    <a href="/lifeform">Lifeforms</a>
                    <a href="/moon">Moons</a>
                    <a href="/planet">Planets</a>
                    <a href="/reference-card">Reference Cards</a>
                    <a href="/star">Stars</a>
                </div><br /><br />
                <div class="links">
                    <a href="/database/export">Export DB</a>
                    <a href="https://laravel.com/docs/5.3">Laravel 5.3 Docs</a>
                    <a href="/action/decklist">Export Action Decklist</a>
                </div>
            </div>
        </div>
    </body>
</html>
