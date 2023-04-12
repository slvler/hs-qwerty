<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserIndexResource;
use App\Response\Response;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{

    public function __construct(private UserService $userService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return UserIndexResource::collection($this->userService->getAll());
    }

    public function store(UserStoreRequest $request): JsonResponse
    {
        $user = $this->userService->store($request->only('name','email','password'));
        return Response::store(['id' => $user->id], 'User Successful');
    }

    public function show($id)
    {
        $user = $this->userService->show($id);
        return $user
            ? new UserIndexResource($user)
            : Response::notRecord('User Not Record');
    }

    public function update($id, Request $request): JsonResponse
    {
        $user = $this->userService->update($id, $request->all());
        return $user
            ? Response::update(['id' => $user->id], 'User Updated')
            : Response::notRecord('User Not Record');
    }

    public function destroy(Request $request): JsonResponse
    {
        $user = $this->userService->destroy($request->only('id'));
        return $user
            ? Response::destroy(['id' => $request->id], 'User Deleted')
            : Response::notRecord('User Not Record');
    }

}
