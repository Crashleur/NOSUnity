@extends('layouts.adm.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>Connexion</h2>
                    </div>
                    <div class="panel-body">
                        <br>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-md-offset-3">
                                    <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus placeholder="Login">
                                    @if ($errors->has('login'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-md-offset-3">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Mot de passe">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="text-left checkbox">
                                        <label style="font-size: 1.2em">
                                            <input name="remember" id="remember" value="1" type="checkbox" {{ old('remember') ? 'checked' : ''}}>
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Rester connecté
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-validate block full-width m-b dim">Connexion</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{ url('/password/reset') }}"> Mot de passe oublié ? </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
