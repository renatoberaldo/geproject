<?php


namespace GeProj\Transformers;

use GeProj\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectOwnerTransformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return[
            'owner_id' => $member->id,
            'name' => $member->name,

        ];
    }
}