<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Convenio.
 *
 * @package namespace App\Models;
 */
class Convenio extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa', 'end', 'comple', 'tele', 'site',
        'email', 'objeto', 'beneficios', 'condicions',
        'icon', 'color', 'photo', 'obs', 'data_valid',
        'ativo',
    ];

    public function getTableHeaders()
    {
        return ['Validade'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Validade':
                return Carbon::parse($this->data_valid)->format('d/m/Y');
        }
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'convenio_photos', 'convenio_id', 'photo_id');
    }
}
