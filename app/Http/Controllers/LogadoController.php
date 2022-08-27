<?php

namespace App\Http\Controllers;

use App\Mail\SendMailUser;
use App\Models\Cupom;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            'status', [3,4,5])->first();
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
            'status', [3,4,5])->first();
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

            OrderItem::create($orderItem);
            $orderItems = OrderItem::where([
                'order_id' => $order->id,
            ])->get();

            return view('logado.my-order', compact('order', 'orderItems'));
        }
    }

    public function nossaLojaUser(User $user)
    {
        $order = Order::where([
            'user_id' => $user->id,
        ])->whereNotIn(
            'status', [3,4,5])->first();
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
        $data['status'] = 3;
        $order->fill($data);
        $order->save();

        $user = User::find($order->user_id);
        $emailTo = $user->email;
        $nome = $user->name;
        $date = now();

        $messagem  = "Olá $nome,";
        $messagem .= "<br/><br/>";
        $messagem .= "Seu pedido de nº ".$order->order_num." já está registrado e encontra-se atualmente<br/>";
        $messagem .= "aguardando a confirmação do pagamento. Lhe manteremos informado durante toda tramitação.";
        $messagem .= "<br/><br/>";
        $messagem .= "Obrigado pela sua atitude. <br/>";
        $messagem .= "Esta é uma mensagem automática, por favor não responda este email!";
        $messagem .= "<br/><br/>";
        $messagem .= "Caso tenha mais alguma dúvida, pode nos contatar, enviando o número, do pedido através do nosso formulário no site</br>";

        $mailData = [
            'title' => 'Status do pedido nº '.$order->order_num,
            'sub-title' => 'Acompanhamento de pedido',
            'mensagem' => $messagem,
            'url' => null,
            'title-button' => null,
            'date' => $date,
        ];

        Mail::to($emailTo)->send(new SendMailUser($mailData));


        return view('logado.finally', compact('order'));
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
        $orderItems = OrderItem::where([
            'order_id' => $order->id,
        ])->get();

        if (count($orderItems) > 0){
            foreach ($orderItems as $orderItem){
                $orderItem->delete();
            }
        }
        $order->delete();
        $request->session()->flash('msg', 'Pedido deletado com sucesso');
        return redirect()->route('dashboard');
    }
}
