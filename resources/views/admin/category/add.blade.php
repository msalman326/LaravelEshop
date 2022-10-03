@extends('layouts.admin')
@section('title')
    Add Category
@endsection
@section('pages')
    Add Category
@endsection
@section('pagehead')
Add New Category
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add Category</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                

                <div class=" col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class=" border form-control" name = "name">
                </div>
                <div class="  col-md-6 mb-3">
                    <label for="slug"> Slug</label>
                    <input type="text" class=" border form-control" name = "slug">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Description</label>
                     <textarea name="description" class=" border form-control"  rows="5"></textarea>
                </div>
                <div class=" col-md-6 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"name = "status">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox"name = "popular">
                </div>
                
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class=" border form-control" name = "meta_title">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_descrip" class=" border form-control"  rows="5"></textarea>
               </div>
               <div class=" col-md-12 mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" class=" border form-control"  rows="5"></textarea>
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
