<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MensPresid.
 *
 * @package namespace App\Models;
 */
class MensPresid extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tema', 'introd', 'texto', 'user_id', 'publica', 'ativa'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTableHeaders()
    {
        return ['Id', 'Tema', 'Autor', 'Publicado', 'Ativa'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
            case 'Tema':
                return $this->tema;
            case 'Autor':
                return $this->user->name;
            case 'Publicado':
                if ($this->publica == 's'){
                    return 'Sim';
                }else{
                    return 'Não';
                }
            case 'Ativa':
                if ($this->ativa == 's'){
                    return 'Sim';
                }else{
                    return 'Não';
                }
        }
    }
}
