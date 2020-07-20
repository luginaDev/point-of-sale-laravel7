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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    // route admin 
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('role', 'RoleController');  
        Route::resource('user', 'UserController');
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('users', 'UserController@addPermission')->name('user.add_permission');
        Route::get('users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('users/permission/{role}', 'UserController@setRolePermission')->name('user.setRolePermission');
    });
   
    Route::group(['middleware' => ['permission:show products|create products|delete products']], function () {
        Route::resource('kategori', 'CategoryController');
        Route::resource('produk', 'ProductController');  
    });
    Route::group(['middleware' => ['role:kasir']], function () {
        Route::get('/transaksi', 'OrderController@addOrder')->name('order.transaksi');
        Route::post('/cart', 'OrderController@addToCart');
Route::get('/cart', 'OrderController@getCart');
Route::delete('/cart/{id}', 'OrderController@removeCart');
    });

    Route::get('/home', 'HomeController@index')->name('home');  
   
    
    
});

