<?php

namespace App\Services;
use App\Models\Category;

class CategoryService{

    //// add new category
    public static function addCategory($name){
        $category = Category::create([
            'name'=>$name,
        ]);
        return $category;

    }
}
