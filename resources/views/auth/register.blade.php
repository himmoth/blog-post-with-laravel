@extends('layouts.app')
@section('title','Register')


@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4 mb-5 bg-white">
            

            <form class="shadow p-3" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-center mb-4">Register</h2>
               
                <div class="form-group mb-3">
                   
                <input type="text"  value="{{old('name')}}" class="form-control @error('name') is-invalid  @enderror"  
                    
               name="name"
                                placeholder=" Name" >
                    
                    @error('name')

                    <p class="text-danger mt-1">{{$message}}</p>
                        
                    @enderror
                        
                </div>
                <div class="form-group mb-3">
                    <input type="email"  value="{{old('email')}}" class="form-control @error('email')is-invalid @enderror" name="email" placeholder="Email" >
                    @error('email')

                    <p class="text-danger mt-1">{{$message}}</p>
                        
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="file"   class="form-control " name="profile"  >
                    @error('profile')

                    <p class="text-danger mt-1">{{$message}}</p>
                        
                    @enderror
                  
                </div>
                <div class="form-group mb-3">
                    <input type="password"  class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password" >
                    @error('password')

                    <p class="text-danger mt-1">{{$message}}</p>
                        
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control  @error('password_confirmation')is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password"
                       >
                       @error('password_confirmation')

                       <p class="text-danger mt-1">{{$message}}</p>
                           
                       @enderror
                </div>
                <div class="form-group mb-3 ">
                    <button type="submit" class="btn btn-primary ">Register Now</button>
                </div>
            </form>

        </div>
    </div>
@endsection
