@extends('layouts.admin')
@section('title')
    Add Products
@endsection
@section('pages')
    Add Product
@endsection
@section('pagehead')
Add New Product
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add Product</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="cate_id">
                        <option value="">Select Category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        
                    </select>


                </div>

                <div class=" col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class=" border form-control" name = "name">
                </div>
                <div class="  col-md-6 mb-3">
                    <label for="slug"> Slug</label>
                    <input type="text" class=" border form-control" name = "slug">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">SmallDescription</label>
                     <textarea name="small_description" class=" border form-control"  rows="5"></textarea>
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Description</label>
                     <textarea name="description" class=" border form-control"  rows="5"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input class=" border form-control" type="number" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input class=" border form-control" type="number" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input class=" border form-control" type="number" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input class=" border form-control" type="number" name="qty">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"name = "status">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox"name = "trending">
                </div>
                
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class=" border form-control" name = "meta_title">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" class=" border form-control"  rows="5"></textarea>
               </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class=" border form-control"  rows="5"></textarea>
               </div>
               
           <div class=" col-md-12 ">
            <label for="">Image</label>
            <input type="file" class=" border form-control" name = "image">
        </div>
           
        <div class=" d-grid gap-2 ">
            <button type="Submit" class="btn btn-primary">Submit</button>
        </div>


                
            </div>


        </form>
        
    </div>
</div>
    
@endsection
