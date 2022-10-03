@extends('layouts.front')

@section('title')
    All Categories
@endsection
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Categories By E-Shop </h2>
            <div class="py-3 mb-3 border-top shadow-sm bg-warning">
                <div class="container">
                    <h6 class="mb-"> <b style="font-size: 20px"> <a href="{{ url('/') }}">E-Shop</a></b>/ <a
                            href="{{ url('category/' ) }}">Categories </a></h6>
                </div>
            </div>


            <div class="owl-carousel featured-carousel owl-theme">

                @foreach ($category as $cate)
                        <div class="item  ">
                           
                            <a  href="{{url('view-category/'.$cate->name)}}">
                            <div class="card catecard card-img-top"    >
                                <img src="{{ asset('assets/uploads/category/' . $cate->image) }}" alt="image here"  style="height: 220px; width: 250px">
                                <div class="card-body">
                                    <h3  class="card-title vcate">{{ $cate->name }}</h3>
                                    <p class="card-text">{{$cate->description}}</p>                                                                                                            
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

