<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Mensagem.
 *
 * @package namespace App\Models;
 */
class Mensagem extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'user_id', 'tele', 'meio_comunic',
        'mensagem', 'status', 'resposta', 'subject',
        'resp_data', 'resp_autor', 'cadastrado',
    ];

    public function getTableHeaders()
    {
        return ['Data', 'Autor', 'Assunto', 'Status'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Data':
                return Carbon::parse($this->updated_at)->format('d/m/Y');
            case 'Autor':
                return $this->nome;
            case 'Assunto':
                return $this->subject;
            case 'Status':
                if ($this->status == 'nl'){
                    return 'Não Lida';
                }elseif($this->status == 'l'){
                    return 'Lida';
                }elseif ($this->status == 'resp'){
                    return 'Respondida';
                }
        }
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
