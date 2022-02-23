<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Cupom.
 *
 * @package namespace App\Models;
 */
class Cupom extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','code', 'value', 'percent',
        'validade', 'ativo', 'role', 'user_id',
    ];

    public function getTableHeaders()
    {
        return ['Campanha', 'Desconto', 'Validade', 'Ativo', 'Dest. a'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Campanha':
                return $this->name;
            case 'Desconto':
                if (!$this->percent){
                    return "R$ ".number_format($this->value, 2, ',', '.');
                }else{
                    return $this->value."%";
                }
            case 'Validade':
                if ($this->validade == null){
                    return "Por tempo indeterminado";
                }else{
                    return \Carbon\Carbon::parse($this->validade)->format('d/m/Y');
                }
            case 'Ativo':
                if (!$this->ativo){
                    return "NÃO";
                }else{
                    return "SIM";
                }
            case 'Dest. a':
                return $this->role == 1 ? "Associados" : "Todos";
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
