@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
        <div class="row">
            <h4 class="mb-3">Update Category</h4>
            <div class="col-md-4 ">        
                <form action="/categories/{{$category->id}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-outline mb-4">
                      <input type="text" id="" value="{{$category->name}}" class="form-control"  name="name"  >

                      @error('name')

                      <p class="text-danger">{{$message}}</p>
                          
                      @enderror

                    </div>               
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block text-white">Update Category</button>
                  </form>
            </div>
        </div>
      
 </div>
</div>
@endsection
