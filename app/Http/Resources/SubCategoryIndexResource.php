<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryIndexResource extends JsonResource
{

    public function toArray($request): Array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'parent' => new CategoryIndexResource($this->getCategory)
        ];
    }
}
