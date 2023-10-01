@extends('layouts.app')

@section('content')
    {{-- Search  --}}
    <div class="mb-5">
        
        <form action="{{route('search')}}" method="GET">
          <div class="input-group">
              <input class="form-control" name="search" id="query"
               type="text" placeholder=" Search..." aria-label=" Search " aria-describedby="button-search">
                  <button class="btn btn-secondary">Search</button>
          </div>
         </form>
        </div>
        @if($posts->count()> 0)
<div class="row">
 
    @foreach ($posts as $post)
        
    <div class="col-lg-4 col-md-4 col-12 mb-3">

     <a href="{{route('show',$post->id)}}">   <img src="{{asset('storage/'.$post->thumbnail)}}" width="100%" alt=""></a>

    </div> 
    <div class="col-lg-8 col-md-8 col-12">

        <div class="">
           <a href="{{route('show',$post->id)}}"> <h5>{{$post->title}}</h5></a>
            <p>{{$post->description}}</p>

        </div>
         <ul class="user-profile mt-3 ">
                        <li><a href="{{route('posts.user',$post->user)}}"><img src="{{ asset('storage/'.$post->user->profile) }}" alt="" width="40px" height="40px"></a></li>
                        <li>Posted By {{$post->user->name}}</li>
                        <li> <small class="text-muted">{{$post->created_at->diffForHumans()}}</small></li>
                        <li>views {{$post->view}}</li>
                    </ul>   
    </div> 

   
    @endforeach

    @else
    <h4>No Posts</h4>
    @endif
</div>


   
   
@endsection

