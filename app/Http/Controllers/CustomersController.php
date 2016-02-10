<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;

class CustomersController extends QwcController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $total_page = Customers::where('deleted_at', '<>', NULL)->count();
        dd($total_page);
        $data = array(
            //'total_page' => count($total_page),
        );
        $this->render_view('customers/customers', $data, 'customers', 1);
    }

    public function get_customers(Request $request){
        $limit = $request->input('limit', 15);

    }

    public function create_customer(){
        $data = array(

        );
        $this->render_view('customers/form_customers', $data, 'customers', 2);
    }

    public function save_customer(Request $request){
        
        $validator = \Validator::make($request->all(), [
            'customer_number' => 'required|unique:customers',
            'prefix' => '',
            'full_name' => 'required',
            'thai_id' => 'required|numeric|unique:customers',
            'address' => '',
            'nickname' => '',
            'tel' => 'required',
            'email' => 'email',
            'birthday' => '',
            'intolerance_history' => '',
        ]);

        if ($validator->fails()) {
            return redirect('create_customer')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = array(
            'customer_number' => $request->input('customer_number', ''),
            'prefix' => $request->input('prefix', ''),
            'full_name' => $request->input('full_name', ''),
            'thai_id' => $request->input('thai_id', ''),
            'address' => $request->input('address', ''),
            'nickname' => $request->input('nickname', ''),
            'tel' => $request->input('tel', ''),
            'email' => $request->input('email', ''),
            'birthday' => $request->input('birthday', ''),
            'intolerance_history' => $request->input('intolerance_history', ''),
        );
        $customer = Customers::create($data);
        //dd($customer);
        $request->session()->flash('status', 'success');
        return redirect('create_customer');
    }
}
