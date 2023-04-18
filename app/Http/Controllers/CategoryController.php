<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Resources\CategoryIndexResource;
use App\Response\Response;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        return CategoryIndexResource::collection($this->categoryService->getAll());
    }

    public function store(CategoryStoreRequest $request): JsonResponse
    {
        $category = $this->categoryService->store($request->only('parent','title'));
        return Response::store(['id' => $category->id], 'Category Successful');
    }

    public function show($id)
    {
        $category = $this->categoryService->show($id);
        return $category
            ? new CategoryIndexResource($category)
            : Response::notRecord('Category Not Record');
    }

    public function update($id, Request $request): JsonResponse
    {
        $category = $this->categoryService->update($id, $request->all());
        return $category
            ? Response::update(['id' => $category->id], 'Category Updated')
            : Response::notRecord('Category Not Record');
    }

    public function destroy(Request $request): JsonResponse
    {
        $category = $this->categoryService->destroy($request->only('id'));
        return $category
            ? Response::destroy(['id' => $request->id], 'Category Deleted')
            : Response::notRecord('Category Not Record');
    }
}
