@extends('layouts.adm.app')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading"> Mon Profile </div>
            <div class="panel-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div id='avatar_edit' class="col-md-3">
                                @if(isset($auth->link_id))
                                    <p>{{ $auth->link_id }}</p>
                                @else
                                    <a data-toggle="modal" data-target="#avatarModal">
                                        <img src="img/default128.png" alt="image par default">
                                    </a>
                                @endif
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Configuration de l'avatar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-4">
                            <div>
                                <img id='cropavatar'
                                @if(isset($auth->link_id))
                                    src="{{ $auth->link->destination }}"
                                @else
                                    src="img/default128.png"
                                @endif
                                alt="avatar">
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3">
                                <label class="btn btn-default">
                                    Choisir un avatar <input id="chooseAvatar" type="file" hidden>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Sauvegarder les changements</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/plugins/inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="/js/axios.min.js"></script>
    <script type="text/javascript">

    var image = document.getElementById('cropavatar');
    var optionCrop = {
        aspectRatio: 16 / 9,
        background: false,
        autoCropArea: 1,
        crop: function(e) {
            console.log(e.detail);
            // console.log(e.detail.x);
            // console.log(e.detail.y);
            // console.log(e.detail.width);
            // console.log(e.detail.height);
            // console.log(e.detail.rotate);
            // console.log(e.detail.scaleX);
            // console.log(e.detail.scaleY);
        }};

        var cropper = new Cropper(image, optionCrop);


        $('#chooseAvatar').on('change', function(){
            var action = '{{ route('post_avatar') }}';
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
                    messages = response.data.error_message;
                    console.log(messages);
                    info = '';
                    for(var message in messages) {
                        info += messages[message];
                    }
                    alert('Erreur :  ' + info);
                    //toastr.error(info);
                }
                else if (response.data.state == 'success') {
                    $('#cropavatar').attr("src", response.data.return_object);
                    cropper.replace(response.data.return_object);
                    //cropper.reset();
                }
                else if (response.data.state == 'exception_error_string') {
                    //toastr.error(response.data.error_message);
                }
            })
            .catch(function (error) {
                alert('Erreur :  ' + error);
            });
        });
        </script>
    @endsection
