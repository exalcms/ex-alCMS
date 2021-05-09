<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Diretoria.
 *
 * @package namespace App\Models;
 */
class Diretoria extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo', 'atribui', 'ativo'];

    public function getTableHeaders()
    {
        return ['Id', 'Cargo', 'Atribuição'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
            case 'Cargo':
                return $this->cargo;
            case 'Atribuição':
                    return $this->atribui;
        }
    }

}
