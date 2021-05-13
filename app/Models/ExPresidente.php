<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ExPresidente.
 *
 * @package namespace App\Models;
 */
class ExPresidente extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'inicio', 'final', 'msg', 'publica', 'foto_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function getTableHeaders()
    {
        return [ 'Id'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Id':
                return $this->id;
        }
    }
}
