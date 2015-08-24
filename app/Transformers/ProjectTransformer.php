<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 05/08/15
 * Time: 23:22
 */

namespace GeProj\Transformers;

use GeProj\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['owner', 'client', 'members'];

    public function transform(Project $project)
    {
        return[
            'project_id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
        ];
    }

    public function includeOwner(Project $project)
    {
        return $this->item($project->owner, new ProjectOwnerTransformer);
    }

    public function includeClient(Project $project)
    {
        return $this->item($project->client, new ProjectClientTransformer);
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer);
    }
}