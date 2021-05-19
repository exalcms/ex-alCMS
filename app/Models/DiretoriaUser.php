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
    protected $fillable = ['diretoria_id', 'user_id', 'ativo', 'inic_mand', 'fim_mand', 'photo_id', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function diretoria()
    {
        return $this->belongsTo(Diretoria::class, 'diretoria_id', 'id');
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class, 'photo_id', 'id');
    }

    public function getTableHeaders()
    {
        return ['Id'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
        }
    }
}
