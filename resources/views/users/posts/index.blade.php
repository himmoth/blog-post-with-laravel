@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-3">

                <img class="rounded-circle" src="{{ asset('storage/' . $user->profile) }}" height="120px" width="120px"
                    alt="">

                <h2 class="mx-4">{{ $user->name }}</h2>
                <p>{{$posts->count()}} Posted by {{$user->name}}</p>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the
                    first column.</p>

            </div>


            <div class="col-lg-9 col-md-9">
                <div class="row row-cols-1 row-cols-sm-2  g-3 mb-5">
                    @foreach ($posts as $post)
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="wrapp-img">
                                    <a href="/post/{{ $post->id }}"> <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                            alt="" class="img-fluid w-100">
                                    </a>
                                    <a href="/post/{{ $post->id }}">
                                        <h5 class="p-3 wrap-title ">{{ $post->title }}</h5>
                                    </a>
                                </div>
                                <ul class="user-profile mt-3 px-3">
                                    <li><img src="{{ asset('storage/' . $post->user->profile) }}" alt=""
                                            width="40px" height="40px"></li>
                                    <li>{{ $post->user->name }}</li>
                                    <li> <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></li>
                                    <li> <small class="text-muted"><i class="fa-solid fa-eye"></i> Views {{$post->view}}</small></li>

                                </ul>
                                <div class="card-body">
                                    <p class="card-text">{{ $post->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">

                                        @auth
                                            <div class="btn-group">

                                                @if (!$post->likedBy(auth()->user()))
                                                    <form action="{{ route('posts.likes', $post->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="fa-solid fa-heart "></i>&nbsp;<span>{{ $post->likes->count() }}
                                                                {{ Str::plural('Like', $post->likes->count()) }}</span></button>

                                                    </form>
                                                @else
                                                    <form action="{{ route('posts.likes', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="fa-solid fa-heart "></i>
                                                            <span>{{ $post->likes->count() }}
                                                                {{ Str::plural('Like', $post->likes->count()) }}</span></button>
                                                    </form>
                                                @endif
                                            </div>
                                        @else
                                            <form action="{{ route('posts.likes', $post) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary"><i
                                                        class="fa-solid fa-heart "></i> <span>{{ $post->likes->count() }}
                                                        {{ Str::plural('Like', $post->likes->count()) }}</span></button>
                                            </form>
                                        @endauth

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
