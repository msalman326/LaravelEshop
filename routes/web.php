<?php

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\AdminFrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WhishlistController;
use App\Models\Review;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/Login', function () {
    return view('auth.login');
});
Route::get('/Register', function () {
    return view('auth.register');
});
Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('/view-category/{name}', [FrontendController::class, 'viewcategory']);
Route::get('/view-category/{name}/{prod_name}', [FrontendController::class, 'productview']);


Route::post('/add-to-cart', [CartController::class, 'addproduct']);
Route::post('delete-cart-item', [CartController::class, 'delcart']);
Route::post('update-cart', [CartController::class, 'updatecart']);

Route::get('load-cart-data', [CartController::class, 'cartcount']);

Route::post('add-to-whishlist', [WhishlistController::class, 'add']);
Route::post('delete-whish-item', [WhishlistController::class, 'delete']);
Route::get('load-wish-data', [WhishlistController::class, 'wishcount']);

Route::get('Search',[FrontendController::class,'search']);
Route::get('product-list',[FrontendController::class,'prodlist']);



Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('order-checkout', [CheckoutController::class, 'checkout']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('whishlist', [WhishlistController::class, 'index']); //wishlist spell mistake in all model migraton and controller
    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpay']);

    Route::post('add-rating', [RatingController::class, 'add']);
    Route::get('add-review/{product_name}/userreview', [ReviewController::class, 'add']);
    Route::post('/add-review', [ReviewController::class, 'create']);
    Route::get('/edit-review/{product_name}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/dashboard', [AdminFrontendController::class, 'index']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'add']);
    Route::post('/insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-cate/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-cate/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'orders']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'update']);
    Route::get('order-history', [OrderController::class, 'history']);

    Route::get('all-users', [DashboardController::class, 'users']);
    Route::get('admin/view-user/{id}', [DashboardController::class, 'view']);
});
