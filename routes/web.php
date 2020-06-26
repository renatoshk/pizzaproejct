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

Route::get('/home', function () {
    return view('web.index');
});
Route::get('/', function () {
    return view('web.index');
});
Route::get('/about', function () {
    return view('web.about');
});
Route::get('/services', function () {
    return view('web.services');
});
Route::get('/menu', function () {
    return view('web.menu');
});
Route::get('/contact', function () {
    return view('web.contact');
});
Route::get('/blog', function () {
    return view('web.blog');
});
Route::get('/cart', function () {
    return view('web.cart');
});

Route::group(['middleware'=>'admin'], function(){
  Route::get('/adm', 'AdminController@index');
  Route::resource('/attributes_set', 'AdminAttributeSetController');
  Route::resource('/attributes', 'AdminAttributeController');
  Route::resource('/products', 'AdminProductController');
  Route::get('ajax', function(){
         return view('ajax'); 
  });
  Route::post('/postajax','AjaxController@post');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
