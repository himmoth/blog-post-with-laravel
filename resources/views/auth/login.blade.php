@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4 mb-5 bg-white">

            @include('partails.message')

            <form class="shadow p-3" action="/users/authenticate" method="post">
                <h2 class="text-center mb-4">Login</h2>

                @csrf
                <div class="form-group mb-3">
                    <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">

                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control  @error('email') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" name="remember"  type="checkbox" id="inlineFormCheck">
                    <label class="form-check-label" for="inlineFormCheck">
                      Remember 
                    </label>
                  </div>
                <div class="form-group mb-3 ">
                    <button type="submit" class="btn btn-primary ">Login Now</button>
                </div>

            </form>

        </div>
    </div>
@endsection
