@extends('layouts.admin')
@section('title')
    Edit Products
@endsection
@section('pages')
   Edit Product
@endsection
@section('pagehead')
Edit Product
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit/Update Product</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                
                <div class="col-md-12 mb-3">
                    {{-- <select class="form-select" >
                        <option value="">{{$products->category->name}}</option>
                       
                        
                    </select> --}}
                    <select class="form-select" name="cate_id">
                        <option value="{{$products->cate_id}}">{{$products->category->name}}</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        
                    </select>


                </div>

                <div class=" col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class=" border form-control" name = "name" value="{{$products->name}}">
                </div>
                <div class="  col-md-6 mb-3">
                    <label for="slug"> Slug</label>
                    <input type="text" class=" border form-control" name = "slug" value="{{$products->slug}}">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">SmallDescription</label>
                     <textarea name="small_description" class=" border form-control"  rows="5">{{$products->small_description}}</textarea>
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Description</label>
                     <textarea name="description"  class=" border form-control"  rows="5">{{$products->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input class=" border form-control" value="{{$products->original_price}}" type="number" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input class=" border form-control" type="number" name="selling_price" value="{{$products->selling_price}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input class=" border form-control" type="number" name="tax" value="{{$products->tax}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input class=" border form-control" type="number" name="qty" value="{{$products->qty}}">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"name = "status" {{$products->status =="1" ? 'Checked': ''}}>
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox"name = "trending" {{$products->trending =="1" ? 'Checked': ''}}>
                </div>
                
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class=" border form-control" name = "meta_title" value="{{$products->meta_title}}">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" class=" border form-control"  rows="5" >{{$products->meta_keywords}}</textarea>
               </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class=" border form-control"  rows="5"> {{$products->meta_description}}</textarea>
               </div>
               @if ($products->image)
               <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="image">
                     
                 @endif
           <div class=" col-md-12 ">
            <label for="">Image</label>
            <input type="file" class=" border form-control" name = "image">
        </div>
           
        <div class=" d-grid gap-2 ">
            <button type="Submit" class="btn btn-primary">Update</button>
        </div>


                
            </div>


        </form>
        
    </div>
</div>
    
@endsection
