<?php

namespace GeProj\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GeProj\Entities\ProjectTask;
use GeProj\Presenters\ProjectTaskPresenter;

/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace GeProj\Repositories;
 */
class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTask::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function presenter()
    {
        return ProjectTaskPresenter::class;
    }
}