<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    Public function users(){
        $users = User::all();
        return view('admin.users.index',compact('users'));

    }
    public function view($id){
        $users = User::find($id);
        return view('admin.users.view',compact('users'));
    }
}
