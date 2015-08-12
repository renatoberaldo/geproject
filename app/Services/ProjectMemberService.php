<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 23/07/15
 * Time: 00:54
 */

namespace GeProj\Services;


use GeProj\Repositories\ProjectMemberRepository;
use GeProj\Validators\ProjectMemberValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectMemberService
{
    /**
     * @var ProjectMemberRepository
     */
    protected $repository;
    /**
     * @var ProjectMemberValidator
     */
    private $validator;

    public function __construct(ProjectMemberRepository $repository, ProjectMemberValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function addMember(array $data)
    {
        if(!$this->isMember($data)) {
            return $this->create($data);
        } else {
            return [
                'error' => true,
                'message' => 'addMember error: already a member'
            ];
        }
    }

    public function removeMember(array $data)
    {
        if($this->isMember($data)) {
            $projectMember = $this->repository->findWhere(['project_id'=>$data['project_id'], 'member_id'=>$data['member_id']])->first();
            $this->repository->delete($projectMember->id);
        } else {
            return [
                'error' => true,
                'message' => 'removeMember error: is not a member of project'
            ];
        }
    }

    public function isMember(array $data)
    {
        $totalMember = count($this->repository->findWhere(['project_id'=>$data['project_id'], 'member_id'=>$data['member_id']]));

        if($totalMember > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function showMembers($project_id)
    {
        return $this->repository->findWhere(['project_id'=>$project_id]);
    }
}