<?php

namespace App\Http\Controllers\ResourceControllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{


    /**
     * @var UserService
     */
    private $service;

    function __construct(UserService $service)
    {
        $this->service = $service;
    }

    function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    function show(User $user)
    {
        return new UserResource($user);

    }

    function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $result = $this->service->update($data, $user);
        if ($result instanceof User){
            return new UserResource($result);
        }
        return $result;
    }
}
