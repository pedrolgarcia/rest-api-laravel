<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\CategoryResource;
use App\Category;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'cod'=>$this->cod,
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>number_format($this->price, 2),
            'category'=>new CategoryResource(Category::find($this->category_id))
        ];
    }
}
