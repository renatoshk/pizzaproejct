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
//web
Route::resource('/', 'ProductController');
Route::resource('/product', 'ProductController');
Route::resource('/order', 'OrderController');
Route::resource('/profile', 'ProfileController');
Route::resource('/changepassword', 'ChangePasswordController');
Route::get('/cart', 'OrderController@cart')->name('cart'); 
Route::get('/menu', 'OrderController@menu')->name('menu'); 
Route::resource('/step-1', 'ShippingController');
Route::resource('/step-2', 'PaymentController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', function () {
    return view('web.about');
});
Route::get('/services', function () {
    return view('web.services');
}); 
Route::get('/contact', function () {
    return view('web.contact');
});
//admin
Route::group(['middleware'=>'admin'], function(){
  Route::get('/adm', 'AdminController@index');
  Route::resource('/attributes_set', 'AdminAttributeSetController');
  Route::resource('/attributes', 'AdminAttributeController');
  Route::resource('/products', 'AdminProductController');
  Route::resource('/users', 'AdminUsersController');
  Route::resource('/orders', 'AdminOrdersController');
  Route::get('/adm/purchase_orders/','AdminOrdersController@purchase_orders')->name('purchase');
  Route::resource('/shippings', 'AdminShippingMethodController');
  Route::resource('/shipping', 'AdminShippingController');
  Route::resource('/payments', 'AdminPaymentController');
  Route::resource('/categories', 'CategoryController');
  Route::get('ajax', function(){
         return view('ajax'); 
  });
  Route::post('/postajax','AjaxController@post');
});
