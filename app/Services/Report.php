<?php
namespace App\Services;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class Report {
	public function get_report_for_month($month = '', $year = ''){
		return ItemOfCourse::get()->toArray();
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
