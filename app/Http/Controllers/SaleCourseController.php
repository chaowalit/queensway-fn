<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class SaleCourseController extends QwcController{

    public $customers;
    public $item_of_course;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Customers $customers, ItemOfCourse $item_of_course)
    {
        $this->middleware('auth');
        $this->item_of_course = $item_of_course;
        $this->customers = $customers;
    }

	public function index(){
		$data = array();

		$this->render_view('sale_course/result_search_customer', $data, 'mng_course', 2);
	}

    public function search_customers(Request $request){
        $keyword = $request->input('keyword', '');
        $column_name = $request->input('column_name', '');

        $customers = $this->customers->get_list_search_customers($keyword, $column_name);
        $data = array(
            'customers' => $customers,
        );
        echo view('sale_course/list_search_customers', $data);
    }

    public function form_sale_credit($id){
        try {
            $customers_id = (int)base64_decode($id);

            if($customers_id == 0){
                return redirect('sale_course/search_customer');
            }
            $data_customer = Customers::find($customers_id)->toArray();
            //dd($data_customer);
        } catch (Exception $e) {
            return redirect('sale_course/search_customer');
            exit;
        }

        $data = array(
            'customers_id' => $customers_id,
            'data_customer' => $data_customer,
        );

		$this->render_view('sale_course/form_sale_credit', $data, 'mng_course', 2);
    }

    public function save_form_sale_credit(Request $request){
        $validator = \Validator::make($request->all(), [
            'book_no' => 'required',
            'number_no' => 'required',
            'total_price' => 'required|numeric',
            'multiplier_price' => 'required|numeric',
            'total_credit' => 'required|numeric',
            'consultant' => 'required',
            'payment_amount' => 'required|numeric',
            'limit_credit' => 'required|numeric',
            'accrued_expenses' => 'required|numeric|min:0',
            'cash' => 'numeric',
            'credit_debit_card' => 'numeric',

            //'title' => 'required|unique:posts|max:255',
            //'' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('sale_course/form_sale_credit/'.base64_encode($request->get('customers_id')))
                        ->withErrors($validator)
                        ->withInput();
        }

        $buy_course = new BuyCourse;
        $res = $buy_course->save_form_sale_credit($request->all());

        if($res['status'] == 200){
            $buy_course_id = $res['buy_course_id'];
            return \Redirect::to('sale_course/invoice/'.base64_encode($buy_course_id));
            //return \Redirect::route('sale_course/invoice', array('buy_course_id' => $buy_course_id));
        }else{
            return redirect('sale_course/search_customer'); //for case error
        }

    }

    public function invoice($buy_course_id){
        $buy_course_id = base64_decode($buy_course_id);
        $buy_course = new BuyCourse;
        $res = $buy_course->getDataSaleCourseById($buy_course_id);
        //dd($res);
        if(count($res) > 0){
            $this->render_view('sale_course/invoice', $res, 'mng_course', 2);
        }else{
            return redirect('sale_course/search_customer'); //for case error
        }

    }

    public function form_sale_debit($id){
        try {
            $customers_id = (int)base64_decode($id);

            if($customers_id == 0){
                return redirect('sale_course/search_customer');
            }
            $data_customer = Customers::find($customers_id)->toArray();
            $item_of_course = $this->item_of_course->getItemOfCourseOfFormSaleDebit();
        } catch (Exception $e) {
            return redirect('sale_course/search_customer');
            exit;
        }
        $data = array(
            'customers_id' => $customers_id,
            'data_customer' => $data_customer,
            'item_of_course' => $item_of_course,
        );

        $this->render_view('sale_course/form_sale_debit', $data, 'mng_course', 2);
    }

    public function save_form_sale_debit(Request $request){
        $validator = \Validator::make($request->all(), [
            'book_no' => 'required',
            'number_no' => 'required',
            'total_price' => 'required|numeric',
            //'multiplier_price' => 'required|numeric',
            //'total_credit' => 'required|numeric',
            'consultant' => 'required',
            'payment_amount' => 'required|numeric',
            //'limit_credit' => 'required|numeric',
            'accrued_expenses' => 'required|numeric|min:0',
            'cash' => 'numeric',
            'credit_debit_card' => 'numeric',

            //'title' => 'required|unique:posts|max:255',
            //'' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('sale_course/form_sale_debit/'.base64_encode($request->get('customers_id')))
                        ->withErrors($validator)
                        ->withInput();
        }

        $buy_course = new BuyCourse;
        $res = $buy_course->save_form_sale_debit($request->all());

        if($res['status'] == 200){
            $buy_course_id = $res['buy_course_id'];
            return \Redirect::to('sale_course/invoice/'.base64_encode($buy_course_id));
            //return \Redirect::route('sale_course/invoice', array('buy_course_id' => $buy_course_id));
        }else{
            return redirect('sale_course/search_customer'); //for case error
        }
    }
    //--------------------------------------- save sale transfer corse -------------------------------------//
    public function transfer_save_form_sale_credit(Request $request){
        $validator = \Validator::make($request->all(), [
            'book_no' => 'required',
            'number_no' => 'required',
            'total_price' => 'required|numeric',
            'multiplier_price' => 'required|numeric',
            'total_credit' => 'required|numeric',
            'consultant' => 'required',
            'payment_amount' => 'required|numeric',
            'limit_credit' => 'required|numeric',
            'accrued_expenses' => 'required|numeric|min:0',
            'cash' => 'numeric',
            'credit_debit_card' => 'numeric',

            //'title' => 'required|unique:posts|max:255',
            //'' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('sale_course/form_sale_credit/'.base64_encode($request->get('customers_id')))
                        ->withErrors($validator)
                        ->withInput();
        }
//dump($request->all());
        $buy_course = new BuyCourse;
        $res = $buy_course->transfer_save_form_sale_credit($request->all());
//dd($res);
        if($res['status'] == 200){
            $buy_course_id = $res['buy_course_id'];
            return \Redirect::to('sale_course/invoice/'.base64_encode($buy_course_id));
            //return \Redirect::route('sale_course/invoice', array('buy_course_id' => $buy_course_id));
        }else{
            return redirect('sale_course/search_customer'); //for case error
        }
    }

    public function transfer_save_form_sale_debit(Request $request){
        $validator = \Validator::make($request->all(), [
            'book_no' => 'required',
            'number_no' => 'required',
            'total_price' => 'required|numeric',
            //'multiplier_price' => 'required|numeric',
            //'total_credit' => 'required|numeric',
            'consultant' => 'required',
            'payment_amount' => 'required|numeric',
            //'limit_credit' => 'required|numeric',
            'accrued_expenses' => 'required|numeric|min:0',
            'cash' => 'numeric',
            'credit_debit_card' => 'numeric',

            //'title' => 'required|unique:posts|max:255',
            //'' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('sale_course/form_sale_debit/'.base64_encode($request->get('customers_id')))
                        ->withErrors($validator)
                        ->withInput();
        }

        $buy_course = new BuyCourse;
        $res = $buy_course->transfer_save_form_sale_debit($request->all());

        if($res['status'] == 200){
            $buy_course_id = $res['buy_course_id'];
            return \Redirect::to('sale_course/invoice/'.base64_encode($buy_course_id));
            //return \Redirect::route('sale_course/invoice', array('buy_course_id' => $buy_course_id));
        }else{
            return redirect('sale_course/search_customer'); //for case error
        }
    }
}

?>
