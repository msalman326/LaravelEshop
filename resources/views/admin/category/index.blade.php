@extends('layouts.admin')
@section('title')
    Categories
@endsection
@section('pages')
    Categories
@endsection
@section('pagehead')
Categories
@endsection
@section('content')
<div class="card">
    <div class="card-head"> 
        <a  class="btn btn-success col-md-12 " href="{{url('add-category')}}">Add Category</a>
        <h1>Categories</h1>
    </div>
    <hr>

    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Dscription</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    
               
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->name}}</td>
                    <td class="some">{{$item->description}}</td>
                    <td>
                    <img class="cate-image"  src="{{asset('assets/uploads/category/'.$item->image)}}" alt="Image here">
                    </td>
                    <td>
                        <a href="{{url ('edit-cate/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url ('delete-cate/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
        </table>
       

    </div>
</div>
    
@endsection


{{-- <a class="nav-link text-white " href={{ url('categories')}}>
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">receipt_long</i>
    </div>
    <span class="nav-link-text ms-1">categories</span>
  </a> --}}