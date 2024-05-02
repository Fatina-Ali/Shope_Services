<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
class Sub_Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user__sub__categories', 'sub_category_id', 'user_id');
    }
    public function category(){


        return $this->belongsTo(Category::class,'category_id');
    }
}
