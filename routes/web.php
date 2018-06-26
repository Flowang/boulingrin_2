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

// Route::get('/productlist', 'JomaController@joma_production');
Route::get('/productlist/{jomas_id}','JomaController@joma_production');
Route::get('productList','ProductController@productsCat');
Route::get('commercantList','ProductController@commercantsCat');


Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/roles', 'Admin\RolesController');

Route::resource('product', 'ProductController');

Route::get('/joma', 'JomaController@index');


Route::get('test',function()
{
    Cart::add('293ad', 'Product 1', 1, 9.99);
});

Route::get('/carting', function () {
    return view('cart.index');
});

Route::get('cart','CartController@index');
Route::get('cart/add/{id}','CartController@addItem');
Route::get('cart/remove/{id}','CartController@removeItem');


//Product with ajax

Route::group(['middleware' => 'web'], function () {
    Route::get('/edit-profile', 'EditprofileController@editprofile');
    Route::post('/edit-profile', 'EditprofileController@saveeditprofile');


    Route::get('fiches/create','FicheController@create');
    Route::post('fiches/create','FicheController@store');
    
    
    Route::get('product/{id_prod}/edit','ProductController@edit');
    Route::patch('product/{id_prod}/update','ProductController@update');

    Route::get('fiches/edit/{id}','FicheController@edit');
    Route::patch('fiches/update/{id}','FicheController@update');

    Route::delete('fiches/delete/{id}','FicheController@destroy');
    Route::get('fiches', 'FicheController@index');
    });

