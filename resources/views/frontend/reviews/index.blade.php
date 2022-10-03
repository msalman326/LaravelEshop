@extends('layouts.front')

@section('title','Write Review')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-2 mx-2">
                <div class="card-body">
                  
                    <h5>You are writing Review for {{$product->name}}</h5>
                    <form action="{{url('/add-review')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <textarea name="ureview" class="form-control" rows="5" placeholder="Write a Review"></textarea>
                        <button type= "submit" class=" btn mt-3 btn-primary">Submit</button>
                    </form>
                   
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection