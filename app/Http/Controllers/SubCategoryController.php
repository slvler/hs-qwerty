<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Resources\SubCategoryIndexResource;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function __construct(private SubCategoryService $subCategoryService)
    {
        
    }

    public function index($id)
    {
        return SubCategoryIndexResource::collection($this->subCategoryService->getCategoryByAll($id));
    }

    public function store(SubCategoryStoreRequest $request)
    {
        $subCategory = $this->subCategoryService->store($request->validated());
        return Response::store(['id' => $subCategory->id], 'SubCategory Successful');
    }

}
