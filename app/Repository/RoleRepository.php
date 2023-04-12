<?php

namespace App\Repository;

use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function __construct(private Role $role)
    {
    }

    public function getBySlug($role = "editor")
    {
        return $this->role
            ->where('slug','=',$role)
            ->first();
    }
}
