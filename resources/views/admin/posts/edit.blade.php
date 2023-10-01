@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">

        <div class="row mb-3 ">
            <div class="col-md-9">
                <h2>Edit Posts </h2>
            </div>
            <div class="col-md-3">
                <a href="" class="btn btn-danger "> Back </a>
            </div>    
        </div>
           
        <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12 col-12 ">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('failed') }}
                        </div>
                    @endif

                    <div class="card shadow">

                        <div class="card-header">
                            <h4 class="card-title font-weight-bold">Edit Posts </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title"> Title </label>
                                <input type="text" value="{{$post->title}}" class="form-control" id="title" name="title" >
                                @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <select class="form-select mb-3" name="category_id" id="category_id" aria-label="Default select example">
           
                                <option value="option_select" disabled selected>{{$post->category->name}}</option>
                                 @foreach ($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>                                                                                                        
                                @endforeach 
                               
                               
                              </select>
                              @error('category_id')
                              <p class="text-danger">{{$message}}</p>
                              @enderror
                            <div class="form-group mb-3">
                                <label for="des"> Description  </label>
                                <textarea class="form-control" name="description" id="textAreaExample1" cols="10" rows="10"> {{$post->description}}</textarea>
                                   
                            
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="thumbnail"> Thumbnail  </label>
                                <input type="file" class="form-control"  id="thumbnail" name="thumbnail" >
                                <img height="100px" class="mt-2" src="{{ asset( 'storage/'.$post->thumbnail)}}" alt="">
                                @error('thumbnail')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body"> Body </label>
                                <textarea class="form-control" id="body" 
                                    name="body"> 

                                    {{$post->body}}

                                    @error('body')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                
                                </textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary text-white"> Update </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace('body', {
            // filebrowserUploadUrl: "",
            filebrowserUploadMethod: 'form'
        })
    </script>

      
 </div>
</div>
@endsection
