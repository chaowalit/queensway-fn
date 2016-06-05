<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;
use App\Models\UsageCourse;
use App\User;

class CustomerController extends QwcController{
	public function __construct()
    {
        //$this->middleware('auth');
		//$password_api = a93490dea95f1bf527827bdc047e8a3f11371081
		//getPasswordApiV1()
    }

	public function list_customer(Request $request){
		$keyword = $request->get('keyword', '----');
		$BuyCourse = new BuyCourse;
		$customers = $BuyCourse->list_search_customers_for_admin($keyword);
		//dd($customers);
		if(count($customers) > 0){
			$data_qwc = \DB::table('users')
	                    ->select('users.*')->where('id', 1)->where('deleted_at', NULL)->get();
			$data['data_branch'] = (array)$data_qwc[0];

			foreach($customers as $val){
				$temp[] = (array)$val;
			}
			$data['customer'] = $temp;
			return $this->render_json(200, 'OK', $data, 1, 1);
		}else{
			return $this->render_json(404, 'Not found Data Customer', [], 0, 0);
		}
	}

	public function search_customer(Request $request){
		$keyword = $request->get('keyword', null);
		$BuyCourse = new BuyCourse;
        $customers = $BuyCourse->get_search_customers_for_admin($keyword, 'id');
		if(count($customers) > 0){
			$data_qwc = \DB::table('users')
	                    ->select('users.*')->where('id', 1)->where('deleted_at', NULL)->get();
			$data['data_branch'] = (array)$data_qwc[0];

			$data['customer'] = (array)$customers[0];

			$course_all = $BuyCourse->show_all_course_for_customer($customers[0]->id);
			$temp_course = array();
			foreach($course_all as $val){
				$temp_course[] = (array)$val;
			}
			$data['all_course'] = $temp_course;

			return $this->render_json(200, 'OK', $data, 1, 1);
		}else{
			return $this->render_json(404, 'Not found Data Customer', [], 0, 0);
		}
		//dd($customers);
	}
}
?>
