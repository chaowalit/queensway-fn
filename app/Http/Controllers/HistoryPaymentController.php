<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class HistoryPaymentController extends QwcController{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index($buy_course_id){
		$buy_course_id = base64_decode($buy_course_id);

		$BuyCourse = new BuyCourse;
		$buy_course = $BuyCourse->getDataSaleCourseById($buy_course_id);
		$data = array(
			'buy_course' => $buy_course,
		);

		$this->render_view('history_payment/form_payment', $data, 'use_course', 1, 3);
		//dd($buy_course);
	}

	public function save_history_payment(Request $request){
		$buy_course_id = $request->get('buy_course_id');
		dump($request->all());

		$BuyCourse = new BuyCourse;
		$buy_course = $BuyCourse->getDataBuyCourseById($buy_course_id);
		dd($buy_course);

	}
}

?>
