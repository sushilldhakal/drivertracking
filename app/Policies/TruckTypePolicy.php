<?php

namespace App\Policies;

use App\Models\TruckType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TruckTypePolicy
{
    use HandlesAuthorization;

    public function create(User $user, TruckType $driver)
    {
        return $user->is_admin;
    }
}
