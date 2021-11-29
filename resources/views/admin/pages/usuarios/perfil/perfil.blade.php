@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/fileinput.min.css') }}">
@endsection

@section('conteudo')
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-user-profile">
                    <div class="profile-page-left">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="profile-picture profile-picture-lg bg-gradient bg-primary mb-4">
                                    <img src="{{ asset('/images/carregando.svg') }}" alt="Carregando" id="loading">
                                    @if($usuario->foto)
                                        <img src="{{ asset('storage/' . $usuario->foto) }}" alt="{{ $usuario->name }}" width="144" height="144" id="minha-foto">
                                    @else
                                        <img src="{{ asset('/images/sem-foto.png') }}" alt="Foto de {{ $usuario->name }}" width="144" height="144" id="minha-foto">
                                    @endif
                                </div>
                                <form method="post" enctype="multipart/form-data" id="fotoPerfil">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                            <label for="foto" class="custom-file-label">Altere sua foto</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="profile-page-center">
                        <h1 class="card-user-profile-name">{{ $usuario->name }}</h1>
                        <hr>
                        <ul class="list-unstyled mt-5">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-title mt-0 mb-1">
                                        <p><strong>E-mail: </strong>{{ $usuario->email }}</p>
                                        <p><strong>Empresa: </strong>{{ $usuario->tenant->nome }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $("#loading").hide();

            document.getElementById('foto').onchange = function (){
                upload();
            };

            function upload(){
                var upload = document.getElementById('foto');
                var imagem = upload.files[0];

                var formData = new FormData($('#fotoPerfil')[0]);

                $.ajax({
                    url: "{{ route('usuarios.foto') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#minha-foto").hide();
                        $("#loading").fadeIn();
                    },
                    success: (data) => {
                        $("#loading").hide();
                        $("#minha-foto").fadeIn();
                        $("#minha-foto").attr("src","{{ asset('storage/') }}/" + data.foto);
                        $("#foto-topo").attr("src","{{ asset('storage/') }}/" + data.foto);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }

        </script>
    @endsection

@endsection
