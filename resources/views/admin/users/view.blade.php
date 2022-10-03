@extends('layouts.admin')
@section('title')
    User detail
@endsection
@section('pages')
    User Details
@endsection
@section('pagehead')
    User Details
@endsection
@section('content')
    <div class="container">
        <div class="row myown ">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header bg-dark ">
                        
                        <h4 class="mb-4 text-light">View User
                            <a href="{{url('all-users')}}" class="btn btn-warning float-end ">Back</a>
                        </h4>
                        <hr>
                    </div>
                    <hr>


                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="">Role</label>
                                <div class="p-2 border">{{ $users->role_as == '1' ? 'Admin' : 'User' }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">First Name</label>
                                <div class="p-2 border">{{ $users->name }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Second Name</label>
                                <div class="p-2 border">{{ $users->lname }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Email</label>
                                <div class="p-2 border">{{ $users->email }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Contact/Cell</label>
                                <div class="p-2 border">{{ $users->phone }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Address</label>
                                <div class="border ">
                                    {{ $users->address1 }},
                                    {{ $users->address2 }},<br>
                                    {{ $users->city }},<br>
                                    {{ $users->state }},
                                    {{ $users->country }},
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">ZipCode</label>
                                <div class="border ">{{ $users->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
