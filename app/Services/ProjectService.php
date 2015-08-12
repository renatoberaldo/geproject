<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 23/07/15
 * Time: 00:54
 */

namespace GeProj\Services;


use GeProj\Repositories\ProjectMemberRepository;
use GeProj\Repositories\ProjectRepository;
use GeProj\Validators\ProjectMemberValidator;
use GeProj\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    protected $repository;
    /**
     * @var ProjectValidator
     */
    private $validator;
    /**
     * @var Filesystem
     */
    private $fileSystem;
    /**
     * @var Storage
     */
    private $storage;
    /**
     * @var ProjectMemberService
     */
    private $projectMemberService;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, ProjectMemberService $projectMemberService, Filesystem $fileSystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->projectMemberService = $projectMemberService;
        $this->fileSystem = $fileSystem;
        $this->storage = $storage;
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

    public function showMembers($project_id)
    {
        return $this->projectMemberService->showMembers($project_id);
    }

    public function addMember(array $data)
    {
        return $this->projectMemberService->addMember($data);
    }

    public function removeMember(array $data)
    {
        return $this->projectMemberService->removeMember($data);
    }

    public function isMember(array $data)
    {
        $this->projectMemberService->isMember($data);
    }

    public function createFile(array $data)
    {
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);

        $this->storage->put($projectFile->id.".".$data['extension'], $this->fileSystem->get($data['file']));
    }

}