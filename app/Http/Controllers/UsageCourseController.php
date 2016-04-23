<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;
use App\Models\UsageCourse;

class UsageCourseController extends QwcController{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function form_usage_course($buy_course_id){
		$BuyCourse = new BuyCourse;
		$res = $BuyCourse->getDataSaleCourseById(base64_decode($buy_course_id));
		$ItemOfCourse = new ItemOfCourse;
		$item_of_course = $ItemOfCourse->getItemOfCourse();
		if(count($res) > 0){

			$data = array(
				"course" => $res,
				"item_of_course" => $item_of_course,
			);
			$this->render_view('usage_course/form_usage_course', $data, 'use_course', 1, 4);
		}else{
			echo "error";
		}
	}
	public function save_form_usage_course(Request $request){

		$UsageCourse = new UsageCourse;
		if($request->get('type_course') == "credit"){
			$BuyCourse = new BuyCourse;
			$data_course = $BuyCourse->getDataBuyCourseById($request->get('buy_course_id'));
			dump($data_course);
			$res = $UsageCourse->save_form_usage_course_by_credit($request->all());

		}else if($request->get('type_course') == "debit"){

		}else{
			echo "error";
		}

		dd($request->all());
	}
}

?>
