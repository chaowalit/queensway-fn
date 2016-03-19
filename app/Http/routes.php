<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('customers');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    // ---------  Customers Controller --------- //
    Route::get('/customers', 'CustomersController@index');
    Route::get('/create_customer', 'CustomersController@create_customer');
    Route::post('/save_customer', 'CustomersController@save_customer');
    Route::post('/customers/get_customers', 'CustomersController@get_customers');
    Route::post('/customers/del_customers', 'CustomersController@del_customers');
    Route::get('/customers/edit_customers/{id}', 'CustomersController@edit_customers');

    //---------- Mng Course Controller --------- //
    Route::get('/mng_course/show', 'MngCourseController@index');
    Route::get('/mng_course/create_item', 'MngCourseController@create_item');
    Route::post('/mng_course/save_mng_course', 'MngCourseController@save_mng_course');
    Route::post('/mng_course/mng_course/del_item_of_course', 'MngCourseController@del_item_of_course');
    Route::get('/mng_course/edit_item/{id}', 'MngCourseController@edit_item');
    Route::get('/mng_course/doo_course', 'MngCourseController@doo_course');

    //---------- Sale Course Controller --------- //
    Route::get('/sale_course/search_customer', 'SaleCourseController@index');
    Route::post('/sale_course/sale_course/search_customers', 'SaleCourseController@search_customers');
    Route::get('/sale_course/form_sale_credit/{id}', 'SaleCourseController@form_sale_credit');
    Route::get('/sale_course/form_sale_debit/{id}', 'SaleCourseController@form_sale_debit');
    Route::post('/sale_course/save_form_sale_credit', 'SaleCourseController@save_form_sale_credit');
});
