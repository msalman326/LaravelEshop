<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_name)
    {
        $product = Product::where('name', $product_name)->where('status', '0')->first();

        


        if ($product) {
            $product_id = $product->id;
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)->first();
            if ($verified_purchase) {
                if (Review::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return redirect()->back()->with('status', 'Already reviewd To edit click on edit below ');
                } else {
                    return view('frontend.reviews.index', compact('product', 'verified_purchase'));
                }
            } else {
                return redirect()->back()->with('status', 'You Cannot Write Review a Product without Purchase');
            }
        } else {
            return redirect()->back()->with('status', 'Link broken');
        }
    }
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product) {


            $user_review = $request->input('ureview');
            if ($user_review !== null){
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review,

            ]);
            $categoryname = $product->category->name;
            $productname = $product->name;
            if ($new_review) {
                return redirect('view-category/' . $categoryname . '/' . $productname)->with('status', 'Review added successfully');
            }
        } else {
            return redirect()->back()->with('status', 'Link broken');
        }
    }
    else{
        return redirect()->back()->with('status', 'You have to write something');


    }
    }
    public function edit($product_name)
    {
        $product = Product::where('name', $product_name)->where('status', '0')->first();
        if ($product) {
            $product_id = $product->id;


            $existing_review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();


            if ($existing_review) {
                return view('frontend.reviews.edit', compact('product', 'existing_review'));
            } else {
                return redirect()->back()->with('status', 'Link damaged');
            }
        }
    }
    public function update(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();
        $user_review = $request->input('ureview');
        if ($user_review !== null) {
            $review_id = $request->input('product_id');
            $review = Review::where('prod_id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $user_review;
                $review->update();
                $categoryname = $product->category->name;
                $productname = $product->name;
                return redirect('view-category/' . $categoryname . '/' . $productname)->with('status', 'Review updated successfully');
            }
            else 
            {
                return redirect()->back()->with('status', 'Error');
            }
        } 
        else
         {
            return redirect()->back()->with('status', 'You have to write something');
        }
    }
}
