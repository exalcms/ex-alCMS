@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <div>
                                <?php
                                if(!$expresid->foto){
                                    $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                    $foto = $img->photo_path;
                                }else{
                                    $foto = $expresid->photo->photo_path;
                                }
                                ?>
                                <img src="{!! asset($foto)!!}" width="130px">
                            </div>
                            <h5>Ex-Presidente: {{ $expresid->user->name_full }}</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.expresids.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.expresids.edit', ['expresid' => $expresid->id])) !!}
                            </div>
                            <div class="row">
                                <div id="register-show">
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Fim do Mandato</h6>
                                            <div class="texto-show">
                                                {{ $expresid->user->name }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc rd_soc" style="margin-left: 15px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Ano Inicial</h6>
                                            <div class="texto-show">
                                                {{ $expresid->inicio }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc rd_soc" style="margin-left: 15px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Ano Final</h6>
                                            <div class="texto-show">
                                                {{ $expresid->final }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Mensagem</h6>
                                            <div class="msg-expresid">
                                                {!! $expresid->msg !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
