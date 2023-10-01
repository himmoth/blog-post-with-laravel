@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
        <div class="row">
            <h4 class="mb-3">Add Slides</h4>
            <div class="col-md-4 ">
            @include('partails.message')
                <form action="{{route('slides.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div >
                      <input type="text" id="" class="form-control" name="title" value="{{old('title')}}"  placeholder="Title">
                      @error('title')
                      <p class="text-danger">{{$message}}</p>                        
                      @enderror

                    </div>  
                    <div class="form-group mb-3">
                        <label for="image"> Image slider  </label>
                        <input type="file" class="form-control" id="image" name="image" >
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>             
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block text-white">Add </button>
                  </form>
            </div>
        </div>
      
 </div>
</div>
@endsection
