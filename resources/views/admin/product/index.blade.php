@extends('layouts.admin')
@section('title')
    Products
@endsection
@section('pages')
    Products
@endsection
@section('pagehead')
Products
@endsection
@section('content')
<div class="card">
    <div class="card-header"> 
        <a  class="btn btn-success col-md-12 " href="{{url('add-products')}}">Add Product</a>
        <h1>Products</h1>
    </div>
    <hr>

    <div class="card-body ">

        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th class="">Id</th>
                    <th class="">Name</th>
                    <th class="">Category</th>
                    <th class="" >Description</th>
                    <th class="">Selling price</th>
                    <th class="">Image</th>
                    <th class="">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    
               
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category->name}}</td>
                    <td class="some">{{$item->description}}</td>
                    <td >{{$item->selling_price}}</td>
                    <td>
                    <img class="cate-image"  src="{{asset('assets/uploads/products/'.$item->image)}}" alt="Image here">
                    </td>
                    <td>
                        
                    <div class="">    <a href="{{url ('edit-product/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a></div>
                    <div class="">    <a href="{{url ('delete-product/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a></div>
                        
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