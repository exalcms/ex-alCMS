<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ElementSiteRepository;
use App\Models\ElementSite;
use App\Validators\ElementSiteValidator;

/**
 * Class ElementSiteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ElementSiteRepositoryEloquent extends BaseRepository implements ElementSiteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ElementSite::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
