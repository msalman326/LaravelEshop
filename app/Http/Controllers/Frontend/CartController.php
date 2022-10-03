<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addproduct(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            // $prod_check = Product::where('id' ,$product_id)->exists();

            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => "item is already in the cart"]);
                } else {

                    $cart_item = new cart();
                    $cart_item->prod_id = $product_id;
                    $cart_item->user_id = Auth::id();
                    $cart_item->prod_qty = $product_qty;
                    $cart_item->save();

                    return response()->json(['status' => $prod_check->name . " Added to cart successfully"]);
                }
            }
        } else {

            return response()->json(['status' => " Login to continue"]);
        }
    }
    public function viewcart()
    {

        $cart_item = cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cart_item'));
    }
    public function delcart(Request $request)
    {

        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) 
            {
                $cart_item = cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart_item->delete();
                // return redirect()->back()->response()->json(['status' => " item deleted successfully"]);
                return response()->json(['status' => " item deleted successfully"]);
            }
            else{
                return response()->json(['status' => " Error occured try later"]);

            }
        }
         else 
        {
            return response()->json(['status' => " login to continue"]);

        }
    }
    public function updatecart(Request $request){
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if (Auth::check()) {
            if (cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) 
            {
                $cart = cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => " Quntity updated"]);

            }
        }

                






    }
    public function cartcount(){
        $cartcount = cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }
}
