<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductIndexResource;
use App\Response\Response;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
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

    public function store(Request $request)
    {
        $product = $this->productService->store($request->only('category_id','title','price','stock'));
        return Response::store(['id' => $product->id], 'Product Successful');
    }

    public function show($id)
    {
        $product = $this->productService->show($id);
        return $product
            ? new ProductIndexResource($product)
            : Response::notRecord('Product Not Record');
    }

    public function update($id, Request $request): JsonResponse
    {
        $product = $this->productService->update($id, $request->all());
        return $product
            ? Response::update(['id' => $product->id], 'Product Updated')
            : Response::notRecord('Product Not Record');
    }

    public function destroy(Request $request): JsonResponse
    {
        $product = $this->productService->destroy($request->only('id'));
        return $product
            ? Response::destroy(['id' => $request->id], 'Product Deleted')
            : Response::notRecord('Product Not Record');
    }

}
