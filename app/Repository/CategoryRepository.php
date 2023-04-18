<?php

namespace App\Repository;

use App\DataObjects\SubCategoryDataObject;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(private Category $category)
    {
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function getById($id)
    {
        return $this->category->whereId($id)
            ->first();
    }

    public function store($data)
    {
        return $this->category->create($data);
    }

    public function show($id)
    {
        return $this->getById($id);
    }

    public function update($id, $data)
    {
        $category = $this->getById($id);
        $category->update($data);
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->getById($id);
        return $category->delete();
    }


    public function getCategoryByAll($id)
    {
        return $this->category
            ->where('parent','=',$id)
            ->get();
    }

    public function subCategoryStore(SubCategoryDataObject $data)
    {
        return $this->category->create([
            'parent' => $data->getParent(),
            'title' => $data->getTitle()
        ]);
    }


}
