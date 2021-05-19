<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Photo.
 *
 * @package namespace App\Models;
 */
class Photo extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'photo_path', 'origin_name' ,'using', 'title', 'legenda' ];

    public function getTableHeaders()
    {
        return [ 'Id' ];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
            case 'Nome':
                return $this->origin_name;
            case 'Caminho':
                return  $this->photo_path;
        }
    }
}
