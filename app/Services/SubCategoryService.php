<?php

namespace App\Services;
use App\Models\Category;
use App\Models\Sub_Category;

class SubCategoryService
{
    /// add new sub category
    public static function addSubCategory($category_id , $name){
        $category = Category::findOrFail($category_id);
        $sub_category = $category->sub_categories()->create([
            'name'=>$name
        ]);
        return $sub_category;

    }
}
