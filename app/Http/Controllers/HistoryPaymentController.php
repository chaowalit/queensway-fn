<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;
use App\Models\HistoryPayment;

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

		$BuyCourse = new BuyCourse;
		$buy_course = $BuyCourse->getDataBuyCourseById($buy_course_id);

		if($buy_course[0]->accrued_expenses >= $request->get('payment_amount')){
			$HistoryPayment = new HistoryPayment;
			$res = $HistoryPayment->save_history_payment($request->all(), $buy_course);
			if($res == 200){
				return redirect('history_payment/invoice/'.base64_encode($buy_course[0]->id));
			}else{
				//error case
			}
		}else{
			echo "error";
		}

	}

	public function invoice($buy_course_id){
		$buy_course_id = base64_decode($buy_course_id);
		$BuyCourse = new BuyCourse;
		$result = $BuyCourse->getDataSaleCourseById($buy_course_id);
		$this->render_view('sale_course/invoice', $result, 'use_course', 1);
	}
}

?>
