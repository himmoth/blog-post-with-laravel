@extends('admin.layouts.app')

@section('main')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl ">
      <h3>List Categories</h3>
        @include('partails.message')
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($categories as $category)
                                 
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a class="btn btn-success btn-sm text-white " href="/categories/edit/{{$category->id}}">Edit</a>
                    {{-- <a class="btn btn-danger btn-sm text-white "  href="{{url('/categories/delete/'.$category->id)}}">Delete</a> --}}

                    
                </td>
                <td><form action="categories/{{$category->id}}" method="POST">
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
@endsection
