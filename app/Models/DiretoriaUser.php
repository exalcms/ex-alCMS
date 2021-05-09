<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class DiretoriaUser.
 *
 * @package namespace App\Models;
 */
class DiretoriaUser extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_diretoria', 'id_user', 'ativo', 'inic_mand', 'fim_mand'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function diretoria()
    {
        return $this->belongsTo(Diretoria::class, 'id_diretoria', 'id');
    }

    public function getTableHeaders()
    {
        return ['Id', 'Cargo', 'Titular'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
            case 'Cargo':
                return $this->diretoria->cargo;
            case 'Titular':
                return $this->user->name_full;
        }
    }
}
