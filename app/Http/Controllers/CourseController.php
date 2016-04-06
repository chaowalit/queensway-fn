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
		$buy_course_id = $request->input('buy_course_id', '');
		$BuyCourse = new BuyCourse;
		$res = $BuyCourse->delete_course($buy_course_id);
	}
}

?>
