@extends('layouts.adm.app')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading"> Mon Profile </div>
            <div class="panel-body">

                <div class="row">

                    <div class="col-md-5">
                        <div class="row">
                            <div id='avatar_edit' class="col-md-4">
                                @if(isset($files))
                                    <a data-toggle="modal" data-target="#avatarModal">
                                        <img id='avatar' src="{{ asset($files['200']) }}" alt="avatar">
                                    </a>
                                @else
                                    <a data-toggle="modal" data-target="#avatarModal">
                                        <img id="avatar" src="img/default_200.png" alt="avatar">
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label for="username" class="col-md-4 control-label">Pseudonyme</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control" name="username" value="{{ $auth->username }}" required>

                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Adresse mail</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $auth->email }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Configuration de l'avatar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @if(isset($files)))
                            <div class="col-md-1 col-md-offset-3">
                                <img id='cropavatar30' src="{{ asset($files['30']) }}" alt="avatar">
                            </div>
                            <div class="col-md-2">
                                <img id='cropavatar96' src="{{asset($files['96']) }}" alt="avatar">
                            </div>
                            <div class="col-md-2">
                                <img id='cropavatar200' src="{{ asset($files['200']) }}" alt="avatar">
                            </div>
                        @else
                            <div class="col-md-1 col-md-offset-3">
                                <img id='cropavatar30' src="img/default_30.png" alt="avatar">
                            </div>
                            <div class="col-md-2">
                                <img id='cropavatar96' src="img/default_96.png" alt="avatar">
                            </div>
                            <div class="col-md-2">
                                <img id='cropavatar200' src="img/default_200.png" alt="avatar">
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-offset-4">
                            <label class="btn btn-default">
                                Choisir un avatar <input id="chooseAvatar" type="file" hidden>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id='cancelAvatar' class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" id='postAvatar' class="btn btn-primary" data-dismiss="modal">Sauvegarder les changements</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/plugins/inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="/js/axios.min.js"></script>
    <script type="text/javascript">

    var currentDestinations = {};

    $('#chooseAvatar').on('change', function(){
        var action = '{{ route('new_avatar') }}';
        var csrfToken = '{{ csrf_token() }}';

        var formData = new FormData();
        formData.append("avatar", $(this)[0].files[0]);
        axios.post(action, formData, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (response) {
            if(response.data.state == 'exception_error') {
                alert('Erreur : Une erreur est survenue');
            }
            else if (response.data.state == 'success') {
                console.log('/img/avatar/' + {{ $auth->id }} + '/');
                $('#cropavatar30').attr('src', response.data.return_object[0]);
                $('#cropavatar96').attr('src', response.data.return_object[1]);
                $('#cropavatar200').attr('src', response.data.return_object[2]);
                currentDestinations = {
                    '30': response.data.return_object[0],
                    '96': response.data.return_object[1],
                    '200': response.data.return_object[2]
                };
            }
        })
        .catch(function (error) {
            alert('Erreur :  réessayer, et si le problème persiste, contacter un admin !');
        });
    });

    var cancelAvatar = function(){

        var action = '{{ route('cancel_avatar') }}';
        var csrfToken = '{{ csrf_token() }}';

        axios.post(action, [], {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (response) {
            if(response.data.state == 'exception_error') {
                alert('Erreur : Une erreur est survenue');
            }else{
                currentDestinations = {};
            }
        })
        .catch(function (error) {
            alert('Erreur :  problème au niveau du serveur, contacter un admin !');
        });
    };
    $('#cancelAvatar').on('click', cancelAvatar());

    $(window).unload(cancelAvatar());

    $('#postAvatar').on('click', function(){
        var action = '{{ route('post_avatar') }}';
        var csrfToken = '{{ csrf_token() }}';
        console.log(currentDestinations);
        if (currentDestinations != {}) {
            var avatarDatas = {
                avatars: currentDestinations,
            };
            axios.post(action, avatarDatas, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                }
            })
            .then(function (response) {
                if(response.data.state == 'exception_error') {
                    alert('Erreur :  problème au niveau du serveur, contacter un admin !');
                }else{
                    $('#avatar').attr('src', response.data.return_object['200']);
                    $('#navAvatar').attr('src', response.data.return_object['30']);
                    currentDestinations == {};
                }
            })
            .catch(function (error) {
                alert('Erreur : Une erreur est survenue');
            });
        }
    });


    </script>
@endsection
