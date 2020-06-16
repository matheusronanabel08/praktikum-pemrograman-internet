<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeMainController@index', function () {

    return view('layouts/index');

});
Route::post('/addToCart/add','HomeMainController@insertCart');

Route::get('/productsCheckout','ProductsCheckoutController@index', function(){
    return view('/productsCheckout');
});

Route::get('/uploadBuktiBayar', function(){
    return view('/uploadBuktiBayar');
});

Route::post('/productsCheckout/store','ProductsCheckoutController@store');
Route::post('/productsCheckout/delete/{id}','ProductsCheckoutController@destroy');
Route::delete('/productsCheckout/delete/{id}', 'ProductsCheckoutController@destroy')->name('DeleteCartItem');

Route::get('/login', function () {
    return view('auth/login');
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified','is_admin')->name('home');

Route::get('/adminHome', 'HomeController@adminHome')->name('admin')->middleware('is_admin');

Route::get('/userHome', 'HomeController@userHome')->name('user')->middleware('is_user');

Route::post('/deleteCarts/delete/{id}','UserCartController@destroy');
Route::delete('/deleteCarts/delete/{id}', 'UserCartController@destroy')->name('DeleteCarts');

Route::get('/userProfile', 'HomeController@userBackend');

Route::get('/userTransactions', 'UserTransactionController@index', function() {

	return view ('userTransactions');

});
Route::post('/deleteTransactions/delete/{id}','UserTransactionController@destroy');
Route::delete('/deleteTransactions/delete/{id}', 'UserTransactionController@destroy')->name('DeleteTransactions');

Route::get('/userCarts', 'UserCartController@index');

Route::get('/adminProducts', 'ProductsController@index', function() {

	return view ('adminProducts');

});

// Controller Index Product Detail
Route::get('/productsDetail/detail/{id}', 'HomeMainController@productsDetail');
Route::get('/productsDetail', function() {

	return view ('productsDetail');

});
Route::post('/productsReview/store','ProductReviewController@store');

// Controller Index Products
Route::post('/adminProducts/store','ProductsController@store');
Route::get('/adminProducts/update/{id}','ProductsController@edit');
Route::post('/adminProducts/update/{id}', 'ProductsController@update')->name('UpdateProducts');
Route::post('/adminProducts/delete/{id}','ProductsController@destroy');
Route::delete('/adminProducts/delete/{id}', 'ProductsController@destroy')->name('DeleteProducts');


//Controller Index Product Category
Route::get('/adminProductsCategory','ProductsCategory@index', function() {

	return view ('adminProductsCategory');

});
Route::post('/adminProductsCategory/store','ProductsCategory@store');
Route::post('/adminProductsCategory/delete/{id}','ProductsCategory@destroy');
Route::delete('/adminProductsCategory/delete/{id}', 'ProductsCategory@destroy')->name('DeleteProductsCategory');
Route::get('/adminProductsCategory/update/{id}','ProductsCategory@edit');
Route::post('/adminProductsCategory/update/{id}', 'ProductsCategory@update')->name('UpdateProductsCategory');

//Controller Index Product Courier
Route::get('/adminCouriers','CouriersController@index', function() {

	return view ('adminCouriers');

});
Route::post('/CouriersController/store','CouriersController@store');
Route::post('/adminCouriers/delete/{id}','CouriersController@destroy');
Route::delete('/adminCouriers/delete/{id}', 'CouriersController@destroy')->name('DeleteCouriers');
Route::get('/adminCouriers/update/{id}','CouriersController@edit');
Route::post('/adminCouriers/update/{id}', 'CouriersController@update')->name('UpdateCouriers');

//Controller Index Transactions
Route::get('/adminTransactions','TransactionController@index', function() {

	return view ('adminTransactions');

});
Route::get('/adminTransactions/verify/{id}', 'ProductsCheckoutController@verify')->name('Verify');


Route::get('/adminAddons', function() {

	return view ('adminAddons');

});
