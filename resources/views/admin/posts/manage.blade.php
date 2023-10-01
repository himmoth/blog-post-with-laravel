@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
      
      <h3>Manage Posts</h3>
      @include('partails.message')
      @if($posts->count()>0)
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Body</th>            
                <th>Category</th>
                <th>Thumbnail</th>
                <th>Date</th>
                <th>Action</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
           

       @foreach ($posts as $post)
                                         
              <tr>
               
                <td>{{$loop->iteration}}</td> 
                <td>{{$post->title}}</td>              
                <td>{{$post->description}}</td>              
                <td>{!!$post->body!!}</td>                                       
                <td>{{$post->category->name}}</td> 
                <td><img src="{{asset('storage/'.$post->thumbnail)}}" width="100px" alt=""></td>              
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>
                <a class="btn btn-success text-white mb-2" href="/posts/edit/{{$post->id}}"> Edit</a>
                @if($post->status==1)
                <form class="mb-2" action="/posts/{{$post->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                    <button class="btn btn-danger text-white">Delete</button>
                </form>
                @elseif($post->status==0)
                <a class="btn btn-warning" href="restore/{{$post->id}}">Restore</a>
                @else
                <p>Post published</p>
                @endif
                </td>   
                <td>
                  @if($post->status==1)
                  <a class="text-warning" href="publish/{{$post->id}}">Published</a>
                  @elseif($post->status==2)
                  <a href="unpublish/{{$post->id}}">Unpublished</a>  
                  @else

                    <p>Post deleted</p>

                  @endif
                </td>           


              </tr>
      @endforeach
            </tbody>

          

           
         
         </table>

          @else

          <h2 class="text-center text-white bg-secondary p-3 mt-5">No posts for user {{auth()->user()->name}} </h2>

          @endif

      
 </div>
</div>
@endsection

