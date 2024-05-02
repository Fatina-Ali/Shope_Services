<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\Api\AddCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends MainController
{
    //add new category
    public function add_category(AddCategoryRequest $request){
        $res= CategoryService::addCategory($request->name);
        return $this->successResponse($res);

    }
}
