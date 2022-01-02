<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Galery.
 *
 * @package namespace App\Models;
 */
class Galery extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'data', 'local', 'tipo', 'descricao', 'publicada',
    ];

    public function getTableHeaders()
    {
        return ['Data'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Data':
                return Carbon::parse($this->data)->format('d/m/Y');
        }
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'galery_photos', 'galery_id', 'photo_id');
    }
}
