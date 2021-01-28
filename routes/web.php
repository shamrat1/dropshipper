<?php

use Illuminate\Support\Facades\Route;
use App\Category;
use App\User;
use Illuminate\Http\Request;
// Route::view('/{path?}','welcome');

// for testing
Route::get('/login/admin', function () {
    $user = User::where('email','admin@admin.com')->first();
    Auth::login($user);
    return redirect('/');
});
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->flush();
    return redirect('/');
});

Route::middleware('role:Admin,Editor,Moderator')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin');
    
    //Business Routes
    Route::get('/business', 'BusinessController@all')->name('business.index');
    Route::get('/business/create', 'BusinessController@create')->name('business.create');
    Route::delete('/business/destroy/{id}', 'BusinessController@destroy')->name('business.delete');

    //products
    Route::get('/product', 'ProductController@index')->name('product.index');
    Route::delete('/product/delete/{id}', 'ProductController@destroy')->name('product.delete');

    //product reviews
    Route::get('/reviews','ReviewController@index')->name('review.index');
    Route::get('/reviews/{id}','ReviewController@approvalToggle')->name('review.approval.toggle');
    Route::get('/reviews/{id}/delete','ReviewController@delete')->name('review.delete');

    // Users
    Route::get('user-list', 'UserController@userList')->name('user.index');
    Route::get('create-user', 'UserController@createUser')->name('user.create');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('user/edit-now', 'UserController@editNow')->name('user.update');
    Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::post('user/{id}/password/update', 'UserController@updatePassword')->name('user.password');
});
Route::get('/', 'Admin\AdminController@index')->name('admin')->middleware('auth');

Route::middleware('role:Business')->prefix('business')->group(function (){
    Route::get('/dashboard','BusinessController@index')->name('business');
    Route::get('product-list', 'CategoryController@product_list')->name('product.list');
    Route::get('product-detail', 'CategoryController@product_detail')->name('product.detail');

    // Add product
    Route::get('add-product', 'CategoryController@add_product')->name('product.create');
    Route::post('add-product-item', 'CategoryController@add_product_item')->name('product.store');

    Route::get('/profile', 'BusinessController@profile')->name('business.profile');
    Route::put('/profile', 'BusinessController@profileUpdate')->name('business.profile.update');
    Route::put('/payment', 'BusinessController@paymentUpdate')->name('business.payment.update');
});





View::composer('front.layouts.app', function ($view) {
   $categories = Category::with('subcategories')->get();  
   $view->with('categories',$categories);
});

Auth::routes();
Route::post('/register/business','Auth\RegisterController@registerBusiness')->name('register.business');

// Back End Controller




// Category Routes
Route::get('categories', 'CategoryController@categories')->name('admin.categories');
Route::post('physical-category', 'CategoryController@physical_category');

Route::get('category-sub', 'CategoryController@category_sub');
Route::post('physical-sub-category', 'CategoryController@physical_sub_category');


// orders
Route::get('order', 'CategoryController@order');

// comments
Route::get('comments', 'CategoryController@comments');

// reviews
Route::get('reviews', 'CategoryController@reviews');



// Front End Controller
// Route::get('/', 'FrontEndController@index')->name('frontend.index');

Route::get('subcategory/{id}', 'FrontEndController@subcategory')->name('subcategory.single');
Route::get('product/{id}', 'FrontEndController@product')->name('product.single');
Route::get('user-list', 'UserController@userList');
Route::get('create-user', 'UserController@createUser');
Route::post('create-account', 'UserController@createAccount');
Route::get('edit/{id}', 'UserController@edit');
Route::post('edit-now', 'UserController@editNow');
Route::get('delete/{id}', 'UserController@delete');

Route::get('business', 'FrontEndController@business');



Route::get('cart/view','CartController@index')->name('cart.view');
Route::post('cart','CartController@store')->name('cart.store');
Route::get('cart/{id}/increase', 'CartController@quantityIncrease')->name('cart.increase');
Route::get('cart/{id}/decrease', 'CartController@quantityDecrease')->name('cart.decrease');
Route::get('cart/delete', 'CartController@deleteAll')->name('cart.delete-all');
Route::get('cart/{id}/delete', 'CartController@deleteAll')->name('cart.delete');


Route::get('/distance/{lat}/{lon}', 'BusinessController@distance')->name('nearby.business');


// Route::prefix('api')->group(function () {

//     // index route
//     Route::get('/index','ApiController@index')->name('api.index');
//     //Route to get all Category
//     Route::get('/load-category', 'ApiController@get_category')->name('get.categories');
//     //Route to get all Sub-Category
//     Route::get('/load-subcategory', 'ApiController@get_subcategory')->name('get.subcategories');
//     //Route to get all of Products
//     Route::get('/load-product', 'ApiController@get_product')->name('get.products');
//     //Route to get all of Vendor-Products
//     Route::get('/vendor-product/{id}', 'ApiController@vendor_product')->name('vendor.products');
//     //Route to get Single-product
//     Route::get('/single-product/{id}', 'ApiController@single_product')->name('single.product');
// });

Route::get('/clear/config/123321123',function(){
    Artisan::call('config:cache');
});

Route::get('/migrate/now/123321123',function(){
    Artisan::call('migrate');
});

Route::get('/composer/dump',function(){
    exec('composer dump-autoload');
});