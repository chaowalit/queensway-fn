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
			$data = array();

			$this->render_view('course/search_customer_use_course', $data, 'use_course', 1);
		}else if($sub_menu == 2){

		}else if($sub_menu == 3){

		}else{
			echo "Error";
		}

	}
}

?>
