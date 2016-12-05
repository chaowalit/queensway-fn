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

class ReportAdminController extends QwcController{
	public function __construct()
    {
        //$this->middleware('auth');
		//$password_api = a93490dea95f1bf527827bdc047e8a3f11371081
		//getPasswordApiV1()
		ini_set('max_execution_time', 300); //timeout 5 minutes
    }

    public function req_report_for_month_by_credit(Request $request){
    	try {
    		$month_report = $request->get('month_report', '05');
			$year_report = $request->get('year_report', '2016');
	    	//------------------------------------------- header column --------------------------------------//
			// $data = array(
			//     array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', '', '', '', ''),
			// 	array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ยอดวงเงิน', 'ใช้ไป', 'วงเงินใช้ไป', 'คงเหลือ', 'วงเงินคงเหลือ')
			// );
			//-------------------------------------------------------------------------------------------------
			$res = app()->make("App\Services\Report")->get_report_for_month_by_credit($month_report, $year_report);
			$data_total = $res; //array_merge($data, $res);

			//dd($data_total);
			return $this->render_json(200, 'OK', $data_total, count($data_total), count($data_total));
    	} catch (Exception $e) {
    		return $this->render_json(400, 'error', [], 0, 0);
    	}

    	
    }

    public function req_report_for_month_by_debit(Request $request){
    	try {
    		$month_report = $request->get('month_report', '05');
			$year_report = $request->get('year_report', '2016');
	    	//------------------------------------------- header column --------------------------------------//
			// $data = array(
			//     array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', ''),
			// 	array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ')
			// );
			//-------------------------------------------------------------------------------------------------
			$res = app()->make("App\Services\Report")->get_report_for_month_by_debit($month_report, $year_report);
			$data_total = $res; //array_merge($data, $res);
			//-------------------------------------------------------------------------------------------------
			
			//dd($data_total);
			return $this->render_json(200, 'OK', $data_total, count($data_total), count($data_total));
    	} catch (Exception $e) {
    		return $this->render_json(400, 'error', [], 0, 0);
    	}

    	
    }

    public function req_report_for_year_by_credit(Request $request){
    	try {
    		$year_report = $request->get('year_report', '2016');
	    	//------------------------------------------- header column --------------------------------------//
			// $data = array(
			//     array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', '', '', '', ''),
			// 	array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ยอดวงเงิน', 'ใช้ไป', 'วงเงินใช้ไป', 'คงเหลือ', 'วงเงินคงเหลือ')
			// );
			//-------------------------------------------------------------------------------------------------
			$res = app()->make("App\Services\Report")->get_report_for_month_by_credit('', $year_report);
			$data_total = $res; //array_merge($data, $res);

			//dd($data_total);
			return $this->render_json(200, 'OK', $data_total, count($data_total), count($data_total));
    	} catch (Exception $e) {
    		return $this->render_json(400, 'error', [], 0, 0);
    	}
    	
    }

    public function req_report_for_year_by_debit(Request $request){
    	try {
    		$year_report = $request->get('year_report', '2016');
	    	//------------------------------------------- header column --------------------------------------//
			// $data = array(
			//     array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', ''),
			// 	array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ')
			// );
			//-------------------------------------------------------------------------------------------------
			$res = app()->make("App\Services\Report")->get_report_for_month_by_debit('', $year_report);
			$data_total = $res; //array_merge($data, $res);
			//-------------------------------------------------------------------------------------------------
			
			//dd($data_total);
			return $this->render_json(200, 'OK', $data_total, count($data_total), count($data_total));
    	} catch (Exception $e) {
    		return $this->render_json(400, 'error', [], 0, 0);
    	}
    	
    }
}