@extends('layouts.front')

@section('title')
    @if ($search > 0)
        @if ($search_products->count() > 0)
        @else
            Nothing Found
        @endif
        {{ $search }}
    @else
        Nothing Found
    @endif

@endsection
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                @if ($search > 0)

                    @if ($search_products->count() > 0)
                        <h3 class="bg-warning"> Search result of {{ $search }} </h3>

                        @foreach ($search_products as $prod)
                            <div class="col-md-3 mb-3 mt-3 ">
                                <a href="{{ url('view-category/' . $prod->category->name . '/' . $prod->name) }}">

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
                        <a class="btn btn-outline-success float-end" href="{{ url('/') }}">Continue Shoping</a>
                    @else
                        <h3 class="bg-warning"> Search result of {{ $search }} </h3>

                        <h4 class="text-danger">Nothing Found</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/') }}">Continue Shoping</a>
                    @endif
                @else
                    <h3 class="bg-warning"> Search result of {{ $search }} ?? </h3>

                    <h4 class="text-danger">Nothing Found......</h4>
                    <a class="btn btn-outline-success float-end" href="{{ url('/') }}">Continue Shoping</a>

                @endif





            </div>
        </div>
    </div>
@endsection
