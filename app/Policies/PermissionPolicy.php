<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user){
        return $user->hasAnyPermission(['view permission']);
    }

    public function create(User $user){
        return $user->hasAnyPermission(['create permission']);
    }

    public function edit(User $user){
        return $user->hasAnyPermission(['update permission']);
    }

    public function delete(User $user){
        return $user->hasAnyPermission(['delete permission']);
    }

    public function manage(User $user){
        return $user->hasAnyPermission(['delete permission','create permission','update permission','view permission']);
    }

}
