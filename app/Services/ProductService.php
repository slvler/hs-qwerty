<?php

namespace App\Services;

use App\Repository\ProductRepositoryInterface;

class ProductService
{
    public function __construct(private ProductRepositoryInterface $productRepository)
    {
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }
}
