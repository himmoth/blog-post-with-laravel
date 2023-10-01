@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
        <div class="row">
            <h4 class="mb-3">Update Slides</h4>
            <div class="col-md-4 ">
            @include('partails.message')
                <form action="{{route('slides.update',$slide->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div >
                      <input type="text" id="" class="form-control" value="{{$slide->title}}" name="title" >
                      @error('title')
                      <p class="text-danger">{{$message}}</p>                        
                      @enderror

                    </div>  
                    <div class="form-group mb-3">
                        <label for="image"> Image slider  </label>
                        <input type="file" class="form-control" id="image" name="image" >
                        <img height="100px" class="mt-2" src="{{ asset( 'storage/'.$slide->image)}}" alt="">
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>             
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block text-white">Update</button>
                  </form>
            </div>
        </div>
      
 </div>
</div>
@endsection
