@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
        <div class="row">
            <h3>Slides</h3>            
            @include('partails.message')
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($slides as $slide)                                
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$slide->title}}</td>
                    <td><img src="{{asset('storage/'.$slide->image)}}" width="100px" alt=""></td>

                    <td>
                        <a class="btn btn-success btn-sm text-white " href="/slides/edit/{{$slide->id}}">Edit</a>
                        {{-- <a class="btn btn-danger btn-sm text-white "  href="{{url('/categories/delete/'.$category->id)}}">Delete</a> --}}                
                    </td>
                    <td><form action="{{route('slides.delete',$slide->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm text-white">Delete</button>
                    </form></td>
                  </tr>
                </tbody>
                @endforeach
              </table>
        

            </div>   
     </div>
</div>
@endsection
