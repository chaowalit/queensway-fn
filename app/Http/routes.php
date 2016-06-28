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
//-------------------------------- Api V1 ----------------------------------//
Route::post('api/v1/getCompanyInfo', 'api\v1\CompanyController@getCompanyInfo');
Route::post('api/v1/updateCompanyInfo', 'api\v1\CompanyController@updateCompanyInfo');
Route::post('api/v1/changePasswordCompany', 'api\v1\CompanyController@changePasswordCompany');

Route::get('api/v1/search_customer', 'api\v1\CustomerController@search_customer');
Route::get('api/v1/list_customer', 'api\v1\CustomerController@list_customer');

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
    Route::post('/sale_course/save_form_sale_debit', 'SaleCourseController@save_form_sale_debit');

    Route::get('sale_course/invoice/{id}', 'SaleCourseController@invoice');

    Route::post('/sale_course/transfer_save_form_sale_credit', 'SaleCourseController@transfer_save_form_sale_credit');
    Route::post('/sale_course/transfer_save_form_sale_debit', 'SaleCourseController@transfer_save_form_sale_debit');

    //---------- Course Use ----------------------------//
    Route::get('course/search_customer_use_course', 'CourseController@search_customer_use_course');
    Route::post('course/ajax_search_customer_use_course', 'CourseController@ajax_search_customer_use_course');

    Route::get('course/show_all_course_for_customer', 'CourseController@show_all_course_for_customer');
    Route::post('course/delete_course', 'CourseController@delete_course');
    Route::get('course/transfer_buy_course_of_credit', 'CourseController@transfer_buy_course_of_credit');
    Route::get('course/transfer_buy_course_of_debit', 'CourseController@transfer_buy_course_of_debit');

    Route::post('course/form_transfer_buy_course', 'CourseController@form_transfer_buy_course');

    Route::get('course/cancel_course/{id}/{price}', 'CourseController@cancel_course');

    //------------------------------ History Payment --------------------------//
    Route::get('history_payment/payment/{id}', 'HistoryPaymentController@index');
    Route::post('history_payment/save_history_payment', 'HistoryPaymentController@save_history_payment');
    Route::get('history_payment/invoice/{id}', 'HistoryPaymentController@invoice');

    //------------------------------- Usage Course -----------------------------//
    Route::get('usage_course/form_usage_course/{id}', 'UsageCourseController@form_usage_course');
    Route::post('usage_course/save_form_usage_course', 'UsageCourseController@save_form_usage_course');

    //------------------------------- Report -----------------------------------//
    Route::get('report', 'ReportController@index');
    Route::post('gen_report_for_month', 'ReportController@gen_report_for_month');
});
