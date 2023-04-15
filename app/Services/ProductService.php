<?php

namespace App\Services;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private CategoryRepositoryInterface $categoryRepository
    )
    {
    }
    public function getAll()
    {
        return $this->productRepository->getAll();
    }
    public function store($data)
    {
        return $this->productRepository->store($data);
    }
    public function show($id)
    {
        return $this->productRepository->show($id);
    }
    public function update($id, $data)
    {
        return $this->productRepository->update($id, $data);
    }
    public function destroy($id)
    {
        return $this->productRepository->destroy($id);
    }
}
