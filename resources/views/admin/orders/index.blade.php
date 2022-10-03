@extends('layouts.admin')
@section('title')
    Orders
@endsection
@section('pages')
    Orders
@endsection
@section('pagehead')
    All New Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">All New Orders
                            <a href="{{url('order-history')}}" class="btn btn-warning float-end">Order History</a>

                        </h3>
                    </div>
                    <div class="card-body">
                        <h3>Pending Orders</h3>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order date</th>
                                    <th>Tracking Number</th>
                                    <th>Payment Method</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{$item->payment_mode}}</td>
                                        <td>{{ $item->total_price }}</td>
                                        @if ($item->status == '0')
                                            <td>Pending</td>
                                        @elseif($item->status == '1')
                                            <td>Shipped</td>
                                        @elseif($item->status == '2')
                                            <td>Deliverd</td>
                                        @endif

                                        <td>
                                            <a href="{{ url('admin/view-order/' . $item->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <h3>Shipped Orders</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order date</th>
                                    <th>Tracking Number</th>
                                    <th>Payment Method</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderss as $item)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{$item->payment_mode}}</td>

                                        <td>{{ $item->total_price }}</td>

                                        @if ($item->status == '0')
                                            <td>Pending</td>
                                        @elseif($item->status == '1')
                                            <td>Shipped</td>
                                        @elseif($item->status == '2')
                                            <td>Deliverd</td>
                                        @endif

                                        <td>
                                            <a href="{{ url('admin/view-order/' . $item->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
