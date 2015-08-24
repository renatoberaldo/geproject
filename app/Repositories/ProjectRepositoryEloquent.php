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

        $project = $this->findWhere(['id'=>$projectId, 'owner_id'=>$userId]);

        //Esse ['data'] é por causa do presenter()
        if($project['data']) {
            return true;
        }
        return false;

    }

    public function showMembers($projectId)
    {
        $project = $this->findWhere(['id'=>$projectId]);

        //Esse ['data'] é por causa do presenter()
        if($project['data']) {
            return $project['data'][0]['members'];
        }
        return "";
    }

    public function hasMember($projectId, $memberId)
    {
        $project = $this->findWhere(['id'=>$projectId]);

        //Esse ['data'] é por causa do presenter()
        if($project['data']) {
            foreach($project['data'][0]['members'] as $member) {
                if($member[0]['member_id'] == $memberId){
                    return true;
                }
            }
        }
        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }

}