<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductIndexResource;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return ProductIndexResource::collection($this->productService->getAll());
    }

    public function store($data)
    {
        return $this->productService->store($data);
    }
}
