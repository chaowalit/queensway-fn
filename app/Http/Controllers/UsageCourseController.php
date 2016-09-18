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
		$BuyCourse = new BuyCourse;
		$data_course = $BuyCourse->getDataBuyCourseById($request->get('buy_course_id'));
		//dump($data_course);
		//dump(unserialize($data_course[0]->item_of_course));
		if($request->get('type_course') == "credit"){

			$total_cost = 0;
			foreach($request->get('check_usage_course') as $key => $val){
				$total_cost = $total_cost + $request->get('total_per_item_'.$val);
			}

			//dump($total_cost);
			if($total_cost <= ($data_course[0]->limit_credit - $data_course[0]->usage_credit)){
				$res = $UsageCourse->save_form_usage_course_by_credit($request->all(), $total_cost, $data_course);
				if($res == 200){
					return redirect('history_payment/invoice/'.base64_encode($data_course[0]->id));
				}else{
					echo "Error save_form_usage_course_by_credit";
					exit;
				}
			}else{
				echo "<center>เกิดข้อผิดพลาดในการตัดคอร์สแบบวงเงิน เนื่องจากคุณได้สั่งซื้อคอร์สเกินราคาที่จ่ายจริง</center>";
				echo "<center>ระบบจะทำการย้อนกลับหน้าก่อนหน้านี้ ภายใน 5 วินาที  หรือ กด <a href='".\URL::to('usage_course/form_usage_course').'/'.base64_encode($request->get('buy_course_id'))."'>ย้อนกลับ</a></center>";
				header( "refresh:5;url=" . \URL::to('usage_course/form_usage_course').'/'.base64_encode($request->get('buy_course_id')));
				exit;
			}


		}else if($request->get('type_course') == "debit"){
			$total_cost = 0;
			foreach($request->get('check_usage_course') as $key => $val){
				$total_cost = $total_cost + $request->get('total_per_item_'.$val);
			}
			//dump($total_cost);
			$total_use = 0;
			foreach(unserialize($data_course[0]->item_of_course) as $key => $val){
				$total_use = $total_use + ($val['amount_usage'] * $val['price_per_unit']);
			}
			//dump($total_use);
			if($total_cost <= ($data_course[0]->payment_amount_total - $total_use)){
				$res = $UsageCourse->save_form_usage_course_by_debit($request->all(), $data_course);
				if($res == 200){
					return redirect('history_payment/invoice/'.base64_encode($data_course[0]->id));
				}else{
					echo "Error save_form_usage_course_by_debit";
					exit;
				}
			}else{
				echo "<center>เกิดข้อผิดพลาดในการตัดคอร์สแบบรายคอร์ส เนื่องจากคุณได้สั่งซื้อคอร์สเกินราคาที่จ่ายจริง</center>";
				echo "<center>ระบบจะทำการย้อนกลับหน้าก่อนหน้านี้ ภายใน 5 วินาที  หรือ กด <a href='".\URL::to('usage_course/form_usage_course').'/'.base64_encode($request->get('buy_course_id'))."'>ย้อนกลับ</a></center>";
				header( "refresh:5;url=" . \URL::to('usage_course/form_usage_course').'/'.base64_encode($request->get('buy_course_id')));
				exit;
			}

		}else{
			echo "error";
		}

		//dd($request->all());
	}
}

?>
