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

    public function getById($id)
    {
        return $this->product->whereId($id)
            ->first();
    }

    public function store($data)
    {
        return $this->product->create($data);
    }

    public function show($id)
    {
        $product = $this->getById($id);
        return $product->load('category');
    }

    public function update($id, $data)
    {
        $product = $this->getById($id);
        $product->update($data);
        return $product;
    }

    public function destroy($id)
    {
        $product = $this->getById($id);
        return $product->delete();
    }
}
