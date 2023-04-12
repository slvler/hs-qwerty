<?php

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $user)
    {
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function getById($id)
    {
        return $this->user->whereId($id)
            ->first();
    }

    public function store($data)
    {
        return $this->user->create($data);
    }

    public function show($id)
    {
        return $this->getById($id);
    }

    public function update($id, $data)
    {
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }

    public function destroy($id)
    {
        $user = $this->getById($id);
        return $user->delete();
    }
}
