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

// Router For Backend
Route::group(['prefix' => 'admin'], function ()
{
    Auth::routes();
});

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
  Route::get('/', function () {
    return view('dashboard');
  })->name('admin.dashboard');

  //Route yang berada dalam group ini hanya dapat diakses oleh user
    //yang memiliki role admin
    Route::group(['middleware' => ['role:admin|superadmin']], function ()
    {
        Route::resource('/role', 'Admin\RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);
        Route::resource('/users', 'Admin\UserController')->except(['show']);
        Route::get('/users/roles/{id}', 'Admin\UserController@rolePermission')->name('users.roles');
        Route::put('/users/roles/{id}', 'Admin\UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'Admin\UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'Admin\UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'Admin\UserController@setRolePermission')->name('users.setRolePermission');

    });
  // Penulis
  Route::resource('/penulis', 'Admin\PenulisController');
  // Buku
  Route::resource('/buku', 'Admin\BukuController');
});

// Router Frontend
Route::get('/', function(){
  return redirect('admin');
});
