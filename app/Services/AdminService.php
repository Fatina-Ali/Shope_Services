<?php

namespace App\Services;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Enums\LoginUserEnum;
use Illuminate\Support\Facades\Auth;
class AdminService{

    ///// register admin
    public static function registerAdmin($name , $email , $password){

        $admin = Admin::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password)
        ]);
        $token= $admin->createToken('web admin token')->plainTextToken;
        $admin['accessToken']=$token;

        return $admin;
    }

    ///// login admin
    public static function loginAdmin($email , $password){

        $admin=Admin::where('email',$email)->get();

        if($admin->count()==0){
            return LoginUserEnum::ACCOUNT_DOES_NOT_EXIST;
        }
        if(auth()->guard('admin')->attempt(['email' => $email,  'password' => $password])){
            $admin= Auth::guard('admin')->user();
            $admin->tokens()->where('name', 'web admin token')->delete();
            $tokenResult = $admin->createToken('web admin token');
            $token = $tokenResult->plainTextToken;
            $admin['accessToken']=$token;
            return $admin;
        };
        return LoginUserEnum::WRONG_PASSWORD;

    }



    //// logout user
    public static function logoutAdmin(){
        
        auth()->user()->tokens()->delete();
        return true;
    }
}
