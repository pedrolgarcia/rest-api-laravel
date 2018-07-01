<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['cod', 'name', 'description', 'price', 'category_id'];
    
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}