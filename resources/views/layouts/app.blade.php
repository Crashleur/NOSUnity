<!DOCTYPE html>
<html>
<head>
    <title>NOSUnity</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

</head>
<body>
    <header style="margin:0;z-index:990;">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                {{-- <div class="navbar-header">
                    <a class="navbar-brand" href="#">Brand</a>
                </div> --}}

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li class="nav-right"><a href="{{ route('login') }}"> Login</a></li>
                            <li class="nav-right"><a href="{{ route('register') }}">Register</a></li>
                        @else
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
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
