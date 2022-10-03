@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection
@section('content')
    <div class="py-3 mb-3 border-top shadow-sm bg-warning">
        <div class="container">
            <h6 class="mb-"> <b style="font-size: 20px"> <a href="{{ url('/') }}">E-Shop</a></b>/ <a
                    href="{{ url('view-category/' . $category->name) }}"> {{ $category->name }}</a></h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }} </h2>


                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3  ">
                        <a href="{{ url('view-category/' . $category->name . '/' . $prod->name) }}">

                            <div class="card ">
                                <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="image here"
                                    style="height: 220px;">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <div>
                                        <h6> Rs.&nbsp;</h6>{{ $prod->selling_price }}
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
