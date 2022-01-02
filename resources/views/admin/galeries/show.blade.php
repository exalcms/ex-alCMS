@extends('layouts.excms')

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
                                if(!$convenio->photo){
                                    $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                    $foto = $img->name;
                                }else{
                                    $img = \App\Models\Photo::where('id', '=', $convenio->photo_id)->first();
                                    $foto = $img->name;
                                }
                                ?>
                                <img src="{!! asset('uploads/'.$foto)!!}" width="130px">
                            </div>
                            <h5>Empresa Parceira: {{ $convenio->empresa }}</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.convenios.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.convenios.edit', ['convenio' => $convenio->id])) !!}
                                {!! Button::danger('Delete')
                                        ->asLinkTo(route('admin.convenios.destroy', ['convenio' => $convenio->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                <?php $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'route' => ['admin.convenios.destroy', 'convenio' => $convenio->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:none',
                                ]); ?>
                                {!! form($formDelete) !!}
                            </div>
                            <div class="row">
                                <div id="register-show">
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Parceiro</h6>
                                            <div class="texto-show">
                                                {!! $convenio->empresa !!}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc rd_soc" style="margin-left: 15px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Validade</h6>
                                            <div class="texto-show">
                                                {{ \Carbon\Carbon::parse($convenio->data_valid)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc rd_soc" style="margin-left: 15px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Ativo</h6>
                                            <div class="texto-show">
                                                @if($convenio->ativo == 's')
                                                    Ativo
                                                @else
                                                    Suspenso
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Endereço</h6>
                                            <div class="msg-expresid">
                                                {!! $convenio->end !!} -  Tel.: {!! $convenio->tele !!}
                                            </div>
                                            @if($convenio->comple != null)
                                                <div class="msg-expresid">
                                                    {!! $convenio->comple !!}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Email</h6>
                                            <div class="texto-show">
                                                {{ $convenio->email }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Site</h6>
                                            <div class="texto-show">
                                                {{ $convenio->site }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Objeto</h6>
                                            <div class="msg-expresid">
                                                {!! $convenio->objeto !!}
                                            </div>
                                        </div>
                                        <div class="endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Benefícios</h6>
                                            <div class="msg-expresid">
                                                {!! $convenio->beneficios !!}
                                            </div>
                                        </div>
                                        <div class="endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Condições</h6>
                                            <div class="msg-expresid">
                                                {!! $convenio->condicions !!}
                                            </div>
                                        </div>
                                        <div class="endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Observações</h6>
                                            <div class="msg-expresid">
                                                {!! $convenio->obs !!}
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
