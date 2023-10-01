<?php

namespace App\Http\Controllers\Auth;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $categories = Category::latest()->get();

        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function create(){

        return view('admin.categories.create');
    }

    public function store(Request $request){
        
        $formFields = $request->validate([
            'name' => 'required| min:2|'
        ]);

        Category::create($formFields);

        return \redirect()->back()->with('success','Category has been created');

    }

    public function edit(Category $category){

        return view('admin.categories.edit',['category'=>$category]);
    }

    public function update(Request $request,Category $category){

        $formFields = $request->validate([
            'name' => 'required| min:2|'
        ]);

        $category->update($formFields);

        return \redirect(route('categories.index'))->with('success','Category has been upadte');

    }

    public function destroy(Category $category){
        $category->delete();

        return \redirect()->back()->with('success','Category has been deleted');
    }
}