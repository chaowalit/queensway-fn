<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\BuyCourse;

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
        $limit = 50;
        $total_page = $this->customers->count_customers();
        $total_page = ceil($total_page / $limit);
        $data = array(
            'total_page' => $total_page,
            'limit' => $limit,
        );
        $this->render_view('customers/customers', $data, 'customers', 1);
    }

    public function get_customers(Request $request){
        $limit = $request->input('limit', 50);
        $current_page = $request->input('current_page', 1);
        $keyword = $request->input('keyword', '');
        $type_search = $request->input('type_search', '');

        $customers = $this->customers->get_list_customers(_pagination_($current_page, $limit)['offset'], _pagination_($current_page, $limit)['limit'], $keyword, $type_search);
        $BuyCourse = new BuyCourse;
        $accrued_expenses = $BuyCourse->check_customer_accrued_expenses($customers);
        $data = array(
            'customers' => $customers,
            'accrued_expenses' => $accrued_expenses,
        );
        echo view('customers/list_customers', $data);
    }

    public function create_customer(){
        $Customers = new Customers;
        $result = \DB::table($Customers->getTableName())->orderBy('id', 'desc')
                                    ->take(1)
                                    ->get();
        //dd($result);
        $run_cus_num = env('QWC_BRANCE', 'RM');
        if(empty($result)){
            $run_cus_num = $run_cus_num."000001";
        }else{
            $next = ($result[0]->id + 1);
            $loop = (6 - strlen($next));
            $temp = "";
            for($i = 1 ; $i <= $loop ; $i++){
                $temp = $temp."0";
            }
            $run_cus_num = $run_cus_num.$temp.$next;
        }
        $data = array(
            "run_cus_num" => $run_cus_num,
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

        // $validator = \Validator::make($request->all(), [
        //     'customer_number' => 'required|unique:customers',
        //     'prefix' => '',
        //     'full_name' => 'required',
        //     'thai_id' => 'required|numeric|unique:customers',
        //     'address' => '',
        //     'nickname' => '',
        //     'tel' => 'required',
        //     'email' => 'email',
        //     'birthday' => '',
        //     'intolerance_history' => '',
        // ]);
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
            'comment' => $request->input('comment', ''),
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
            $BuyCourse = new BuyCourse;
            $check_buy = $BuyCourse->query_customer_buy_course($id);
            if(count($check_buy) == 0){
                Customers::where('id', $id)->delete();

                return "200";
            }else{
                return "error";
            }

        } catch (Exception $e) {
            return "error";
        }

    }
}
