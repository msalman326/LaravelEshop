<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Symfony\Component\Routing\Route;
class CheckoutController extends Controller
{
    public function checkout()
    {
        $old_cartitems = cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeitem = cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }
        }
        $cartitems = cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        
        // $request->validate(
        //     [
        //         'fname' => 'required',
        //         'lname' => 'required',
        //         'email' => 'required|email',
        //         'phone' => 'required',
        //         'address1' => 'required',
        //         'city' => 'required',
        //         'state' => 'required',
        //         'country' => 'required',
        //         'pincode' => 'required'
                
        //     ]

        // );




        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');
        $order->tracking_no = 'salman' . rand(1111, 9999);
        $total = 0;
        $cartitems_total = cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->selling_price * $prod->prod_qty;
        }
        $order->total_price = $total;

        $order->save();



        $cartitems = cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderItem::create([

                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,


            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty =  $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $cartitems = cart::where('user_id', Auth::id())->get();
        cart::destroy($cartitems);


        if($request->input('payment_mode')=="Paid by RazorPay"||$request->input('payment_mode')=="Paid by Paypal"){
            $orderid = $order->id;
            
            return response()->json(['id' => $orderid]);
        }

        return redirect()->action(
            [UserController::class, 'view'], ['id' => $order->id]
        )->with('status','Order Placed Successfully');
        
    }
    public function razorpay(Request $request){
        $cart_items = cart::where('user_id',Auth::id())->get();
        $total_price = 0;
        foreach($cart_items as $item){
            $total_price += $item->products->selling_price *$item->prod_qty;
        }

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode'); 
        return response()->json([
            'fname'=> $fname,
            'lname'=> $lname,
            'email'=> $email,
            'phone'=> $phone,
            'address1'=> $address1,
            'address2'=> $address2,
            'city'=> $city,
            'state'=> $state,
            'country'=> $country,
            'pincode'=> $pincode,
            'total_price'=>$total_price,
        ]);

    }
}
