<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MensagemRepository;
use App\Models\Mensagem;
use App\Validators\MensagemValidator;

/**
 * Class MensagemRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MensagemRepositoryEloquent extends BaseRepository implements MensagemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Mensagem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
