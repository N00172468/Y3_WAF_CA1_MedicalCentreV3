<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Eastwood Medical Centre</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #262626;
                /* color: #0062ff; */
                color: #7851a9;
                font-family: 'Raleway', sans-serif;
                font-weight: 300;
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
                letter-spacing: .5rem;
                text-transform: uppercase;
                text-align: center;
            }

            .title {
                font-size: 84px;
                text-shadow: 1px 1px 20px #1a1818;
            }

            .links > a {
                color: #b8860b;
                padding: 0 25px;
                font-family: 'Raleway', sans-serif;
                font-size: 20px;
                font-weight: 500;
                letter-spacing: .2rem;
                text-decoration: none;
                text-transform: uppercase;
                /* text-shadow: 1px 1px 1px black; */
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .divider {
              height: 2px;
              background-color: #b8860b;
              /* background-color: #7851a9; */
              border: none;
              margin-top: 1px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Eastwood Medical Centre
                    <hr class="divider">
                </div>

                <div class="links">
                    <a href="https://github.com/N00172468">Github</a>
                    <a href="https://www.linkedin.com/in/john-carlo-ramos-1a587b195/">LinkedIn</a>
                    <a href="https://www.instagram.com/jc_ramos_photography/">Instagram</a>
                    <a href="{{ route('about') }}">About us</a>
                    {{-- <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                </div>
            </div>
        </div>
    </body>
</html>
