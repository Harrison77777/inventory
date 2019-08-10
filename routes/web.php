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

Route::group(['prefix' => '/', 'middleware'=> 'auth:web'], function(){
     route::get('dashboard', 'HomeController@index')->name('dashboard');
     route::get('employee', 'EmployeeController@index')->name('employees');
     route::get('create/employee', 'EmployeeController@create')->name('create.employee');
     route::post('add/employee', 'EmployeeController@store')->name('store.employee');
});

Auth::routes();


