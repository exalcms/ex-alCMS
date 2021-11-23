@extends('layouts.excms')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Consultar habilitação do associado para o convênio</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('detail-conv', ['convenio' => $convenio->id])) !!}
                            </div>
                            <x-jet-validation-errors class="mb-4" />
                            <div class="form-admin">
                                <?php $icon = '<i class="fas fa-address-card"></i>'; ?>
                                {!!
                                        form($form->add('consultar', 'submit', [
                                            'attr' => ['class' => 'btn btn-primary btn-block', 'style' => 'width:120px'],
                                            'label' => $icon.' Consultar'
                                         ]))
                                 !!}
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
