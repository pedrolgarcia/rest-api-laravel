<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    
    public function show(Category $category = null)
    {
        if($category) 
        {
            return new CategoryResource($category);
        } 
        else 
        {
            return CategoryResource::collection(Category::all());
        }
    }
    
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        
        return new CategoryResource($category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return new CategoryResource($category);
    }
}
