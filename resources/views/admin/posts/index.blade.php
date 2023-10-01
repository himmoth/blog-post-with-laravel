@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
      <h3>List Posts</h3>
        @include('partails.message')
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Body</th>
                <th>User</th>
                <th>Category</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>

       @foreach ($posts as $post)
                                         
              <tr>
               
                <td>{{$loop->iteration}}</td> 
                <td>{{$post->title}}</td>              
                <td>{{$post->description}}</td>              
                <td>{!!$post->body!!}</td>              
                <td>{{$post->user->name}}</td>              
                <td>{{$post->category->name}}</td>              
                <td>{{$post->created_at->diffForHumans()}}</td>              

              </tr>
      @endforeach
            </tbody>
         
          </table>
      
 </div>
</div>
@endsection

