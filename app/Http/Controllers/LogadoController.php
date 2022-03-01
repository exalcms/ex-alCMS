<?php

namespace App\Http\Controllers;

use App\Models\Cupom;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\Document;
use PagSeguro\Domains\Phone;
use PagSeguro\Library;
use PagSeguro\Domains\Requests\Payment;

class LogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $order = Order::where([
            'user_id' => $user_id,
        ])->whereNotIn(
            'status', [3,4])->first();
        if ($order != null){
            return view('dashboard-order', compact('order'));
        }else{
            return view('dashboard');
        }
    }

    /*
     * tipos de status da order
     * Aberta = 1
     * Fechada = 2
     * Paga = 3
     * Concluída = 4
     */
    public function adiCar(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = $request->all();
        $product = Product::find($data['product_id']);

        $order = Order::where([
            'user_id' => $user_id,
        ])->whereNotIn(
            'status', [3,4])->first();
        if ($order != null){
            $orderItems = OrderItem::where([
                'order_id' => $order->id,
            ])->get();
            return view('logado.produto-cont', compact('order', 'orderItems', 'product'));
        }else {

            $orderB['user_id'] = Auth::user()->id;
            $orderB['date'] = date('Y-m-d');
            $orderB['order_num'] = date('dmY_') . $orderB['user_id'] . "_" . $product->id . "-" . time();
            $orderB['total_order'] = $data['qtd'] * $product->price;
            $orderB['status'] = 1;


            $order = Order::create($orderB);

            $orderItem['product_id'] = $product->id;
            $orderItem['order_id'] = $order->id;
            $orderItem['qtd'] = $data['qtd'];
            $orderItem['total_item'] = $order->total_order;

            $orderItem2 = OrderItem::create($orderItem);

            return view('logado.my-order', compact('order', 'orderItem2'));
        }
    }

    public function nossaLojaUser(User $user)
    {
        $order = Order::where([
            'user_id' => $user->id,
        ])->whereNotIn(
            'status', [3,4])->first();
        if ($order == null){
            $products = Product::with('photos')->where([
                'ativo' => 's',
            ])->paginate();
            return view('logado.nossaloja', compact('products'));
        }else{
            $orderItens = OrderItem::where([
                'order_id' => $order->id,
            ])->pluck('product_id')->toArray();

            $products = Product::with('photos')->where([
                'ativo' => 's',
            ])->whereNotIn('id', $orderItens)->paginate();
            return view('logado.cont-compra', compact('order', 'products'));
        }
    }

    public function myOrders (User $user)
    {
        $orders = Order::where([
            'user_id' => $user->id,
        ])->paginate();
        return view('logado.my-orders', compact('orders'));
    }

    public function checkOut(Order $order)
    {
        $data['status'] = 2;
        $order->fill($data);
        $order->save();
        $orderItems = OrderItem::where([
            'order_id' => $order->id,
        ])->get();
        return view('logado.checkout', compact('order', 'orderItems'));
    }

    public function aplicaDesct(Request $request)
    {
        $data = $request->all();
        if ($data['cupom'] == null){
            return redirect()->back();
        }
        $hoje = date_format(now(), 'Y-m-d');
        $cupom = Cupom::where([
            'name' => $data['cupom'],
        ])->first();
        if ($cupom == null){
            $request->session()->flash('msg', 'Cupom não cadastrado no sistema.');
            return redirect()->back();
        }elseif ($cupom->validade != null && $cupom->validade < $hoje){
            $validade = $cupom->validade;
            $valid = date_create_from_format("Y-m-d", $validade)->format('d/m/Y');
            $request->session()->flash('msg', 'Este cupom venceu no dia '.$valid);
            return redirect()->back();
        }elseif ($cupom->ativo == false){
            $request->session()->flash('msg', 'Este cupom não está válido.');
            return redirect()->back();
        }else{
            if (!$cupom->percent){
                $order = Order::find($data['order_id']);
                if ($order->cupom_id != null){
                    $request->session()->flash('msg', 'Esta operação já teve desconto aplicado.');
                    return redirect()->back();
                }else{
                    $dataOrder['total_final'] = $order->total_order - $cupom->value;
                    $dataOrder['obs'] = "Foi aplicado um desconto em Real no valor de R$ ".
                        $cupom->value." concedido após validação do Cupom ".$cupom->name;
                    $dataOrder['cupom_id'] = $cupom->id;
                    $dataOrder['status'] = 2;
                    $order->fill($dataOrder);
                    $order->save();
                    $orderItems = OrderItem::where([
                        'order_id' => $order->id,
                    ])->get();
                    $request->session()->flash('msg', 'Cupom Aplicado com sucesso');
                    return view('logado.checkout', compact('order', 'orderItems'));
                }
            }else{
                $order = Order::find($data['order_id']);
                if ($order->cupom_id != null){
                    $request->session()->flash('msg', 'Esta operação já teve desconto aplicado.');
                    return redirect()->back();
                }else{
                    $dataOrder['total_final'] = $order->total_order - (($order->total_order * $cupom->value)/100);
                    $dataOrder['obs'] = "Foi aplicado um desconto em percentual no valor de ".
                        $cupom->value."% concedido após validação do Cupom ".$cupom->name;
                    $dataOrder['cupom_id'] = $cupom->id;
                    $dataOrder['status'] = 2;
                    $order->fill($dataOrder);
                    $order->save();
                    $orderItems = OrderItem::where([
                        'order_id' => $order->id,
                    ])->get();
                    $request->session()->flash('msg', 'Cupom Aplicado com sucesso');
                    return view('logado.checkout', compact('order', 'orderItems'));
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagseguro(Order $order)
    {
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
        $payment->setSender()->setName($user->name);
        $payment->setSender()->setEmail($user->email);

        $celu = explode(" ", $user->celular);
        $ddd = substr($celu[0], 1, 2);
        $phone = str_replace('-', '', $celu[1]);
        $payment->setSender()->setPhone()->withParameters($ddd, $phone);
        $payment->setSender()->setDocument()->withParameters('CPF', $user->cpf);

        /*
        $payment->setShipping()->setAddress()->withParameters(
            'Av. Brig. Faria Lima',
            '1384',
            'Jardim Paulistano',
            '01452002',
            'São Paulo',
            'SP',
            'BRA',
            'apto. 114'
        );

        $payment->setShipping()->setCost()->withParameters(20.00);
        $payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

        //Add metadata items
        $payment->addMetadata()->withParameters('PASSENGER_CPF', '024.696.195-30');
        $payment->addMetadata()->withParameters('GAME_NAME', 'DOTA');
        $payment->addMetadata()->withParameters('PASSENGER_PASSPORT', '23456', 1);

        //Add items by parameter
        //On index, you have to pass in parameter: total items plus one.
        $payment->addParameter()->withParameters('itemId', '0003')->index(3);
        $payment->addParameter()->withParameters('itemDescription', 'Notebook Amarelo')->index(3);
        $payment->addParameter()->withParameters('itemQuantity', '1')->index(3);
        $payment->addParameter()->withParameters('itemAmount', '200.00')->index(3);

        //Add discount
        $payment->addPaymentMethod()->withParameters(
            PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
            PagSeguro\Enum\PaymentMethod\Config\Keys::DISCOUNT_PERCENT,
            10.00 // (float) Percent
        );

        //Add installments with no interest
        $payment->addPaymentMethod()->withParameters(
            \PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
            \PagSeguro\Enum\PaymentMethod\Config\Keys::MAX_INSTALLMENTS_NO_INTEREST,
            2 // (int) qty of installment
        );

        //Add a limit for installment
        $payment->addPaymentMethod()->withParameters(
            \PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
            \PagSeguro\Enum\PaymentMethod\Config\Keys::MAX_INSTALLMENTS_LIMIT,
            6 // (int) qty of installment
        );

        // Add a group and/or payment methods name
        $payment->acceptPaymentMethod()->groups(
            \PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
            \PagSeguro\Enum\PaymentMethod\Group::BALANCE
        );
        $payment->acceptPaymentMethod()->name(\PagSeguro\Enum\PaymentMethod\Name::DEBITO_ITAU);
        // Remove a group and/or payment methods name
        $payment->excludePaymentMethod()->group(\PagSeguro\Enum\PaymentMethod\Group::BOLETO);

        */
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
        //dd($result);
        return redirect()->away($result);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notification(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderItems = OrderItem::where([
            'order_id' => $order->id,
        ])->get();
        return view('logado.show', compact('order', 'orderItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orderItens = OrderItem::where([
            'order_id' => $order->id,
        ])->pluck('product_id')->toArray();

        $products = Product::with('photos')->where([
            'ativo' => 's',
        ])->whereNotIn('id', $orderItens)->paginate();
        return view('logado.cont-compra', compact('order', 'products'));
    }

    public function productCont(Product $product, Order $order)
    {
        $orderItems = OrderItem::where([
            'order_id' => $order->id,
        ])->get();
        return view('logado.produto-cont', compact('product', 'order', 'orderItems'));
    }

    public function editMyOrder(Order $order)
    {
        $orderItems = OrderItem::where([
            'order_id' => $order->id,
        ])->get();
        return view('logado.edit', compact('order', 'orderItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->all();
        $qtdNovo = $data['qtd'];
        $product = Product::find($data['product_id']);
        $orderItem = OrderItem::where([
            'product_id' => $data['product_id'],
            'order_id' => $order->id,
        ])->first();
        $data['order_id'] = $order->id;
        if ($orderItem != null){
            $data['qtd'] = $orderItem->qtd + $data['qtd'];
            $data['total_item'] = $product->price * $data['qtd'];
           $orderItem->fill($data);
           $orderItem->save();
        }else{
            $data['total_item'] = $product->price * $data['qtd'];
           OrderItem::create($data);
        }
        $orderData['total_order'] = $order->total_order + $product->price * $qtdNovo;
        $order->fill($orderData);
        $order->save();

        $request->session()->flash('msg', 'Pedido atualizado com sucesso!');
        return redirect()->route('logado.pedido.show', ['order' => $order->id]);
    }

    public function atualizOrder(Request $request)
    {
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $qtd = $data['qtd'];
        if($qtd == 0){
            $item = OrderItem::find($data['item_id']);
            $orderData['total_order'] = $order->total_order - $item->total_item;
            $order->fill($orderData);
            $order->save();
            $item->delete();
            $orderItems = OrderItem::where([
                'order_id' => $order->id,
            ])->get();
            return view('logado.edit', compact('order', 'orderItems'));
        }else{
            $item = OrderItem::find($data['item_id']);
            $itemData['total_item'] = $item->product->price * $qtd;
            $itemData['qtd'] = $qtd;
            $orderData['total_order'] = ($order->total_order - $item->total_item) + $itemData['total_item'];
            $order->fill($orderData);
            $order->save();
            $item->fill($itemData);
            $item->save();
            $orderItems = OrderItem::where([
                'order_id' => $order->id,
            ])->get();
            return view('logado.edit', compact('order', 'orderItems'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        dd("Implantar o destroy da Order");
    }
}
