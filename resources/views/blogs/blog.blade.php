@extends('layouts.app')
@section('title','Blog')
@section('content')
    {{-- Search  --}}
<div class="row">
    <div class="col-md-6 offset-md-3 mb-5">
        <form action="{{ route('post.blog') }}" method="GET">
            <div class="input-group">
                <input class="form-control" value="{{request()->query('search')}}" name="search" id="query" type="text" placeholder=" Search...">
                <button class="btn btn-secondary">Search</button>
            </div>
        </form>
    </div>
</div>

    @if ($posts->count() > 0)
        <div class="row">
{{--            
                <div class="col-lg-4 col-md-4 col-12 mb-3">

                    <a href="{{ route('show', $post->id) }}"> <img src="{{ asset('storage/' . $post->thumbnail) }}"
                            width="100%" alt=""></a>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="">
                        <a href="{{ route('show', $post->id) }}">
                            <h5>{{ $post->title }}</h5>
                        </a>
                        <p>{{ $post->description }}</p>
                    </div> --}}
                    {{-- <ul class="user-profile mt-3 ">
                        <li>
                          <a href="{{ route('posts.user', $post->user) }}"><img
                             src="{{ asset('storage/' . $post->user->profile) }}" alt="" width="40px"
                             height="40px"></a></li>
                        <li>Posted By {{ $post->user->name }}</li>
                        <li> <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></li>
                        <li>views {{ $post->view }}</li>
                    </ul> --}}
                {{-- </div> --}}
            {{-- @endforeach --}}

            <section class="section-popular mb-5">
                <h4 class="bg-popular-title mb-3">Blog </h4>
            
              <ul class="blog-btn-category">
                <li ><a class=".bg-cat active"  href="{{route('post.blog')}}">All</a></li>
                @foreach ($categories as $category)
                <li><a href="{{route('post.blog',['category' =>$category->name])}}">{{$category->name}}</a></li>
                @endforeach
              </ul>
                <div class="popular-wrapper">
                    @foreach ($posts as $post)
                    <div class="card-header-popular shadow bg-white">
                      <a href="{{route('show',$post->id)}}">
                        <div class="popular-img">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                               <p class="category">{{$post->category->name}}</p>
                               <div class="overlay"></div>
                           </div>

                      </a>
                        <div class="card-body-popular p-3">
                            <ul class="auth d-flex gap-2 mb-2">
                                <li>{{$post->user->name}}</li>
                                <li><i class="fa-solid fa-eye"></i> {{$post->view}}</li>
                                <li class="mx-2"><small>{{ $post->created_at->diffForHumans() }} </small></li>
        
                            </ul>
                            <a href="{{route('show',$post->id)}}"> <h5 class="title-popular-hide ">{{$post->title}}</h5></a>
                            <p  class=" des-popular-hide ">{{$post->description}} </p>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
               
            </section>
         <div class="mb-5">
            {{$posts->appends(['search'=> request()->query('search')])->links()}}
         </div>
        </div>
    @else
    <div class="section-popular mb-5"><h4 class="bg-popular-title mb-3">Blog </h4></div>
    <ul class="blog-btn-category">
        <li class="active"><a  href="{{route('post.blog')}}">All</a></li>
        @foreach ($categories as $category)
        <li><a href="{{route('post.blog',['category' =>$category->name])}}">{{$category->name}}</a></li>
        @endforeach
      </ul>
        <h4 class="text-center mb-5 text-white">No Posts</h4>
    @endif
@endsection
