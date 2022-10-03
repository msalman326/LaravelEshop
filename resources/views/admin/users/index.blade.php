@extends('layouts.admin')
@section('title')
    All Users
@endsection
@section('pages')
    Users
@endsection
@section('pagehead')
    All Users
@endsection
@section('content')
    <div class="container">
        <div class="row myown">
            <div class="card ">
                <div class="card-header bg-dark">
                    <h1 class="text-light">Registered Users</h1>
                </div>
                <hr>

                <div class="card-body ">

                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>


                                <th class="">User ID</th>
                                <th class="">Full Name</th>
                                <th class="">Email</th>
                                <th class="">Contact</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name . ' ' . '' . $item->lname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <a href="{{ url('admin/view-user/' . $item->id) }}" class="btn btn-primary">View</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection

