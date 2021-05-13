<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ExPresidenteRepository;
use App\Models\ExPresidente;
use App\Validators\ExPresidenteValidator;

/**
 * Class ExPresidenteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ExPresidenteRepositoryEloquent extends BaseRepository implements ExPresidenteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ExPresidente::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
