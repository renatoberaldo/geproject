<?php

namespace GeProj\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GeProj\Entities\ProjectMember;
use GeProj\Presenters\ProjectMemberPresenter;

/**
 * Class ProjectMemberRepositoryEloquent
 * @package namespace GeProj\Repositories;
 */
class ProjectMemberRepositoryEloquent extends BaseRepository implements ProjectMemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMember::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

//    public function presenter()
//    {
//        return ProjectMemberPresenter::class;
//    }
}