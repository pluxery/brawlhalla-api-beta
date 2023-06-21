<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }


    public function view(?User $user): bool
    {
        return true;
    }


    public function create(?User $user): bool
    {
        return true;
    }


    public function update(User $authUser, User $otherUser): Response
    {
        return $authUser->id === $otherUser->id || $authUser->is_admin
            ? Response::allow() : Response::deny("You do not update user.");
    }

    public function delete(User $authUser, User $otherUser): Response
    {

        return $authUser->id === $otherUser->id || $authUser->is_admin
            ? Response::allow() : Response::deny("You do not delete user.");
    }



}
