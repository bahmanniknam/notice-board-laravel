<?php

namespace App\Services\User\Concretes;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * UserService
 */
class UserService
{
    /**
     * Return List of users
     *
     * @return User[]|Collection
     */
    public function all()
    {
        return User::all();
    }
}
