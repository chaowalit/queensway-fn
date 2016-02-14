<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;

class CustomersController extends QwcController
{
    public $customers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Customers $customers)
    {
        $this->middleware('auth');

        $this->customers = $customers;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $limit = 15;
        $total_page = $this->customers->count_customers();
        $total_page = ceil($total_page / $limit);
        $data = array(
            'total_page' => $total_page,
            'limit' => $limit,
        );
        $this->render_view('customers/customers', $data, 'customers', 1);
    }

    public function get_customers(Request $request){
        $limit = $request->input('limit', 15);
        $current_page = $request->input('current_page', 1);

        $customers = $this->customers->get_list_customers(_pagination_($current_page, $limit)['offset'], _pagination_($current_page, $limit)['limit']);
        $data = array(
            'customers' => $customers,
        );
        echo view('customers/list_customers', $data);
    }

    public function create_customer(){
        $data = array(

        );
        $this->render_view('customers/form_customers', $data, 'customers', 2);
    }

    public function edit_customers($id){
        //echo $id;
        $customer = $this->customers->data_edit_customer($id);
        //dd((array)$customer);
        $customers = (array)$customer;
        $data = array(
            'customers' => $customers,
            'customers_id' => $customers['id'],
        );
        $this->render_view('customers/form_edit_customers', $data, 'customers', 'form-chanel');
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
        if($request->input('customers_id', NULL)){
            $validator = \Validator::make($request->all(), [
                'customer_number' => 'required',
                'prefix' => '',
                'full_name' => 'required',
                'thai_id' => 'required|numeric',
                'address' => '',
                'nickname' => '',
                'tel' => 'required',
                'email' => 'email',
                'birthday' => '',
                'intolerance_history' => '',
            ]);

            $customers_id = $request->input('customers_id', NULL);
            if($validator->fails()){
                return redirect('customers/edit_customers/'.$customers_id)
                        ->withErrors($validator)
                        ->withInput();
            }
        }else{
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

            if($validator->fails()){
                return redirect('create_customer')
                        ->withErrors($validator)
                        ->withInput();
            }
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

        if($request->input('customers_id', NULL)){
            $customers_id = $request->input('customers_id', NULL);
            $this->customers->save_edit_customer($customers_id, $data);
            $request->session()->flash('status', 'success');
            
            return redirect('customers/edit_customers/'.$customers_id);
        }else{
            $customer = Customers::create($data);
        
            $request->session()->flash('status', 'success');
            return redirect('create_customer');
        }
        
    }

    public function del_customers(Request $request){
        try {
            $id = $request->input('id', '');
            Customers::where('id', $id)->delete();

            return "200";
        } catch (Exception $e) {
            return "error";
        }
        
    }
}
