<?php

namespace App\Http\Controllers\Auth;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::latest()->get();
        return \view('admin.slides.index',['slides'=>$slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return \view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $this->validate($request,[
        
            'title' => 'required|min:5',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    
            ]);
            

        $path = $request->file('image')->store('slides','public');
        
        $slide = new Slide();
        $slide->title = $request->title;
        $slide->image = $path;
        $slide->save();

        return \redirect()->back()->with('success','Slide created success ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        // $slide = Slide::latest()->get();
        return \view('admin.slides.edit',
    [
        'slide'=> $slide,
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $formFields = $request->validate([
        
            'title' => 'required|min:5',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
    
            ]);
            
            if($request->hasFile('image')){
                $formFields['image'] = $request->file('image')->store('slides','public');
            }
       $slide->update($formFields);

        return \redirect()->back()->with('success','Slide updated success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return \redirect()->back()->with('success','Slide deleted success ');

    }
}
