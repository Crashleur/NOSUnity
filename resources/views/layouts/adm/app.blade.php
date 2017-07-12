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
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
</head>
<body>
    <header style="margin:0;z-index:990;">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('index') }}"><img style="width: 30px" src="img/logo.png" alt="logo honoris"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Forum</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li class="nav-right"><a href="{{ route('login') }}"> Connexion</a></li>
                            <li class="nav-right"><a href="{{ route('register') }}">Inscription</a></li>
                        @else
                            <li class="dropdown nav-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if(count(Auth::user()->links) <= 0 )
                                        <strong><img id="navAvatar" src="img/default_30.png" alt="image de profil">  {{ Auth::user()->username }}</strong>
                                        <span class="caret"></span>
                                    @else
                                        @foreach (Auth::user()->links as $link)
                                            @if($link->type == 'avatar')
                                                <strong><img id="navAvatar" src="{{asset(json_decode($link->destination, true)['30'])}}" alt="image de profil"> {{ Auth::user()->username }}</strong>
                                                <span id='caret' class="caret"></span>
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('edit_auth') }}">Modifier mon profile</a></li>
                                    <li><a href="{{ route('logout') }}">Déconnexion</a></li>
                                </ul>
                            </li>
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
