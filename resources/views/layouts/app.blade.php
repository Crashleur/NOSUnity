<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>NOSUnity</title>
</head>
<body>
    <header style="margin:0;z-index:990;">
        <nav>
            <div>
                @if (Auth::guest())
                    <ul>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                @else
                @endif
            </div>
        </nav>
    </header>




    <main>
        @yield('content')
    </main>




    <footer>
        <div>
            <div>
                NOSUnity © 2017 Copyright
            </div>
        </div>
    </footer>
</body>
</html>
