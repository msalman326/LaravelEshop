@extends('layouts.front')

@section('title',$products->name)


@section('content') 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$products->id}}" name="product_id" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_ratings)
                                @for ($i =1 ; $i <=$user_ratings->stars_rated ; $i++)
                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for ($j =$user_ratings->stars_rated+1 ; $j <=5 ; $j++)
                                <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                <label for="rating{{$j}}" class="fa fa-star"></label>
                                @endfor
                                @else
                                <input type="radio" value="1" name="product_rating"checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                                
                                
                                @endif
                               
                                
                               
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<div class="py-3 mb-3 border-top shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-"> <b style="font-size: 20px"> <a href="{{url('/')}}">E-Shop</a> </b>/<a  href="{{url('view-category/'.$products->category->name)}}"> {{$products->category->name}}</a>/{{$products->name}}</h6>
    </div>
</div>
<div class="container px-5 mt-3 mb-5 ">
    <div class="card shadow  py-3 px-4 product_data ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/' . $products->image) }}" alt="" class="w-100">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                    
                    
                        @if ($products->trending =='1' )
                        <label style="font-size: 12px" class="float-end badge bg-danger trending-tag">Trending</label>
                        @endif
                   
                </h2>
                    
                    <hr>
                    <label class="me-3">Original Price: <s> Rs {{$products->original_price}} </s></label>
                    <label class="fw-bold">Selling Price:  Rs {{$products->selling_price}} </label>
                    
                    @php
                        $ratingval = number_format($ratings_value)
                    @endphp
                    <div class="rating" data-bs-toggle="modal" data-bs-target="#exampleModal"style="cursor: pointer">
                        @for ($i =1 ; $i <=$ratingval ; $i++)
                        <i class="fa fa-star golden"></i>
                        @endfor
                        @for ($j =$ratingval+1 ; $j <=5 ; $j++)
                        <i class="fa fa-star "></i>
                        @endfor
                        <span  >
                            @if ($ratings->count()>0)
                            {{$ratings->count()}} Rating
                                @else
                                No Ratings
                            @endif
                            
                        </span>
                    </div>

                    <p class="mt-3">
                        {{!! $products->small_description !!}}
                    </p>
                    <hr>
                    @if ($products->qty >0)
                        <label  class="badge bg-success">In stock</label>
                    @else
                    <label  class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            <button type="button" class="btn btn-success me-3 float-start addtowishlist">Add to Whishlist <i class="fa fa-heart"></i> </button>
                            @if ($products->qty >0)

                            <button type="button" class="btn btn-primary me-3 float-start addtocartbtn ">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                       @endif
                        </div>


                      
                    </div>
                </div>
                <div class="mt-2">
                    <hr>
                <h3>Description: </h3>
                <p>
                    {{$products->description}}
                </p></div>
                <hr>
                
            </div>
            
            <div class="row">
                    <div class="col-md-4">
                        <h5>Reviews and Ratings <i class="fa fa-star golden"></i><i class="fa fa-star golden"></i><i class="fa fa-star golden"></i>
                            <i class="fa fa-star "></i><i class="fa fa-star "></i></h5>
                        <button type="button" class="btn btn-link golden " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Rate this Product
                          </button>
                          <a href="{{url('add-review/'.$products->name.'/userreview')}}">Write a Review</a>
                    </div>
                    <div class="col-md-8">
                        @foreach ($reviews as $item)
                            
                        
                        <label for="">{{$item->user->name.' '.$item->user->lname}}</label>
                        @if ($item->user_id == Auth::id())
                        <a class="btn btn-info  btn-sm" href="{{url('edit-review/'.$products->name.'/userreview')}}">Edit</a>                            
                        @endif
                        <br>
                        @php
                            $rating = App\Models\Rating::where('user_id',$item->user->id)->where('prod_id',$products->id)->first();
                        @endphp
                        <span class="rating" data-bs-toggle="modal" data-bs-target="#exampleModal"style="cursor: pointer">
                        @if ($rating)
                        @php
                            $user_rated =$rating->stars_rated;
                        @endphp
                        @for ($i =1 ; $i <=$user_rated ; $i++)
                        <i class="fa fa-star golden"></i>
                        @endfor
                        @for ($j =$user_rated+1 ; $j <=5 ; $j++)
                        <i class="fa fa-star "></i>
                        @endfor
                        @else
                        
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        Not Rated
                    
                        @endif
                    </span>

                         
                        <small>Reviewed on {{$item->created_at->format('d M Y')}}</small>
                        <p>
                           {{$item->user_review}}
                        </p>
                        @endforeach


                     </div>
            </div>

        </div>
    </div>
</div>
 
@endsection

