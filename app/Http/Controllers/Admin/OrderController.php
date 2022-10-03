<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    Public function orders(){
        $orders = Order::where('status','0')->get();
        $orderss =Order::where('status','1')->get();
        return view('admin.orders.index',compact('orders','orderss'));

    }
    Public function view($id){
        $orders = Order::where('id',$id)->first();
        return view ('admin.orders.view',compact('orders'));
    }
    Public function update(Request $request , $id){
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status','Order Status Updated');

    }
     public function history()
    {
        $orders = Order::where('status','2')->get();
        return view('admin.orders.history',compact('orders'));
        
    }
    
}
