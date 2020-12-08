<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::group(['middleware' => 'auth:api'], function () {
//     Route::get('logout','AuthController@logout');
//     // Route::get('user','UserController@user');
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
// Landing Page
Route::get('/index','API\HomeController@index');

Route::group(['middleware' => 'auth:api', 'namespace' => 'API'], function () {

    

    // Product Route
    Route::get('/products', 'HomeController@getProducts');
    Route::get('/product/{slug}', 'HomeController@getProduct');

    // Category Route
    Route::get('/categories', 'HomeController@getCategories');
    Route::get('/category/{id}', 'HomeController@getCategory');

    Route::get('/sub_categories','HomeController@getSubCategories');
    Route::get('/sub_categories/{id}','HomeController@getSubCategory');

    // User Route
    Route::get('/user','UserController@user');
    Route::post('/user', 'UserController@update');

    // Order Route
    // Route::post('/checkout','CheckoutController@checkout');

    // Cart Route
    Route::group(['prefix' => 'cart'],function (){
        Route::get('/','CartController@index');
        Route::post('/store','CartController@store');
        Route::get('/increase/{id}','CartController@increase');
        Route::get('/decrease/{id}','CartController@decrease');
        Route::get('/destroy/{id}','CartController@destroy');
    });
});