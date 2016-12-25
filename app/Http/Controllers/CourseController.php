<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class CourseController extends QwcController{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function search_customer_use_course(Request $request){
		$sub_menu = $request->get('sub_menu', '');
		if($sub_menu == 1){
			$data = array(
				'sub_menu' => $sub_menu,
			);

			$this->render_view('course/search_customer_use_course', $data, 'use_course', $sub_menu, 1);
		}else if($sub_menu == 2){
			$data = array(
				'sub_menu' => $sub_menu,
			);

			$this->render_view('course/search_customer_use_course', $data, 'use_course', $sub_menu, 1);
		}else if($sub_menu == 3){

		}else{
			echo "Error";
		}

	}

	public function ajax_search_customer_use_course(Request $request){
		$keyword = $request->input('keyword', '');
        $column_name = $request->input('column_name', '');

		$BuyCourse = new BuyCourse;
        $customers = $BuyCourse->get_list_search_customers_use_course($keyword, $column_name);
        $data = array(
            'customers' => $customers,
			'sub_menu' => $request->get('sub_menu', ''),
        );
        echo view('course/list_search_customers', $data);
	}

	public function show_all_course_for_customer(Request $request){
		$customer_id = base64_decode($request->input('customer_id', ''));
		$sub_menu = $request->input('sub_menu', '');

		if($sub_menu == 1){

			$BuyCourse = new BuyCourse;
			$course_all = $BuyCourse->show_all_course_for_customer($customer_id);

			$Customers = new Customers;
			$customer = $Customers->getDataCustomerById($customer_id);
			$data = array(
				'sub_menu' => $sub_menu,
				'course_all' => $course_all,
				'data_customer' => (array)$customer[0],
			);

			$this->render_view('course/show_all_course_for_customer', $data, 'use_course', $sub_menu, 2);
		}else if($sub_menu == 2){

			$BuyCourse = new BuyCourse;
			$course_all = $BuyCourse->show_all_course_for_customer($customer_id);

			$Customers = new Customers;
			$customer = $Customers->getDataCustomerById($customer_id);
			$data = array(
				'sub_menu' => $sub_menu,
				'course_all' => $course_all,
				'data_customer' => (array)$customer[0],
			);

			$this->render_view('course/show_all_course_for_customer', $data, 'use_course', $sub_menu, 2);

		}else if($sub_menu == 3){

		}else{
			echo "Error";
		}

	}

	public function delete_course(Request $request){
		$password_transection = $request->input('password_transection', '');
		$set_password_transection = \Auth::user()->set_password_transection;

		if($password_transection == $set_password_transection){
			$buy_course_id = $request->input('buy_course_id', '');
			$BuyCourse = new BuyCourse;
			$res = $BuyCourse->delete_soft_course($buy_course_id);
			if($res == 200){
				return 200;
			}else{
				return 400;
			}
		}else{
			return 400;
		}
	}

	public function transfer_buy_course_of_credit(Request $request){
		$buy_course_id = $request->input('buy_course_id', '');
		$data = array();
		$BuyCourse = new BuyCourse;
		$res = $BuyCourse->getDataBuyCourseById($buy_course_id);
		if(count($res) == 1){
			$temp = (array)$res[0];
			$data['buy_course_id'] = $temp['id'];
			$data['referent_payment_transfer'] = number_format($temp['payment_amount_total'] - ($temp['usage_credit'] / $temp['multiplier_price']), 2);
			$data['book_no'] = $temp['book_no'];
			$data['number_no'] = $temp['number_no'];

		}else{
			$data['buy_course_id'] = '';
			$data['referent_payment_transfer'] = '';
			$data['book_no'] = '';
			$data['number_no'] = '';
		}

		return json_encode($data, true);
	}

	public function transfer_buy_course_of_debit(Request $request){
		$buy_course_id = $request->input('buy_course_id', '');
		$data = array();
		$BuyCourse = new BuyCourse;
		$res = $BuyCourse->getDataBuyCourseById($buy_course_id);
		if(count($res) == 1){
			$temp = (array)$res[0];
			$data['buy_course_id'] = $temp['id'];

			$item_of_course = unserialize($temp['item_of_course']);
			$count_amount_use = 0.00;
			foreach($item_of_course as $val){
				$count_amount_use = $count_amount_use + ($val['amount_usage'] * $val['price_per_unit']);
			}

			$data['referent_payment_transfer'] = number_format($temp['payment_amount_total'] - $count_amount_use, 2);

			$data['book_no'] = $temp['book_no'];
			$data['number_no'] = $temp['number_no'];

		}else{
			$data['buy_course_id'] = '';
			$data['referent_payment_transfer'] = '';
			$data['book_no'] = '';
			$data['number_no'] = '';
		}

		return json_encode($data, true);
	}

	public function form_transfer_buy_course(Request $request){
		if($request->get('type_course') == 'credit' && $request->get('referent_payment_transfer', 0) != 0){
			$BuyCourse = new BuyCourse;
			$res = $BuyCourse->getDataBuyCourseById($request->get('buy_course_id'));
			$temp = (array)$res[0];

			$data_customer = Customers::find($temp['customers_id'])->toArray();

			$data = array(
	            'customers_id' => $temp['customers_id'],
	            'data_customer' => $data_customer,
				'transfer_course' => true,
				'referent_payment_transfer' => $request->get('referent_payment_transfer'),
				'old_buy_course_id' => $request->get('buy_course_id'),
	        );

			$this->render_view('sale_course/form_sale_credit', $data, 'mng_course', 2);

		}else if($request->get('type_course') == 'debit' && $request->get('referent_payment_transfer', 0) != 0){
			$BuyCourse = new BuyCourse;
			$res = $BuyCourse->getDataBuyCourseById($request->get('buy_course_id'));
			$temp = (array)$res[0];

			$data_customer = Customers::find($temp['customers_id'])->toArray();
			$ItemOfCourse = new ItemOfCourse;
			$item_of_course = $ItemOfCourse->getItemOfCourseOfFormSaleDebit();

			$data = array(
	            'customers_id' => $temp['customers_id'],
	            'data_customer' => $data_customer,
	            'item_of_course' => $item_of_course,
				'transfer_course' => true,
				'referent_payment_transfer' => $request->get('referent_payment_transfer'),
				'old_buy_course_id' => $request->get('buy_course_id'),
	        );

	        $this->render_view('sale_course/form_sale_debit', $data, 'mng_course', 2);

		}else{
			dd($request->all());
		}

	}

	public function cancel_course($buy_course_id, $price){
		$price = str_replace(',', '', $price);
		$data = array(
			"status_course" => "cancel",
			"amount_price_cancel" => $price,
			"updated_at" => date("Y-m-d H:i:s"), //วันที่ทำการ ยกเลิก คอร์ส
		);
		\DB::table('buy_course')
            ->where('id', $buy_course_id)
            ->update($data);

		return redirect('history_payment/invoice/'.base64_encode($buy_course_id));
	}
}

?>
