<?php


namespace GeProj\Transformers;

use GeProj\Entities\ProjectFile;
use League\Fractal\TransformerAbstract;

class ProjectFileTransformer extends TransformerAbstract
{

    public function transform(ProjectFile $projectFile)
    {
        return[
            'project_file_id' => $projectFile->id,
            'project_id' => $projectFile->project_id,
            'name' => $projectFile->name,
            'description' => $projectFile->description,
            'extension' => $projectFile->extension,
        ];
    }

}