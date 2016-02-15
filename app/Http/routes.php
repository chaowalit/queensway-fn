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
    return redirect('login');
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
});
