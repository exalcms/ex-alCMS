<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DiretoriaUserRepository;
use App\Models\DiretoriaUser;
use App\Validators\DiretoriaUserValidator;

/**
 * Class DiretoriaUserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DiretoriaUserRepositoryEloquent extends BaseRepository implements DiretoriaUserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DiretoriaUser::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
