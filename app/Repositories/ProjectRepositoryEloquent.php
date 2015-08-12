<?php
/**
 * Created by PhpStorm.
 * User: alemonteiro
 * Date: 23/07/2015
 * Time: 13:36
 */

namespace GeProj\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GeProj\Entities\Project;
use GeProj\Presenters\ProjectPresenter;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function isOwner($projectId, $userId)
    {
        $isOwner = $this->model->where(['id'=>$projectId, 'owner_id'=>$userId])->count();

        if($isOwner)
        {
            return true;
        }
        return false;
    }

    public function hasMember($projectId, $memberId)
    {
        $project = $this->model->where(['id'=>$projectId])->first();

        foreach($project->members as $member) {
            if($member->id == $memberId) {
                return true;
            }
        }
        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }

}