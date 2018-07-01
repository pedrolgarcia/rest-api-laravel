<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use JWTAuthException;
use JWTAuth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    
    public function show(Product $product = null)
    {
        if($product) 
        {
            return new ProductResource($product);
        }
        else
        {
            return ProductResource::collection(Product::all());
        }
    }

    public function showByCategory(Category $category)
    {
        return ProductResource::collection(Product::where('category_id', $category->id)->get());
    }

    public function store(Request $request)
    {
        $products = Product::create($request->all());
        
        return new ProductResource($products);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return new ProductResource($product);    
    }
}
