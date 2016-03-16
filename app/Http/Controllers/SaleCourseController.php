<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;

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
}

?>
