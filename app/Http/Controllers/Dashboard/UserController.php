<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\Dashboard\UpdateStatusRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends MainController
{
    ///// get pending users their registeration orders
    public function get_pending_users(){
        $res = UserService::getPendingUsers();
        return $this->successResponse(UserResource::collection($res));
    }



    /////// update status registeration orders
    public function update_status($id ,UpdateStatusRequest $request){

        $res = UserService::updateStatus($id , $request->status);
        return $this->successResponse(new UserResource($res));
    }
}
