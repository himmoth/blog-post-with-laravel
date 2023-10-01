<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slide;
use App\Models\Category;
use Illuminate\Http\Request;



class FrontController extends Controller
{
    public function index(){
        $slides = Slide::latest()->get();
        $posts = Post::where('status',1)->latest()->with(['user', 'likes'])->paginate(15);

        $popularPosts = Post::get()->sortByDesc('view')->take(4);
    
        // dump($posts);

        return view('blogs.index',
        [
            'slides'=>$slides,
            'posts'=>$posts,
            'popularPosts'=>$popularPosts,
            
        ]);
    }

    public function show(Post $post){

     $post->increment('view');
    $categories = Category::latest()->get();  
    $relateds = Post::orderBy('title','desc')->get();   
    $popularPosts = Post::get()->sortByDesc('view')->take(2);

        return view('blogs.show',
        [
            'post'=>$post,
            'categories'=>$categories,
            'relateds'=>$relateds,
            'popularPosts'=>$popularPosts,

        
        ]);
    }

    public function blog(Request $request){

        $search = request()->query('search');
        if($search){
            $posts = Post::where('title','LIKE', "%${search}%")
           -> orWhere('description','LIKE', "%${search}%")
           -> orWhere('category_id','LIKE', "%${search}%")->paginate(4);
        }
        else{
            $posts = Post::latest()->paginate(16);        
        }
  
        $category = request()->query('category');
        if($category){
            
            $posts = Category::where('name',$request->category)->firstOrFail()->posts()->paginate(4);
        }
        $categories = Category::orderBy('name','ASC')->get();       
     
       
        
        return view('blogs.blog',[
            'posts'=>$posts,
            'categories' =>$categories,
          

        ]);
    }
    public function search( ){

        $search = Post::get ( "title" );		
        $tickets = Post::where ( 'title', 'LIKE', '%' . $search . '%' )->orWhere ( 'description', 'LIKE', '%' . $search . '%' )->get ();
    if (count ( $tickets ) > 0)
        return view ( 'blogs.search' )->withDetails ( $tickets )->withQuery ( $search );
    else
        return view ( 'blogs.search' )->withMessage ( 'No tickets Details found. Try to search again !' );
    
    
    }

}
