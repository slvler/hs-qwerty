<?php

namespace App\Services;

use App\Repository\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function store($data)
    {
        return $this->categoryRepository->store($data);
    }

    public function show($id)
    {
        return $this->categoryRepository->show($id);
    }

    public function update($id, $data)
    {
        return $this->categoryRepository->update($id, $data);
    }
    public function destroy($id)
    {
        return $this->categoryRepository->destroy($id);
    }
}
