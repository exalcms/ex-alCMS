<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Order.
 *
 * @package namespace App\Models;
 */
class Order extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    //STATUS DAS ORDENS
    const ORDER_OPENED = 1; //aberta ainda sem totalizar
    const ORDER_CLOSED = 2; //fechada aguardando pagamento
    const ORDER_PAGSEGURO = 3; // Pagamento em processamento
    const ORDER_DELIVERED = 4; //paga aguardando entrega ao cliente
    const ORDER_FINALIZADA = 5; //entregue e totalmente finalizada


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'date', 'order_num',
        'payment', 'total_order', 'status',
        'obs', 'cupom_id', 'total_final'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cupom()
    {
        return $this->hasOne(Cupom::class, 'cupom_id', 'id');
    }

    public function getTableHeaders()
    {
        return ['Data', 'Cliente', 'Número', 'Valor', 'Status'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'Data':
                return \Carbon\Carbon::parse($this->date)->format('d/m/Y');
            case 'Cliente':
                return $this->user->name_full;
            case 'Número':
                return $this->order_num;
            case 'Valor':
                return number_format($this->total_order, 2, ',', '.');
            case 'Status':
                switch ($this->status){
                    case 1:
                        return 'Pedido aberto';
                    case 2:
                        return 'Pedido fechado aguardando pagamento';
                    case 3:
                        return 'Processando Pagamento';
                    case 4:
                        return 'Pedido pago aguardando a entrega';
                    case 5:
                        return 'Pedido concluído';
                }
        }
    }
}
