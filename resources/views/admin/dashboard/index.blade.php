@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

        <h1 class="app-page-title">Dashboard</h1>
        @include('partails.message')
   
        <!--//app-card-->

        <div class="row g-4 mb-4"> 
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1"> Categories</h4>
                        <div class="stats-figure">{{$categories->count()}}</div>
                    </div>
                    <!--//app-card-body-->
                    <a class="app-card-link-mask" href="{{route('categories.index')}}"></a>
                   
                </div>
                <!--//app-card-->
            </div>
         
          
            <!--//col-->

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Posts</h4>
                        <div class="stats-figure">{{$posts->count()}}</div>                      
                    </div>
                    <!--//app-card-body-->
                    <a class="app-card-link-mask" href="{{route('posts.index')}}"></a>
                </div>           
                <!--//app-card-->
            </div>
            <!--//col-->
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Users</h4>
                        <div class="stats-figure">{{$users->count()}}</div>
                    </div>
                    <!--//app-card-body-->
                    <a class="app-card-link-mask" href="#"></a>
                </div>
                <!--//app-card-->
            </div>
            <!--//col-->
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Published Post</h4>
                        <div class="stats-figure">{{$publish->count()}}</div>
                    </div>
                    <!--//app-card-body-->
                    <a class="app-card-link-mask" href="{{route('posts.manage')}}"></a>

                </div>
                <!--//app-card-->
            </div>
            <!--//col-->
        </div>
        <!--//row-->
       
  
 

    </div>
    <!--//container-fluid-->
</div>
    
@endsection