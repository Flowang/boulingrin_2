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
use App\Product;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/roles', 'Admin\RolesController');

Route::resource('product', 'ProductController');

Route::get('/joma', 'JomaController@index');

Route::group(['middleware' => 'web'], function () {
    Route::get('/edit-profile', 'EditprofileController@editprofile');
    Route::post('/edit-profile', 'EditprofileController@saveeditprofile');


    Route::get('fiches/create','FicheController@create');
    Route::post('fiches/create','FicheController@store');
    
    
    Route::get('product/{id}/edit','ProductController@edit');
    Route::patch('product/{id}/update','ProductController@update');

    Route::get('fiches/edit/{id}','FicheController@edit');
    Route::patch('fiches/update/{id}','FicheController@update');

    Route::delete('fiches/delete/{id}','FicheController@destroy');
    Route::get('fiches', 'FicheController@index');
    });