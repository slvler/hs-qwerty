<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(private Product $product)
    {
    }
    public function getAll()
    {
        return $this->product->all();
    }
}
