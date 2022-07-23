<?php

namespace App\Policies;

use App\Models\Depot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepotPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Depot $driver)
    {
        return $user->is_admin;
    }
}
