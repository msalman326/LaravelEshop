@extends('layouts.admin')
@section('title')
   Edit Category
@endsection
@section('pages')
    Edit Category
@endsection
@section('pagehead')
    Edit Category
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit/Update Category</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                
                

                <div class=" col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{$category->name}}" class=" border form-control" name = "name">
                </div>
                <div class="  col-md-6 mb-3">
                    <label for="slug"> Slug</label>
                    <input type="text" value="{{$category->slug}}" class=" border form-control" name = "slug">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Description</label>
                     <textarea name="description" class=" border form-control"   cols="20"  rows="10" >{{$category->description}}</textarea>
                </div>
                <div class=" col-md-6 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox" {{$category->status =="1" ? 'Checked': ''}} name= "status">
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{$category->popular =="1" ? 'Checked': ''}} name = "popular">
                </div>
                
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{$category->meta_title}}" class=" border form-control" name = "meta_title">
                </div>
                <div class=" col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_descrip" class=" border form-control"  rows="5">{{$category->meta_descrip}}</textarea>
               </div>
               <div class=" col-md-12 mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" class=" border form-control"  rows="5">{{$category->meta_keywords}}</textarea>
           </div>

           @if ($category->image)
         <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="image">
               
           @endif
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
