<?php

namespace App\Policies;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Driver $driver)
    {
        return $user->is_admin;
    }

    public function view(User $user, Driver $driver)
    {
        return $user->is_admin;
    }

    public function update(User $user, Driver $driver) {
        return $user->is_admin;
    }
}
