<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 05/08/15
 * Time: 23:22
 */

namespace GeProj\Transformers;

use GeProj\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{

    public function transform(User $projectMember)
    {
        return[
            'member_id' => $projectMember->id,
            'name' => $projectMember->name,
            'email' => $projectMember->email,
        ];
    }

}