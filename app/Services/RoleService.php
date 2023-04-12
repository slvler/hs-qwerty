<?php

namespace App\Services;

use App\Repository\RoleRepositoryInterface;

class RoleService{

    public function __construct(private RoleRepositoryInterface $roleRepository)
    {
    }

    public function getBySlug()
    {
        return $this->roleRepository->getBySlug();
    }

}
