<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/'. Request::segment(1) .'.css') }}">
    <script src="{{ asset('assets/js/'. Request::segment(1) .'.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1f62ce0ae5.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>FearSheets</title>
</head>
<body>
    <nav class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg 12 inline">
                    {{-- Logo --}}
                    <div class="logo">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                    </div>
                    {{-- Buttons --}}
                    <a href="/home" class="button">Home</a>
                    <a href="/agents" class="button">Agents</a>
                    {{-- Profile --}}
                    <div class="push-left inline">
                        @if (Auth::check())
                            <div class="hello">
                                Hello, {{Auth::user()->name}}!
                            </div>
                            <div class="profile">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </div>
                        @endif
                            <div class="access">
                                @if (Auth::check())
                                    <b><a href="/logout" class="soft-button">LogOut</a></b> |
                                @else
                                    <b><a href="/login" class="soft-button">Login</a></b> |
                                @endif
                            <b><a href="/register" class="soft-button">Register</a></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container-fluid cont">
            @yield('content')
        </div>
    </main>
    <footer class="footer text-center">
        FearSheets - 2024 | By João | Props to:<a href="https://ordemparanormal.com.br/" target="_blank">https://ordemparanormal.com.br/</a>
    </footer>
</body>
</html>
