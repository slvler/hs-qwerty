<?php

namespace App\Services;

use App\Repository\UserRepositoryInterface;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private RoleService $roleService
    )
    {
    }
    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function store($data)
    {
        $user = $this->userRepository->store($data);
        $role = $this->roleService->getBySlug();
        $user->roles()->attach($role);
        return $user;
    }

    public function show($id)
    {
        return $this->userRepository->show($id);
    }

    public function update($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->userRepository->destroy($id);
    }
}
