<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhishlistController extends Controller //wishlist spell mistake in all model migraton and controller
{
   public function index(){
    $whishlist =Whishlist::where('user_id', Auth::id())->get();
    return view('frontend.whishlist',compact('whishlist'));
   }
   public function add(Request $request){
    if(Auth::check()){
        $prod_id = $request->input('product_id');
        if (Whishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
            return response()->json(['status' => "item is already in the Wishlist"]);
        } 
        else{
        if(Product::find($prod_id)){
            $whistlist = new Whishlist();
            $whistlist->prod_id = $prod_id;
            $whistlist->user_id = Auth::id();
            $whistlist->save();
        return response()->json(['status' => " Added to wishlist"]);

        }
        else{
        return response()->json(['status' => " Product does not exists"]);

        }
    }

    }
    else{
        return response()->json(['status' => " Login to continue"]);

    }

   }
   public function delete(Request $request){
    if (Auth::check()) {
        $prod_id = $request->input('prod_id');
        if (Whishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) 
        {
            $whish_item = Whishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
            $whish_item->delete();
            // return redirect()->back()->response()->json(['status' => " item deleted successfully"]);
            return response()->json(['status' => " item removed successfully"]);
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
   public function wishcount(){
    $wishcount = Whishlist::where('user_id',Auth::id())->count();
    return response()->json(['count'=> $wishcount]);
   }

}
