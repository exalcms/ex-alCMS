<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Association.
 *
 * @package namespace App\Models;
 */
class Association extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'cnpj', 'raz_soc', 'end', 'site',
        'email', 'tel', 'comple_end', 'bairro', 'cep', 'cidade', 'uf',
        ];


    public function getTableHeaders()
    {
        return ['Nome', 'CNPJ', 'E-mail'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Nome':
                return $this->raz_soc;
            case 'CNPJ':
                return $this->cnpj;
            case 'E-mail':
                return $this->email;
        }
    }
}
