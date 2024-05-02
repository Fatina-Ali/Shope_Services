<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    // use Authenticatable;
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable=['name','email','password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
