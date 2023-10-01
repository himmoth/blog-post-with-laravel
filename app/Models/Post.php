<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

   public function likedBy(User $user){
        return $this->likes->contains('user_id',$user->id);

   }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
    public function likes(){

        return $this->hasMany(Like::class);
    }

    public function scopeFilter($query, array $filters){

        if($filters['search'] ?? false){

            $query->where('title', 'like', '%' . $request('search') .'%');

        }

    }


}
