@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
        <div class="row">
            <h4 class="mb-3">Add Category</h4>
            <div class="col-md-4 ">
            @include('partails.message')
                <form action="{{route('categories.store')}}" method="POST" >
                    @csrf
                    <div class="form-outline mb-4">
                      <input type="text" id="" class="form-control" name="name"  placeholder="Add category">

                      @error('name')

                      <p class="text-danger">{{$message}}</p>
                          
                      @enderror

                    </div>               
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block text-white">Add Category</button>
                  </form>
            </div>
        </div>
      
 </div>
</div>
@endsection
