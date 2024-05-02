<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Resources\AdminResource;
use App\Utiles\ResponseCode;
use App\Http\Controllers\MainController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\Dashboard\RegisterAdminRequest;
use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Enums\LoginUserEnum;
class AdminController extends MainController
{
    ///// register for new admin
    public function register_admin(RegisterAdminRequest $request){
        $res= AdminService::registerAdmin($request->name,$request->email, $request->password);
        return $this->successResponse(new AdminResource($res));
    }

    //// login admin
    public function login_admin(LoginRequest $request){
        $res= AdminService::loginAdmin($request->email, $request->password);
        if($res==LoginUserEnum::ACCOUNT_DOES_NOT_EXIST){
            return $this->errorResponse('You do not have an account' , ResponseCode::Not_Found);
        }
        elseif($res==LoginUserEnum::WRONG_PASSWORD){
            return $this->errorResponse('Wrong password' , ResponseCode::Bad_request);
        }
        return $this->successResponse(new AdminResource($res));
    }


    ///// logout admin
    public function logout_admin(){
        $res=AdminService::logoutAdmin();
        return $this->successResponse([],'Logged out Successfully');
    }
}
