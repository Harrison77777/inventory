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
     route::get('employee/details/{employeeId}', 'EmployeeController@details')->name('employee.details');
     route::delete('employee/delete/{employeeId}', 'EmployeeController@delete')->name('employee.delete');
     route::get('employee/edit/{employeeId}', 'EmployeeController@edit')->name('employee.edit');
     route::post('employee/update/{employeeId}', 'EmployeeController@update')->name('employee.update');
     //Customer all route group
     Route::group(['prefix'=> 'customer'], function(){
          route::get('/all', 'CustomerController@index')->name('all.customer');
          route::get('/create', 'CustomerController@create')->name('create.customer');
          route::post('store', 'CustomerController@store')->name('store.customer');
          route::delete('delete/{customerId}', 'CustomerController@delete')->name('delete.customer');
          route::get('details/{customerId}', 'CustomerController@details')->name('details.customer');
     });
     //Customer all route ended here.

     //Supplier all route group
     Route::group(['prefix'=> 'supplier'], function(){
          route::get('all', 'SupplierController@index')->name('all.supplier');
          route::get('create', 'SupplierController@create')->name('create.supplier');
          route::post('add', 'SupplierController@store')->name('store.supplier');
          route::get('edit/{supplierId}', 'SupplierController@edit')->name('edit.supplier');
          route::patch('update/{supplierId}', 'SupplierController@update')->name('update.supplier');
          route::get('details/{supplierId}', 'SupplierController@details')->name('details.supplier');
          route::delete('delete/{supplierId}', 'SupplierController@delete')->name('delete.supplier');
     });
     
     //Supplier all route group ended here

     // Salary manage route group here
     Route::group(['prefix'=> 'salary'], function(){
          route::get('all', 'SalaryController@index')->name('all.salary');
          route::get('pay/advance', 'SalaryController@payAdvanceSalary')->name('pay.advance.salary');
          route::post('advance/accept', 'SalaryController@AcceptAdvanceSalary')->name('accept.advance.salary');
     });
     // Salary manage route group ended here
     // Category route group here
     Route::group(['prefix'=> 'category'], function(){
          route::get('all', 'CategoryController@index')->name('all.category');
          route::delete('delete/{catId}', 'CategoryController@delete')->name('delete.category');
          route::get('create', 'CategoryController@create')->name('create.category');
          route::post('add', 'CategoryController@store')->name('add.category');
          route::get('edit/{catId}', 'CategoryController@edit')->name('edit.category');
          route::post('update/{catId}', 'CategoryController@update')->name('update.category');
     });
     // Category route group ended here 
});

Auth::routes();


