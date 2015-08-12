<?php


namespace GeProj\Transformers;

use GeProj\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return[
            'member_id' => $member->id,
            'name' => $member->name,

        ];
    }
}