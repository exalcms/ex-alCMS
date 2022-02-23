<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OrderItem.
 *
 * @package namespace App\Models;
 */
class OrderItem extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'order_id', 'qtd','total_item'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getTableHeaders()
    {
        return ['Nome', 'Qtd', 'Valor Unit', 'Total Item'];
    }

    public function getValueForHeader($header)
    {
        $total = $this->product->price * $this->qtd;
        switch ($header) {
            case 'Nome':
                return $this->product->name;
            case 'Qtd':
                return $this->qtd;
            case 'Valor Unit':
                return 'R$ '.number_format($this->product->price, 2, ',', '.');
            case 'Total Item':
                return 'R$ '.number_format($total, 2, ',', '.');
        }
    }
}
