<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Honoris</title>

    <link href="css/pace_skin.css" rel="stylesheet">
    <script src="js/plugins/pace/pace.min.js"></script>

    <link  href="/dist/cropper.css" rel="stylesheet">
    <script  type="text/javascript" src="/dist/cropper.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header style="margin:0;z-index:990;">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('index') }}"><img style="width: 30px" src="img/logo.png" alt="logo honoris"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li class="nav-right"><a href="{{ route('login') }}"> Connexion</a></li>
                            <li class="nav-right"><a href="{{ route('register') }}">Inscription</a></li>
                        @else
                            <li class="nav-right"><a href="#">Bienvenu à toi <strong>{{ Auth::user()->username }}</strong></a></li>
                            <li class="nav-right"><a href="{{ route('logout') }}">Déconnexion</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>


    @include('layouts.adm.footer')

</body>
</html>
