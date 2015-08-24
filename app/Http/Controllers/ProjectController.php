<?php

namespace GeProj\Http\Controllers;


use GeProj\Repositories\ProjectRepository;
use GeProj\Services\ProjectService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ProjectController extends Controller
{
    private $repository;
    private $service;


    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->findWhere(['owner_id'=>Authorizer::getResourceOwnerId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if($this->checkProjectPermissions($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->repository->find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        $this->repository->delete($id);
    }

    public function showMembers($id)
    {
        if($this->checkProjectPermissions($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->service->showMembers($id);
    }

    public function addMember(Request $request, $id)
    {
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbidden, , just the owner can add members'];
        }

        $data = ['project_id'=>$id, 'member_id'=>$request['member_id']];
        return $this->service->addMember($data);
    }

    public function removeMember($id, $memberId)
    {
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbidden, just the owner can remove members'];
        }

        $data = ['project_id'=>$id, 'member_id'=>$memberId];
        return $this->service->removeMember($data);
    }

    public function isMember($id, $memberId)
    {
        $data = ['project_id'=>$id, 'member_id'=>$memberId];

        if ($this->service->isMember($data)){
            return ['isMember' => 'true'];
        }

        return ['isMember' => 'false'];
    }

    private function checkProjectOwner($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectId, $userId);

    }

    private function checkProjectMember($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($projectId, $userId);

    }

    private function checkProjectPermissions($projectId)
    {
        if($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)) {
            return true;
        }
        return false;
    }


}
