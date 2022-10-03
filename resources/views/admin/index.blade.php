@extends('layouts.admin')
@section('title')
    Admin Panel
@endsection
@section('pages')
    Dashboard
@endsection
@section('pagehead')
    Admin Dashboard
@endsection

@section('content')
    <div class="container ">
        <div class="row myown">
            <div class="card  ">
                <div class="card-header bg-dark ">
                    <h1>E-shop Admin panel</h1>
                </div>
                <hr>

                <div class="card-body bg-light ">
                    <a class="btn btn-success col-md-6  col-sm-12 col-12 float-start" href="{{url('orders')}}">Orders
                        <i class="fa fa-clipboard-list"></i>
                    </a>
                    <a class="btn btn-warning col-md-6 col-sm-12 col-12 float-end" href="{{url('all-users')}}">Total Users 
                        <i class=" fad fa fa-users"></i>
                        
                    </a>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
