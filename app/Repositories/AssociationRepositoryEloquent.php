<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AssociationRepository;
use App\Models\Association;
use App\Validators\AssociationValidator;

/**
 * Class AssociationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AssociationRepositoryEloquent extends BaseRepository implements AssociationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Association::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
