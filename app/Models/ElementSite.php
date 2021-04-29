<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ElementSite.
 *
 * @package namespace App\Models;
 */
class ElementSite extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['quem_somos', 'text_abert', 'missao', 'visao', 'valores',
         'oferec_title', 'oferec_text', 'se_associa_title', 'se_associa_text',
        'histo_title', 'histo_subtitulo', 'histo_resum', 'histo_text',
        ];

    public function getTableHeaders()
    {
        return ['ID', 'Data de Criação'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Data de Criação':
                return $this->created_at->format('d/m/Y - h:m:s');
        }
    }
}
