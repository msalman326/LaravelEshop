@extends('layouts.admin')
@section('title')
    View Orders
@endsection
@section('pages')
    View Order
@endsection
@section('pagehead')
    View Order Details
@endsection

@section('content')
    <div class="container py-4 px-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h3>View Order
                            <a class="btn btn-md btn-warning float-end" href="{{ url('orders') }}">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border ">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border ">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>
                                <label for="">Contact</label>
                                <div class="border ">{{ $orders->phone }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border ">
                                    {{ $orders->address1 }},
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},<br>
                                    {{ $orders->state }},
                                    {{ $orders->country }},
                                </div>
                                <label for="">ZipCode</label>
                                <div class="border ">{{ $orders->pincode }}</div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>

                                <table class="table table-bordered ovtable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img style="width: 50px; "
                                                        src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                        alt="">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <h6>Payment: <b> <span class="float-end"> {{ $orders->payment_mode }}</span> </b> </h6>
                                <hr>
                                <hr>
                                <h4>Grand Total: <span class="float-end"> {{ $orders->total_price }} </h4>
                                <hr>
                                <div class="mt-5 px-1">
                                <label for=""><h4> Order Status</h4></label>
                                <form class="mt-2" action="{{url('update-order/'.$orders->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                <select class="form-select" name="order_status">
                                    <option {{$orders->status == '0'? 'selected':''}} value="0">Pending</option>
                                    <option {{$orders->status == '1'? 'selected':''}}  value="1">Shipped</option>
                                    <option {{$orders->status == '2'? 'selected':''}}  value="2">It will deliver by courier company</option>
                                  </select>
                                  <button class="btn btn-primary float-end mt-3" type="submit">Update-Status</button>

                                </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
