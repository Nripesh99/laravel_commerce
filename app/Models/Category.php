<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function sliders()
    {
        return $this->hasMany(Slider::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }

    // for the subcategories
    public function subcategories()
    {
        return $this->hasMany(\App\Models\Category::class, 'parent_id')->with('subcategories');
    }

    // for the subcategories
    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    }

}


