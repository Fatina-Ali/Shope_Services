<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\Api\AddSubCategoryRequest;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends MainController
{
    ///add sub category
    public function add_sub_category(AddSubCategoryRequest $request){
        $res = SubCategoryService::addSubCategory($request->category_id , $request->name);
        return $this->successResponse($res);

    }
}
