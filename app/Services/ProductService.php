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
        $product = $this->productRepository->store($data);
    }
}
