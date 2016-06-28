<?php
namespace App\Services;
use App\Models\Customers;
use App\Models\CategoryItem;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class Report {
	public function get_report_for_month_by_debit($month_report, $year_report){
		$time_start = $year_report.'-'.$month_report.'-01 '.'00:00:00';
		$a_date = $year_report.'-'.$month_report.'-01';
		$time_end = date("Y-m-t", strtotime($a_date)).' 23:59:59';

		$arr_report = array();
		$arr_category = array();

		$BuyCourse = new BuyCourse;
		$result = \DB::table($BuyCourse->getTableName())
                    ->whereBetween('created_at', [$time_start, $time_end])
					->where('type_course', 'debit')
					->where('deleted_at', NULL)
					->get();
		//dump($result);
		//dump(unserialize($result[1]->item_of_course));
		foreach($result as $key => $val){
			$temp_1 = unserialize($val->item_of_course);
			foreach($temp_1 as $ctg_1){
				if(!isset($arr_category[$ctg_1['category_item_name']])){
					$arr_category[$ctg_1['category_item_name']] = array();
				}
			}
		}
		foreach($result as $key => $val){
			$temp_1 = unserialize($val->item_of_course);
			foreach($temp_1 as $ctg_1){
				if(array_search($ctg_1['item_name'], $arr_category[$ctg_1['category_item_name']]) === false){
					$temp_val = $arr_category[$ctg_1['category_item_name']];
					$temp_val[] = $ctg_1['item_name'];
					$arr_category[$ctg_1['category_item_name']] = $temp_val;
				}
			}
		}
		$array_data = array();
		$count = 0;
		foreach($arr_category as $key => $val){
			$array_data[] = '';
			$array_data[] = $key;
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$arr_report[] = $array_data;
			$array_data = array();
			foreach ($val as $k => $v) {
				$name = $v;
				$mpl = 0;
				$unit = "ครั้ง";
				$corse_1 = 0;
				$corse_2 = 0;
				$corse_3 = 0;
				$corse_4 = 0;
				$corse_5 = 0;
				$corse_6 = 0;
				foreach($result as $s_key => $s_val){
					$temp_1 = unserialize($s_val->item_of_course);
					foreach($temp_1 as $ctg_1){
						if($v == $ctg_1['item_name']){
							$corse_1 = $corse_1 + $ctg_1['amount_total'];
							$corse_2 = $corse_2 + $ctg_1['amount_usage'];
							$corse_3 = $corse_3 + ($ctg_1['amount_total'] - $ctg_1['amount_usage']);

							$corse_4 = $corse_4 + $ctg_1['total_per_item'];
							$corse_5 = $corse_5 + ($ctg_1['amount_usage'] * $ctg_1['price_per_unit']);
							$corse_6 = $corse_6 + ($ctg_1['total_per_item'] - ($ctg_1['amount_usage'] * $ctg_1['price_per_unit']));

							if($mpl == 0){
								$ItemOfCourse = new ItemOfCourse;
								$item_ = \DB::table($ItemOfCourse->getTableName())
											->where('id', $ctg_1['item_of_course_id'])
											->get();
								$mpl = $item_[0]->price;
							}
						}
					}
				}

				$array_data[] = ++$count;
				$array_data[] = $name;
				$array_data[] = $mpl;
				$array_data[] = $unit;
				$array_data[] = $corse_1;
				$array_data[] = $corse_2;
				$array_data[] = $corse_3;
				$array_data[] = $corse_4;
				$array_data[] = $corse_5;
				$array_data[] = $corse_6;
				$arr_report[] = $array_data;
				$array_data = array();
			}
		}
		//dump($arr_report);
		//dd($arr_category);

		// $CategoryItem = new CategoryItem;
		// $category = \DB::table($CategoryItem->getTableName())
		// 				->where('deleted_at', NULL)
		// 				->get();
		// foreach($category as $ctg){
		// 	$ItemOfCourse = new ItemOfCourse;
		// 	$item_ = \DB::table($ItemOfCourse->getTableName())
		// 				->where('category_item_id', $ctg->id)
		// 				->where('deleted_at', NULL)
		// 				->get();
		//
		// }

		return $arr_report;
	}

	public function get_month_report(array $ban) {
		$url = \Config::get('call_api.url') . 'overview/get_summary_usage';
		$param = [
			'limit' => '6',
			'offset' => '0',
			'order_by' => 'ban',
			'sort_by' => 'desc',
			'ban' => $ban,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function get_out_of_package(array $ban, $order_by, $bill_cyc_month, $bill_cyc_year) {
		$url = \Config::get('call_api.url') . 'overview/get_out_of_package';
		$param = [
			'limit' => '10',
			'offset' => '0',
			'order_by' => $order_by,
			'sort_by' => 'desc',
			'ban' => $ban,
			'month' => $bill_cyc_month,
			'year' => $bill_cyc_year,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		// dump($param);
		return $arr;
	}
	public function get_out_of_package_with_all_account($ban = array(), $bill_cyc_month, $bill_cyc_year, $order_by, $sort_by, $offset, $limit) {
		$url = \Config::get('call_api.url') . 'overview/get_out_of_package';
		$param = [
			'limit' => $limit,
			'offset' => $offset,
			'order_by' => $order_by,
			'sort_by' => $sort_by,
			'ban' => $ban,
			'month' => $bill_cyc_month,
			'year' => $bill_cyc_year,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		// dump($arr, $param);
		return $arr;
	}
	public function getReport($ban) {
		$url = \Config::get('call_api.url') . 'overview/get_summary_usage';
		$param = [
			'limit' => '6',
			'offset' => '0',
			'order_by' => 'ban',
			'ban' => array($ban),
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function get_sub_top_spending($year = 2015, $month = 10, $ban = array(22363646), $order_by = 'eb_total_bht', $sort_by = 'desc') {
		$url = \Config::get('call_api.url') . 'overview/get_sub_top_spending';
		$param = [
			'limit' => '10',
			'offset' => '0',
			'order_by' => $order_by,
			'sort_by' => $sort_by,
			'year' => $year,
			'month' => $month,
			'ban' => $ban,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}

	public function checkStatusCD($tax_id = '') {
		$url = \Config::get('call_api.url') . 'status_cd';
		$param = [
			'business_id' => trim($tax_id),
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function check_subscribe_report($ban = '', $email = '') {
		$url = \Config::get('call_api.url') . 'report/check_subscribe_report';
		$param = [
			'ban' => $ban,
			'email' => $email,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function create_order_cancel_cd($business_id, $company_name) {
		$url = \Config::get('call_api.url') . 'dwh/create_order';
		$param = [
			'business_id' => $business_id,
			'name' => $company_name,
			'type' => 'C',
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function request_cdr_by_business_id($email = '', $tax_id = '', $year, $month) {
		$url = \Config::get('call_api.url') . 'report/request_cdr_by_business_id';
		$param = [
			'business_id' => $tax_id,
			'email' => $email,
			'month' => $month,
			'year' => $year,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function request_cdr_by_ban($email = '', $ban_no = array(), $year, $month) {
		$url = \Config::get('call_api.url') . 'report/request_cdr_by_ban';
		$param = [
			'email' => $email,
			'ban' => $ban_no,
			'month' => $month,
			'year' => $year,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function request_cdr_by_sub($email = '', $phone_no = array(), $year, $month) {
		$url = \Config::get('call_api.url') . 'report/request_cdr_by_sub';
		$param = [
			'email' => $email,
			'subscribe' => $phone_no,
			'month' => $month,
			'year' => $year,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function list_month_report_by_ban($ban = array(), $type) {
		$url = \Config::get('call_api.url') . 'check_report/list_month_report';
		$param = [
			'ban' => $ban,
			'type' => $type,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
	public function list_month_report_by_sub($phone_no = array(), $type) {
		$url = \Config::get('call_api.url') . 'check_report/list_month_report';
		$param = [
			'service_number' => $phone_no,
			'type' => $type,
		];
		$res = curlPost($url, $param);
		$arr = json_decode($res, true);
		return $arr;
	}
}
