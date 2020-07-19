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
    Route::resource('kategori', 'CategoryController');
    Route::resource('produk', 'ProductController');
    Route::get('/home', 'HomeController@index')->name('home');  
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::post('users', 'UserController@addPermission')->name('user.add_permission');
    Route::get('users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
    Route::put('users/permission/{role}', 'UserController@setRolePermission')->name('user.setRolePermission');
});

