<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sub_Category;
class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user__categories', 'category_id', 'user_id');
    }
    public function sub_categories(){

        return $this->hasMany(Sub_Category::class,'category_id');
    }
}
