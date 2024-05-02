<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\LoginUserEnum;
use Illuminate\Support\Facades\Auth;

class UserService{

    /// register new user
    public static function registerUser($name , $email,$password ,$type,$personal_photo,$telephone, $name_of_the_bank,
    $account_number, $residence_photo, $location, $categories_id, $sub_categories_id){
        $status = null;
        if($type =='maintenance technician'){

            $status= 'Pending';
            $user = User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
                'type'=>$type,
                'personal_photo'=>ImageService::upload_image($personal_photo),
                'telephone'=>$telephone,
                'name_of_the_bank'=>$name_of_the_bank,
                'account_number'=>$account_number,
                'residence_photo'=>ImageService::upload_image($residence_photo),
                'location'=>$location,
                'status'=>'Pending'
            ]);
            $user->categories()->attach($categories_id);
            $user->sub_categories()->attach($sub_categories_id);
        }
        else{
            $user = User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
                'type'=>$type,
                'personal_photo'=>ImageService::upload_image($personal_photo),
                'telephone'=>$telephone,
                'name_of_the_bank'=>$name_of_the_bank,
                'account_number'=>$account_number,
                'residence_photo'=>ImageService::upload_image($residence_photo),
                'location'=>$location,
                'status'=>$status
            ]);
            $token=$user->createToken('web user token')->plainTextToken;
            $user['accessToken']=$token;
        }

        return $user;
    }

    //// login user
    public static function loginUser($email , $password){
        $user=User::where('email',$email)->get();

        if($user->count()==0){
            return LoginUserEnum::ACCOUNT_DOES_NOT_EXIST;
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $user = Auth::user();

            if($user->type=='maintenance technician'){
                if($user->status=='Pending'){
                    return LoginUserEnum::PENDING_ORDER;
                }
                elseif($user->status=='Denied'){
                    return LoginUserEnum::DENIED_ORDER;
                }

            }
            $user->tokens()->where('name', 'web user token')->delete();
            $tokenResult = $user->createToken('web user token');
            $token = $tokenResult->plainTextToken;
            $user['accessToken']=$token;
            return $user;

        };
        return LoginUserEnum::WRONG_PASSWORD;
    }

    ////logout user
    public static function logoutUser(){
        auth()->user()->tokens()->delete();
        return true;
    }


    /// get pending users their registeration orders
    public static function getPendingUsers(){
        $users = User::where('status', 'Pending')->get();
        return $users;
    }

    /// update status
    public static function updateStatus($id , $status){
        $user = User::findOrFail($id);
        $user->status = $status;
        $user->save();
        return $user;


    }
}
