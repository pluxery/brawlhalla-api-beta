<?php

namespace App\Policies;

use App\Models\Legend;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LegendPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Legend $legend
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Legend $legend)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->is_admin ? Response::allow() :
            Response::deny("You do not create legend admin_status = $user->is_admin.");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Legend $legend
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Legend $legend)
    {
        return $user->is_admin ? Response::allow() :
            Response::deny("You do not update legend admin_status = $user->is_admin.");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Legend $legend
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Legend $legend)
    {
        return $user->is_admin ? Response::allow() :
            Response::deny("You do not delete legend admin_status = $user->is_admin.");
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Legend $legend
     * @return \Illuminate\Auth\Access\Response|bool
     */
}
