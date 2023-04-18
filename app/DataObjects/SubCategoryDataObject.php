<?php


namespace App\DataObjects;


class SubCategoryDataObject
{

    public string $parent;

    public string $title;

    public function __construct(string $parent, string $title)
    {
        $this->setParent($parent);
        $this->setTitle($title);
    }

    public function getParent(): string
    {
        return $this->parent;
    }

    public function setParent(string $parent): void
    {
        $this->parent = $parent;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}