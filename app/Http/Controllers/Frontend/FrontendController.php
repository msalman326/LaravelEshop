<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller
{
    public function index(){
        $featured_products = Product::where('trending','1')->take(15)->get();
        $category = Category::where('popular','1')->take(20)->get();
        return view('frontend.index',compact('featured_products','category'));
    }
    Public function category(){

        $category = Category::where('status','0')->get();
        return view('frontend.categories',compact('category'));
    }
    public function viewcategory($name){ 
          if(Category::where('name',$name)->exists())
          {
            $category = Category::where('name',$name)->first();
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));



          } 
          else
          {
            return Redirect::back()->with('status', 'Category not exist');

          }
    }
    public function productview($name,$prod_name)
    {
        if(Category::where('name',$name)->exists()){
            if(Product::where('name',$prod_name)->exists()){
                $products = Product::where('name',$prod_name)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $ratings_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $user_ratings =Rating::where('prod_id', $products->id)->where('user_id',Auth::id())->first();
                $reviews = Review::where('prod_id', $products->id)->get();
                
                if($ratings->count()>0){
                    $ratings_value = $ratings_sum/$ratings->count();

                }
                else{
                    $ratings_value = 0;
                }

                return view('frontend.products.view',compact('products','ratings','ratings_value','user_ratings','reviews'));
            }
            else{
                return Redirect::back()->with('status', 'Link Broken'); 
            }
        }
        else{
            return Redirect::back()->with('status', 'Link Broken Category not found');
        }


    }
    public function prodlist(){
        $products = Product::select('name')->where('status','0')->get();
        $data = [];
        foreach($products as $prod){
            $data[] = $prod['name'];
        }
        return $data;
    }

    public function search(Request $request){
        $search = $request->input('query');

        
        if($search){
            $first = Category::where('name','LIKE',"%$search%");
           
            $search_products =Product::where('name','LIKE',"%$search%")->orwhere('slug','LIKE',"%$search%")
            ->get();

                    
            

        return view('frontend.search',compact('search_products','search'));
            

        }
        else{
        return view('frontend.search',compact('search'));



        }


    }
}

