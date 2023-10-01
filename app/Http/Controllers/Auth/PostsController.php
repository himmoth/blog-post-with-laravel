<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    public function __construct( ){

        $this->middleware('auth'); 
        
    }
    public function index(){

        $posts = Post::latest()->with(['user','likes'])->paginate(20);

        

        return view('admin.posts.index',['posts'=>$posts]);
    }

    public function create(){

        $categories = Category::latest()->get();

        return view('admin.posts.create',['categories'=>$categories]);
    }

    public function store(Request $request){   
        $this->validate($request,[
        
        'title' => 'required|min:3',
        'description' => 'required',
        'body' => 'required',
        'category_id' => 'required',
        'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',

        ]);
        
        $path = $request->file('thumbnail')->store('thumbnails','public');
    

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->thumbnail =   $path ;
        $post->save();

        return redirect()->back()->with('success','Post created successfully');

    }

    public function manage(){

        $posts = auth()->user()->posts()->latest()->paginate(20);
        // $posts = Post::latest()->paginate(20);


        return view('admin.posts.manage',['posts'=>$posts]);
    }
    public function publish(Request $request){

       $post = Post::find($request->id)->update(['status'=>2]);
        
        return \redirect()->back()->with('success','Post has been published ');

    }

    public function unpublish(Request $request){

        $post = Post::find($request->id)->update(['status'=>1]);
         
         return \redirect()->back()->with('success','Post has been unpublished ');
 
     }

     public function restore(Request $request){

        $post = Post::find($request->id)->update(['status'=>1]);
         
         return \redirect()->back()->with('success','Post has been unpublished ');
 
     }

    
    public function edit(Post $post){

        $categories = Category::latest()->get();

       
        return view('admin.posts.edit',['post'=>$post,'categories'=>$categories]);
    }

    public function update(Request $request,Post $post){


        $formFields = $request->validate([       
            'title' => 'required|min:3',
            'description' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            ]);

            if($request->hasFile('thumbnail')){
                $formFields['thumbnail'] = $request->file('thumbnail')->store('thumbnails','public');
            }
          
            $post->update($formFields);
            
            return redirect()->back()->with('success','Post restored successfully');
    
    }

    public function destroy(Request $request){


        // if($post->user_id != auth()->id()){

        //     abort(403 , 'Unauthorized Action');

        // }

        $post = Post::find($request->id)->update(['status'=>0]);
       

        return redirect()->back()->with('success','Post deleted successfully');

    }
}
