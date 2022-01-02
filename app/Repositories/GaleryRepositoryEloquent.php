<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GaleryRepository;
use App\Models\Galery;
use App\Validators\GaleryValidator;

/**
 * Class GaleryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GaleryRepositoryEloquent extends BaseRepository implements GaleryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Galery::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
