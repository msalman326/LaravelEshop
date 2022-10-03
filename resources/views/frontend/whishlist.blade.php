@extends('layouts.front')

@section('title')
    My Wishlist
@endsection




@section('content')
    <div class="py-3 mb-3 border-top shadow-sm bg-warning">
        <div class="container">
            <h6 class="mb-">
                <b style="font-size: 20px">
                    <a href="{{ url('/') }}">E-Shop
                    </a>
                </b>
                /
                <a href="{{ url('whishlist') }}">Whishlist
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-4 px-4">

        <div class="card shadow wishitems ">

            <div class="card-body ">
                @if ($whishlist->count() > 0)
                    @foreach ($whishlist as $item)
                        <div class="row  product_data">
                            <div class="col-md-1 my-auto ">
                                <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="imagehere"
                                    style="width:70px; height: 70px ">

                            </div>
                            <div class="col-md-2 my-auto">
                                <h4>{{ $item->products->name }}</h4>
                            </div>
                            <div class="col-md-2 my-auto ">
                                <h5>Rs: {{ $item->products->selling_price }}</h5>
                            </div>
                            <div class="col-md-2 my-auto ">
                                <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                                @if ($item->products->qty >= 1)
                                    <h6>In Stock</h6>
                                @else
                                    <h6>Out of Stock</h6>
                                @endif

                            </div>
                            <input type="hidden" value="1" class="qty-input">




                            <div class="col-md-3 my-auto  ">
                                @if ($item->products->qty >= 1)
                                    <button class="btn btn-success  addtocartbtn"> <i class=" fa fa-shopping-cart"></i> Add
                                        to cart</button>
                                @endif
                            </div>

                            <div class="col-md-2 my-auto text-end ">
                                <button class="btn btn-danger del-whish-btn "> <i class=" fa fa-trash"></i> Remove</button>
                            </div>

                        </div>
                        <hr>
                    @endforeach
                @else
                    <h4 class="btn btn-success col-md-12">Wishlist is Empty</h4>
                    <a class="btn btn-outline-success float-end" href="{{url('/')}}">Continue Shoping</a>

                @endif
                {{-- @php
                    $total = 0;
                @endphp
                @foreach ($cart_item as $item)
                    <div class="row  product_data">
                        <div class="col-md-1 my-auto ">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="imagehere"
                                style="width:70px; height: 70px ">

                        </div>
                        <div class="col-md-3 my-auto">
                            <h4>{{ $item->products->name }}</h4>
                        </div>
                        <div class="col-md-2 my-auto ">
                            <h5>Rs: {{ $item->products->selling_price }}</h5>
                        </div>
                        <div class="col-md-3 my-auto ">
                            <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                            @if ($item->products->qty >= $item->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3 " style="width: 130px;">
                                    <button class="input-group-text chngqty decrement-btn">-</button>
                                    <input type="text" name="quantity" value="{{ $item->prod_qty }}"
                                        class="form-control qty-input">
                                    <button class="input-group-text chngqty increment-btn">+</button>
                                </div>
                                @php
                                    $total += $item->products->selling_price * $item->prod_qty;
                                @endphp
                            @else
                                <h6>Out of Stock</h6>
                            @endif

                        </div>
                        <div class="col-md-3 my-auto text-end ">
                            <button class="btn btn-danger del-cart-btn "> <i class=" fa fa-trash"></i> Remove</button>
                        </div>

                    </div>
                    <hr>
                @endforeach --}}
            </div>

            {{-- <div class="card-footer">
                @if ($cart_item->count() > 0)
                <h6 class="price"> <b>Total Price </b> Rs: {{ $total }}</h6>
             
                
                    <a class="btn btn-outline-success checkoutbtn float-end" href="{{ url('order-checkout') }}">Proceed to
                        Checkout</a>

                    @else
                    <h4 class="btn btn-danger col-md-12" >Cart is Empty</h4>
                    @endif

            </div> --}}
        </div>
    </div>
@endsection
