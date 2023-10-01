@extends('layouts.app')

@section('content')
    {{-- <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                @foreach ($slides as $key => $slide)
                    @if ($key == 0)
                        <img src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100 " alt="...">
                        <div class="overlay-slide"></div>
                        <div style="position: absolute; bottom:20px; left:50%; color:white;font-size:18px;">1</div>

                        
                        <h3 class="slide-title">{{ $slide->title }}</h3>
                    @endif
                @endforeach
            </div>
            @foreach ($slides as $key => $slide)
                @if ($key > 0)
                @php
                 
                   $key += 1; 

                @endphp
                    <div class="carousel-item">
                        <img src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100 " alt="...">
                        <div class="overlay-slide"></div>
                        <div style="position: absolute; bottom:20px; left:50%; color:white;font-size:18px;">{{$key++}}</div>
                        <h3 class="slide-title">{{ $slide->title }}</h3>
                    </div>
                @endif
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}
    <div class="wrapper mb-5">
        <div class="bg-title">
            <h4 class="main-title  mb-4">New Post </h4>
        </div>
        <div class="new-post ">
            @foreach ($posts as $key => $post)
                @if ($key == 0)
                    <div class="card-head-new-post-main">

                        <a href="{{route('show',$post->id)}}">
                            <div class="new-post-main-img mb-3">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                                <div class="img-overlay"></div>
                                <h5 class="new-title">{{ $post->title }}</h5>
                                <p class="category">{{ $post->category->name }}</p>
                            </div>
                        </a>
                        <div class="card-body-new-post-main">
                            <ul class="new-post-user mb-2">
                                <li><a class="user-profile" href="{{route('show',$post->id)}}">
                                    <img src="{{ asset('storage/' . $post->user->profile) }}" alt=""></a> </li>
                                <li class="mx-2"><a href=""> {{ $post->user->name }} </a></li>
                                <li><i class="fa-solid fa-eye"></i> {{ $post->view }}</li>
                                <li class="mx-2"><small>{{ $post->created_at->diffForHumans() }} </small></li>

                            </ul>
                            <p class="new-post-description main mt-3  text-white">{{ $post->description }}</p>
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($posts as $key => $post)
                @if ($key == 1)
                    <div class="card-head-new-post-top">
                        <a href="{{route('show',$post->id)}}">
                            <div class="new-post-top-img mb-2">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                                <p class="category">{{ $post->category->name }}</p>
                                <div class="img-overlay"></div>
                                <h5 class="new-title-top-bottom ">{{ $post->title }}</h5>
                            </div>
                        </a>
                        <div class="card-body-new-post-top">
                            <ul class="user-profile-top-bottom mb-2">
                                <li>
                                    <a class="user" href="">
                                    <img src="{{ asset('storage/' . $post->user->profile) }}" alt="">                          
                                    </a>
                                </li>
                                <li class="mx-2"><a href=""> {{ $post->user->name }} </a></li>
                                <li><i class="fa-solid fa-eye"></i> {{ $post->view }}</li>
                                <li class="mx-2"><small>{{ $post->created_at->diffForHumans() }} </small></li>
                            </ul>
                            <p class="new-post-description top text-white"> {{ $post->description }}</p>
                        </div>
                    </div>
                @elseif($key == 2)
                    <div class="card-head-new-post-bottom">
                        <a href="{{route('show',$post->id)}}">
                            <div class="new-post-top-img mb-2">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                                <div class="img-overlay"></div>
                                <p class="category">{{ $post->category->name }}</p>
                                <h5 class="new-title-top-bottom">{{ $post->title }}</h5>
                            </div>
                        </a>
                        <div class="card-body-new-post-top">
                            <ul class="user-profile-top-bottom mb-2">
                                <li>
                                    <a class="user" href=""><img
                                            src="{{ asset('storage/' . $post->user->profile) }}" alt="">
                                    </a>
                                </li>
                                <li class="mx-2"><a href=""> {{ $post->user->name }} </a></li>
                                <li><i class="fa-solid fa-eye"></i> {{ $post->view }}</li>
                                <li class="mx-2"><small>{{ $post->created_at->diffForHumans() }} </small></li>
                            </ul>
                            <p class="new-post-description bottom text-white">{{ $post->description }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <section class="section-popular mb-5">
        <h4 class="bg-popular-title mb-4">Popular </h4>
        <div class="popular-wrapper">
            @foreach ($popularPosts as $popularPost)
            <div class="card-header-popular shadow bg-white">
                <a href="{{route('show',$popularPost->id)}}">
                    <div class="popular-img">
                        <img src="{{ asset('storage/' . $popularPost->thumbnail) }}" alt="">
                        <p class="category">{{$popularPost->category->name}}</p>
                        <div class="overlay"></div>
                    </div>
                </a>
                <div class="card-body-popular p-3">
                    <ul class="auth d-flex gap-2 mb-2">
                        <li>Moth</li>
                        <li><i class="fa-solid fa-eye"></i> {{$popularPost->view}}</li>
                        <li>{{$popularPost->created_at->diffForHumans()}}</li>
                    </ul>
                    <a href="{{route('show',$popularPost->id)}}">  <h5 class="title-popular-hide">{{$popularPost->title}}</h5></a>
                    <p  class="des-popular-hide ">{{$popularPost->description}} </p>
                </div>
            </div>
            @endforeach
        </div>

    </section>
@endsection
