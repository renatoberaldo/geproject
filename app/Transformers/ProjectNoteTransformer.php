<?php


namespace GeProj\Transformers;

use GeProj\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{

    public function transform(ProjectNote $projectNote)
    {
        return[
            'project_note_id' => $projectNote->id,
            'project_id' => $projectNote->project_id,
            'title' => $projectNote->title,
            'note' => $projectNote->note,
        ];
    }

}