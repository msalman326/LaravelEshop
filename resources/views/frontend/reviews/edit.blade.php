@extends('layouts.front')

@section('title','Update Review')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-2 mx-2">
                <div class="card-body">
                  
                    <h5>You are Updating Review for {{$product->name}}</h5>
                    <form action="{{url('/update-review')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <textarea name="ureview" class="form-control" rows="5"> {{$existing_review->user_review}} </textarea>
                        <button type= "submit" class=" btn mt-3 btn-primary">Update</button>
                    </form>
                   
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection