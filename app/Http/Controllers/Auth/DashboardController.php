<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();

        $publish = Post::where('status',2)->get();

        return \view('admin.dashboard.index',
        [
            'posts'=>$posts,
            'categories'=>$categories,
            'users'=>$users,
            'publish'=>$publish,



    
        ]);
    }
}
