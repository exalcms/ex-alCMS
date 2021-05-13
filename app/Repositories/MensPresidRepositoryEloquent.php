<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MensPresidRepository;
use App\Models\MensPresid;
use App\Validators\MensPresidValidator;

/**
 * Class MensPresidRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MensPresidRepositoryEloquent extends BaseRepository implements MensPresidRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MensPresid::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
