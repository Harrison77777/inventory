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
     // product route group here
     Route::group(['prefix'=> 'product'], function(){
          route::get('all', 'ProductController@index')->name('all.product');
          route::get('details/{proId}', 'ProductController@details')->name('details.product');
          route::delete('delete/{proId}', 'ProductController@delete')->name('delete.product');
          route::get('create', 'ProductController@create')->name('create.product');
          route::post('add', 'ProductController@store')->name('add.product');
          route::get('edit/{proId}', 'ProductController@edit')->name('edit.product');
          route::post('update/{proId}', 'ProductController@update')->name('update.product');
     });
     // product route group ended here 
     // Expanse route group here
     Route::group(['prefix'=> 'expanse'], function(){
          route::get('all', 'ExpanseController@index')->name('all.expanse');
          route::get('details/{expId}', 'ExpanseController@details')->name('details.expanse');
          route::get('create', 'ExpanseController@create')->name('create.expanse');
          route::get('of-today', 'ExpanseController@todayExpanse')->name('today.expanse');
          route::post('add', 'ExpanseController@store')->name('add.expanse');
       
     });
     // Expanse route group ended here 
     
     // POS route group here
     Route::group(['prefix'=> 'pos'], function(){
          route::get('/', 'PosController@index')->name('pos');
          
          route::post('prepare', 'PosController@prepareProductToSale')->name('prepare.to.sale');
          route::post('update/quantity', 'PosController@updateQuantity')->name('update.quantity');
          route::post('deleteProFromPos', 'PosController@deleteProFromPos')->name('del.pro.from.pos');
          route::get('All/prepareProduct', 'PosController@getAllPrepareProducts')->name('get.all.prepare.products');
          route::post('conform/product', 'PosController@confirmProduct')->name('confirm.product');
       
     });
     // POS route group ended here 
     // Sales reports route group here
     Route::group(['prefix'=>'salesReport'], function(){
          route::get('/', 'SalesReportController@index')->name('salesReport');
          route::get('particular/customer/product/{customerId}', 'SalesReportController@todayParticularCustomerBuyDetails')->name('today.particular.cus.pro');
          route::get('yesterday-all-sale-according-to-customer','SalesReportController@yesterdayAllBuyerCustomer')->name('yesterday.all.sale');
          route::get('yester/particular/customer/buying/details/{customerId}', 'SalesReportController@yesterdayParticularCustomerBuyDetails')->name('yesterday.particular.customer.buy.details');
          route::get('current-month-all-sale-details-by-date', 'SalesReportController@currentMonthAllSale')->name('current.month.all.sale');
          route::get('current-month-dateWise-selling-details/{date}', 'SalesReportController@currentMonthDateWiseCustomer')->name('current.month.datewise.all.buyer.customer');
          route::get('current-month-date-wise-particular-customer-buying-details/{customerId}', 'SalesReportController@currentMonthParticularCusBuyDetails')->name('current.month.particular.customer.buy.details');
          route::get('sales-reports-of-all-months', 'SalesReportController@salesReportsOfAllMonth')->name('sales.reports.of.all.month');
          route::get('particular-month-wise-all-selling-date/{month}', 'SalesReportController@particularMonthWiseAllSellingDate')->name('particular.month.wise.all.selling.date');
          route::get('particular-month-particular-date-wise-all-customer/{date}', 'SalesReportController@particularMonthParticularDateWiseCustomers')->name('particular.month.particular.month.wise.all.customer');
          route::get('perticular-month-particular-date-wise-customer-buying-details/{customerId}','SalesReportController@perticular_month_particular_date_wise_customer_buying_details')->name('perticular.month.particular.date.wise.customer.buying.details');
     });
     // Sales reports route group ended here

     // Attendance route group here
     Route::group(['prefix'=> 'attendance'], function(){
          route::get('/', 'AttendanceController@index')->name('attendance');
          route::get('take-attendance', 'AttendanceController@takeAttendance')->name('take.attendance');
          route::post('insert-attendance', 'AttendanceController@insertAttendance')->name('insert.attendance');
          route::get('current-month-of/{currentMonth}', 'AttendanceController@currentMonthAttendance')->name('current.month.attendance');
          route::get('ByDate/{date}', 'AttendanceController@dateWiseAttendance')->name('datewise.attendance');
          route::get('edit/{date}', 'AttendanceController@editAttendance')->name('edit.attendance');
          route::patch('update/{date}', 'AttendanceController@updateAttendance')->name('update.attendance');
       
     });
     // Attendance route group ended here 
     
     Route::group(['prefix' => 'user'], function() {
         route::get('create-user', 'UserController@createUser')->name('create.user');
         route::post('add/Admin', 'UserController@addAdmin')->name('add.user');
         route::get('profile.show', 'UserController@showProfile')->name('profile.show');
         route::get('change-password-form', 'UserController@changePasswordForm')->name('show.change.password.form');
         route::post('change/password', 'UserController@changePassword')->name('change.password');
     });
     
});
Auth::routes();
