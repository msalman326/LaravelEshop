@extends('layouts.front')

@section('title')
    Welcome to E shop
@endsection
@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Products By E-Shop </h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach ($featured_products as $prod)
                        <div class="item ">
                            <a href="{{ url('view-category/' . $prod->category->name . '/' . $prod->name) }}">
                                <div class="card ">
                                    <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="image here"
                                        style="height: 220px; width: 250px">
                                    <div class="card-body">
                                        <h5
                                            style=" 
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                 white-space: nowrap;
                                                  ">
                                            {{ $prod->name }}</h5>
                                        <div>
                                            <h6 style="display: inline"> Rs.&nbsp;</h6>{{ $prod->selling_price }}
                                        </div>
                                        <div> <s>{{ $prod->original_price }} </s></div>



                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>



            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Categories By E-Shop </h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach ($category as $cate)
                        <div class="item ">
                            <a href="{{ url('view-category/' . $cate->name) }}">
                                <div class="card  ">
                                    <img src="{{ asset('assets/uploads/category/' . $cate->image) }}" alt="image here"
                                        style="height: 220px; width: 250px">
                                    <div class="card-body">
                                        <h5 class="vcate">{{ $cate->name }}</h5>
                                        <h5>{{ $cate->slug }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>



            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
