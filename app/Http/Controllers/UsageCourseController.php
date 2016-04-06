<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class UsageCourseController extends QwcController{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function form_usage_course($buy_course_id){
		$BuyCourse = new BuyCourse;
		$res = $BuyCourse->getDataSaleCourseById(base64_decode($buy_course_id));
		if(count($res) > 0){

			$data = array(

			);
			$this->render_view('usage_course/form_usage_course', $data, 'use_course', 1, 4);
		}else{
			echo "error";
		}
	}
}

?>
