<?php


namespace GeProj\Transformers;

use GeProj\Entities\ProjectTask;
use League\Fractal\TransformerAbstract;

class ProjectTaskTransformer extends TransformerAbstract
{

    public function transform(ProjectTask $projectTask)
    {
        return[
            'project_task_id' => $projectTask->id,
            'name' => $projectTask->name,
            'project_id' => $projectTask->project_id,
            'start_date' => $projectTask->start_date,
            'due_date' => $projectTask->due_date,
            'status' => $projectTask->status,
        ];
    }

}