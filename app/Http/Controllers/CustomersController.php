<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;

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
        $data = array(

        );
        $this->render_view('customers/customers', $data, 'customers', 1);
    }

    public function create_customer(){
        $data = array(

        );
        $this->render_view('customers/form_customers', $data, 'customers', 2);
    }

    public function save_customer(Request $request){
        $request->session()->flash('status', 'success');
        $validator = \Validator::make($request->all(), [
            'full_name' => 'required',
            'thai_id' => 'required|numeric|unique:customers|',
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
        
    }
}
