<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Utiles\ResponseCode;
use Illuminate\Http\Request;
use App\Enums\LoginUserEnum;
class UserController extends MainController
{
    ///register new user
    public function register_user(RegisterUserRequest $request){

        $res= UserService::registerUser($request->name,$request->email,$request->password,$request->type,$request->personal_photo,
        $request->telephone, $request->name_of_the_bank,$request->account_number,$request->residence_photo,
        $request->location,$request->categories_id , $request->sub_categories_id);
        return $this->successResponse(new UserResource($res));

    }


    //// login user
    public function login_user(LoginRequest $request){
        $res = UserService::loginUser($request->email , $request->password);
        if($res==LoginUserEnum::ACCOUNT_DOES_NOT_EXIST){
            return $this->errorResponse('You do not have an account' ,ResponseCode::Not_Found);
        }
        elseif($res==LoginUserEnum::WRONG_PASSWORD){
            return $this->errorResponse('Wrong password' , ResponseCode::Bad_request);
        }
        elseif($res==LoginUserEnum::PENDING_ORDER){
            return $this->errorResponse('Your register order is still pending, it must be managed by an admin .',ResponseCode::ORDER_PENDING);
        }
        elseif($res==LoginUserEnum::DENIED_ORDER){
            return $this->errorResponse('Your register order has been denied by an admin .',ResponseCode::ORDER_DENIED);
        }
        return $this->successResponse(new UserResource($res));

    }

    /// logout user
    public function logout_user(){
        $res = UserService::logoutUser();
        return $this->successResponse([],'Logged out Successfully');
    }
}
