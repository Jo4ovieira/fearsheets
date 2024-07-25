<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/'. Request::segment(1) .'.css') }}">
        <script src="{{ asset('js/'. Request::segment(1) .'.js') }}"></script>
        <script src="https://kit.fontawesome.com/1f62ce0ae5.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <title>FearSheets</title>
    </head>

    <body>
        <nav class="header">
            <div class="col-lg-10 col-sm-10 col-md-10 col-10 ">
                {{-- Logo --}}
                <a href="/home" class="logo">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </a>
                {{-- Buttons --}}
                <div class="btn-header">
                    <a href="/agents" class="button">Agents</a>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-2 ">
                {{-- Access/profile --}}
                <div class="access">
                    @if (Auth::check())
                        @if (Auth::user()->user_img != null)
                            <a href="/profile/{{Auth::user()->id}}"><img class="profile" src="{{ asset(Auth::user()->user_img) }}" alt=""></a>
                        @else
                            <a href="/profile/{{Auth::user()->id}}"><img class="profile" src="{{ asset('img/user.jpg') }}" alt=""></a>
                        @endif
                    @else
                        <b><a href="/login" class="soft-button">Login</a></b> |
                        <b><a href="/register" class="soft-button">Register</a></b>
                    @endif
                </div>
            </div>
        </nav>
        <main>
            <div class="container-fluid cont">
                @yield('content')
            </div>
        </main>
        <footer class="footer text-center">
            <div class="col-lg-12 col-md-12 col-sm-12 for-desktop-f text-center">
                <span class="float">FearSheets - {{ date("Y") }} By <a href="https://www.linkedin.com/in/joao-vieira-bitencourt/" class="custom-s custom-link" target="_blank">João Vieira Bitencourt</a> | Props to: </span><a href="https://ordemparanormal.com.br/" class="custom-link" target="_blank">ordemparanormal.com.br</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 for-mobile-f text-center">
                <span class="float"><a style="text-decoration: none; color: white;" href="/terminal">F</a>earSheets - {{ date("Y") }} By <a href="https://www.linkedin.com/in/joao-vieira-bitencourt/" class="custom-s custom-link" target="_blank">João Vieira Bitencourt</a></span>
            </div>
        </footer>
    </body>
</html>
