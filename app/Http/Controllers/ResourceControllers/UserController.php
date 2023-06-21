<?php

namespace App\Http\Controllers\ResourceControllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Services\UserService;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{


    /**
     * @var UserService
     */
    private $service;

    function __construct(UserService $service)
    {
        $this->service = $service;
        $this->authorizeResource(User::class, 'user');
    }

    function index(): AnonymousResourceCollection
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    function show(User $user): UserResource
    {
        return new UserResource($user);

    }

    function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $result = $this->service->update($data, $user);
        if ($result instanceof User) {
            return new UserResource($result);
        }
        return $result;
    }

    function destroy(User $user): ?bool
    {

        return $user->delete();

    }

    function restore(int $id): ?bool
    {
        return User::withTrashed()->find($id)->restore();
    }
}
