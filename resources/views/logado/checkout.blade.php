<?php

use App\Models\User;
use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\Requests\Payment;
use PagSeguro\Library;

$email = 'assoc.exalcms@gmail.com';
$token = '81EEBD3D218840D09B3B254CF8991F7B';

Library::initialize();
Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
Configure::setEnvironment('sandbox');
Configure::setAccountCredentials($email, $token);
Configure::setLog(true, (storage_path('/logs/pseg.log')));

    $payment = new Payment();
    $user = User::find(Auth::user()->id);

    $id = 1;

    foreach ($order->orderItems as $orderItem){
        $payment->addItems()->withParameters(
            $id++,
            $orderItem->product->name,
            $orderItem->qtd,
            $orderItem->product->price
        );
    }

    $payment->setCurrency("BRL");

    if ($order->cupom_id != null) {
        $discount = $order->total_final - $order->total_order;
    } else {
        $discount = 0.00;
    }
    $payment->setExtraAmount($discount);
    $payment->setReference($order->order_num);
    $payment->setRedirectUrl('https://associacaoexalunoscms.org.br/retorno');

    // Set your customer information.
    $payment->setSender()->setName($user->name_full);
    $payment->setSender()->setEmail($user->email);

    //$celu = explode(" ", $user->celular);
    $sai = array("(",")"," ", "-","/","\\");
    $celu = str_replace($sai, "", $user->celular);
    $ddd = substr($celu, 0, 2);
    $phone = substr($celu, 2, 9);
    $payment->setSender()->setPhone()->withParameters($ddd, $phone);
    $payment->setSender()->setDocument()->withParameters('CPF', $user->cpf);

    //Add items by parameter using an array
    $payment->addParameter()->withArray(['notificationURL', 'https://associacaoexalunoscms.org.br/notification']);

    $payment->setRedirectUrl("https://associacaoexalunoscms.org.br/retorno");
    $payment->setNotificationUrl("https://associacaoexalunoscms.org.br/notification");

    /**
     * @todo For checkout with application use:
     * \PagSeguro\Configuration\Configure::getApplicationCredentials()
     *  ->setAuthorizationCode("FD3AF1B214EC40F0B0A6745D041BF50D")
     */
    $result = $payment->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );

?>
@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Detalhamento do pedido nº: {{$order->order_num}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <div class="order-esquec" style="margin-bottom: 30px;">
                                        <div>Prezado usuário <span>{{Auth::user()->name}}</span>,</div>
                                        <div>Seu pedido de compra número <span>{{$order->order_num}}</span>.</div>
                                        <div>Encontra-se atualmente com o status
                                            <span>
                                @switch($order->status)
                                                    @case(1)
                                                    Aberto. (Pode ser alterado)
                                                    @break
                                                    @case(2)
                                                    Fechado. (Pode ser alterado)
                                                    @break
                                                    @case(3)
                                                    Processando pagamento. (Não pode ser alterado)
                                                    @break
                                                    @case(4)
                                                    Pago. (Não pode ser alterado)
                                                    @break
                                                    @case(2)
                                                    Concluído. (Não pode ser alterado)
                                                    @break
                                                @endswitch
                            </span></div>
                                        <div>Já consta os seguintes itens:</div>
                                        <div style="margin-top: 15px;">
                                            {!!Table::withContents($orderItems)->striped()!!}
                                        </div>
                                        <div style="text-align: right;">Valor Total da Compra: <span>{{number_format($order->total_order, 2, ',', '.') }}</span></div>
                                        <div style="text-align: right;">
                                            <form method="post" action="{{route('logado.desconta.order')}}">
                                                @csrf
                                                @method('POST')
                                                <div class="form-row">
                                                    <div class="form-group col-md-12" style="text-align: right; margin-top: 10px;">
                                                        <input name="cupom" type="text" size="25" required placeholder="digite o cupom">
                                                        <input name="order_id" type="hidden" value="{{$order->id}}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12" style="text-align: right;">
                                                        {!! Button::primary('Aplicar Cupom')->submit()->addAttributes(['style' => 'height:30px; text-align: center;']) !!}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @if($order->total_final == null)
                                        <div style="text-align: right;">Valor Total da Compra: <span>{{number_format($order->total_order, 2, ',', '.') }}</span></div>
                                        @else
                                            <div style="text-align: right;">Valor Total da Compra: <span>{{number_format($order->total_final, 2, ',', '.') }}</span></div>
                                        @endif
                                        <div>
                                            {!! Button::success('Pagar')->asLinkTo($result)
                                                ->addAttributes([
                                                'target' => '_blank',
                                                'onclick' => 'event.initEvent(document.getElementById("form-pagseg").submit());']) !!}
                                            <?php $formPagseguro = FormBuilder::plain([
                                                'id' => 'form-pagseg',
                                                'route' => ['logado.pagseguro' , 'order' => $order->id],
                                                'method' => 'GET',
                                                'style' => 'display:none',
                                            ]);?>
                                            {!! form($formPagseguro) !!}
                                            {!! Button::primary('Voltar')->asLinkTo(route('logado.pedido.myorders', ['user' => Auth::user()->id])) !!}
                                            {!! Button::danger('Cancelar')->asLinkTo(route('logado.pedido.destroy', ['order' => $order->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                            <?php $formDelete = FormBuilder::plain([
                                                'id' => 'form-delete',
                                                'route' => ['logado.pedido.destroy', 'order' => $order->id],
                                                'method' => 'DELETE',
                                                'style' => 'display:none',
                                            ]); ?>
                                            {!! form($formDelete) !!}
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
