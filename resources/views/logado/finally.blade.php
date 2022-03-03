@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Numero do Pedido: {{$order->order_num}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <div id="finally">
                                        <div>Obrigado, {{Auth::user()->name}}, pela sua operação.</div>
                                        <div>
                                            Cada uma dessas operações é, na verdade uma importante colaboração para
                                            o fortalecimento da Associação dos Ex-Alunos do CMS.
                                        </div>
                                        <div>= = = = = = =</div>
                                        <div>
                                            Estamos gratos! A cada alteração do status você será comunicado pelo seu email cadastrado sobre a sua operação.
                                        </div>
                                    </div>
                                    <div class="divider" style="margin-top: 7px;">{!! Button::primary('Voltar')->asLinkTo(route('logado.pedido.myorders', ['user' => Auth::user()->id])) !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
