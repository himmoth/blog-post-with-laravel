@extends('layouts.app')

@section('title', $post->title)

@section('content')

    {{-- <div class="show-grid">
        <div class="grid-reading bg-white shadow ">
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h2 class="  py-2">{{$post->title}}</h2>
                    <!-- Post meta content-->
                    <ul class="profile mt-3 d-flex gap-2 align-items-center mb-3">
                        <li style="height: 30px;width:30px;"><a href="{{route('posts.user',$post->user)}}"><img src="{{ asset('storage/'.$post->user->profile) }}" alt="" class="rounded-circle"></a></li>
                        <li>Posted By {{$post->user->name}}</li>
                        <li> <small class="text-muted">{{$post->created_at->diffForHumans()}}</small></li>
                        <li>views {{$post->view}}</li>
                    </ul>   
                    <!-- Post categories-->
                    <a class="badge px-4 py-2 bg-secondary text-decoration-none link-light bg-danger">{{$post->category->name}}</a>                  
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('storage/'.$post->thumbnail)}}" alt="..."></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{!!$post->body!!}</p>
        
                </section>
            </article>
        </div>
        <div class="grid-popular">
            <div class="popular-wrapper">
                @foreach ($popularPosts as $popularPost)
                <div class="card-header-popular shadow bg-white">
                    <div class="popular-img">
                        <img src="{{ asset('storage/' . $popularPost->thumbnail) }}" alt="">
                        <p class="category">{{$popularPost->category->name}}</p>
                        <div class="overlay"></div>
                    </div>
                    <div class="card-body-popular p-3">
                        <ul class="auth d-flex gap-2 mb-2">
                            <li>Moth</li>
                            <li><i class="fa-solid fa-eye"></i> {{$popularPost->view}}</li>
                            <li>{{$popularPost->created_at->diffForHumans()}}</li>
                        </ul>
                        <h5 class=" ">{{$popularPost->title}}</h5>
                        <p  class=" ">{{$popularPost->description}} </p>
                    </div>
                </div>
                @endforeach
            </div>
    
        </div>

    </div> --}}
    <div class="grid-show mb-5">
        <div class="grid-reading bg-white ">
            <!-- Post content-->
            <!-- Preview image figure-->
            <div class="" style="height: 400px; ">
                <img class=" " style="object-fit:cover; height:100%" src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="...">
            </div>
            <article class="p-3">

                <!-- Post header-->

                <header class="mb-4">

                    <!-- Post title-->
                    <h2 class="  py-2">{{ $post->title }}</h2>
                    <!-- Post meta content-->
                    <ul class="profile mt-3 d-flex gap-2 align-items-center mb-3">
                        <li style="height: 30px;width:30px;"><a href="{{ route('posts.user', $post->user) }}"><img
                                    src="{{ asset('storage/' . $post->user->profile) }}" alt=""
                                    class="rounded-circle"></a></li>
                        <li>Posted By {{ $post->user->name }}</li>
                        <li> <small>{{ $post->created_at->diffForHumans() }}</small></li>
                        <li>views {{ $post->view }}</li>
                    </ul>
                    <!-- Post categories-->
                    <a class="text-white p-2 bg-poplar">{{ $post->category->name }}</a>
                </header>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{!! $post->body !!}</p>

                </section>
            </article>
        </div>
        <!-- Side widgets-->
        <div class="grid-popular ">

            <div class="shadow">
                <div class=" bg-poplar text-white p-2 mb-3">
                    <h4>Popular</h4>
                </div>
                <div class="popular-wrapper  ">
                    @foreach ($popularPosts as $popularPost)
                        @if ($popularPost->id != $post->id)
                            <div class="card-header-popular shadow mb-3 bg-white">
                                <a href="{{ route('show', $popularPost->id) }}">
                                    <div class="popular-img show">
                                        <img src="{{ asset('storage/' . $popularPost->thumbnail) }}" alt="">
                                        <p class="category">{{ $popularPost->category->name }}</p>
                                        <div class="overlay"></div>
                                    </div>
                                </a>
                                <div class="card-body-popular p-3">
                                    <ul class="auth d-flex gap-2 mb-2">
                                        <li>{{ $popularPost->user->name }}</li>
                                        <li><i class="fa-solid fa-eye"></i> {{ $popularPost->view }}</li>
                                        <li>{{ $popularPost->created_at->diffForHumans() }}</li>
                                    </ul>
                                    <a href="{{ route('show', $popularPost->id) }}"><h5 class="title-popular-hide show ">{{ $popularPost->title }}</h5></a>
                                    <p class="des-popular-hide  ">{{ $popularPost->description }} </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>

        </div>
    </div>
    <div class="row">
        <section class="section-popular mb-5">
            <h4 class="bg-popular-title mb-3">Related </h4>

            <div class="popular-wrapper">
                @foreach ($relateds as $related)
                    @if ($related->id != $post->id && $related->category->name == $post->category->name)
                        <div class="card-header-popular shadow bg-white">
                            <a href="{{ route('show', $related->id) }}">
                                <div class="popular-img">
                                    <img src="{{ asset('storage/' . $related->thumbnail) }}" alt="">
                                    <p class="category">{{ $related->category->name }}</p>
                                    <div class="overlay"></div>
                                </div>

                            </a>
                            <div class="card-body-popular p-3">
                                <ul class="auth d-flex gap-2 mb-2">
                                    <li>{{ $related->user->name }}</li>
                                    <li><i class="fa-solid fa-eye"></i> {{ $related->view }}</li>
                                    <li class="mx-2"><small>{{ $related->created_at->diffForHumans() }} </small></li>

                                </ul>
                                <a href="{{ route('show', $related->id) }}"><h5 class="title-popular-hide ">{{ $related->title }}</h5></a>
                                <p class="des-popular-hide  ">{{ $related->description }} </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>



@endsection
