<?php

namespace App\Services;

use App\DataObjects\SubCategoryDataObject;
use App\Repository\CategoryRepositoryInterface;

class SubCategoryService
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function getCategoryByAll($id)
    {
        return $this->categoryRepository->getCategoryByAll($id);
    }

    public function store($data)
    {
        $dataObject = new SubCategoryDataObject($data['parent'],$data['title']);
        return $this->categoryRepository->subCategoryStore($dataObject);
    }
}
