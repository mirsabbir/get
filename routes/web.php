<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();
Route::resource('posts','PostController');
Route::get('about', function(){
    return view('about');
});

Route::get('profile','ProfileController@index');
Route::post('profile','ProfileController@store');
Route::get('profile/{user}','ProfileController@user');
Route::get('/freelancers','FreelancersController@index');
Route::get('/search','SearchController@index');
Route::get('/cart','CartController@show');
Route::get('/checkout','CartController@checkout');
Route::post('/charge','CartController@charge');
Route::get('/checkout/complete','CartController@complete');
Route::get('/message/{user}','MessageController@thread');
Route::post('/message/{user}','MessageController@send');
Route::get('/inbox','MessageController@inbox');
Route::post('/addcart','CartController@add');
Route::get('/orders','OrderController@order');
Route::get('/order/dispatch/{user}','OrderController@dis');
Route::post('/file/{user}','FileController@index');
Route::get('/file/show','FileController@show');
Route::get('/download','FileController@down');
Route::get('/file/download/{file}','FileController@single');
Route::post('/credit','CreditController@index');
Route::post('/done','CreditController@done');



// Route::get('/home', 'HomeController@index')->name('home');
