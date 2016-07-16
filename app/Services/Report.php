<?php
namespace App\Services;
use App\Models\Customers;
use App\Models\CategoryItem;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;
use App\Models\UsageCourse;

class Report {

	public function get_report_for_month_by_debit($month_report, $year_report){
		if($month_report != ''){
			$time_start = $year_report.'-'.$month_report.'-01 '.'00:00:00';
			$a_date = $year_report.'-'.$month_report.'-01';
			$time_end = date("Y-m-t", strtotime($a_date)).' 23:59:59';
		}else if($month_report == ''){
			$time_start = $year_report. '-01-01 '.'00:00:00';
			$time_end = $year_report. '-12-31 '.'23:59:59';
		}else{
			exit;
		}

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

	public function get_report_for_month_by_credit($month_report, $year_report){
		if($month_report != ''){
			$time_start = $year_report.'-'.$month_report.'-01 '.'00:00:00';
			$a_date = $year_report.'-'.$month_report.'-01';
			$time_end = date("Y-m-t", strtotime($a_date)).' 23:59:59';
		}else if($month_report == ''){
			$time_start = $year_report. '-01-01 '.'00:00:00';
			$time_end = $year_report. '-12-31 '.'23:59:59';
		}else{
			exit;
		}

		$arr_report = array();
		$arr_category = array();

		$BuyCourse = new BuyCourse;
		$result = \DB::table($BuyCourse->getTableName())
                    ->whereBetween('created_at', [$time_start, $time_end])
					->where('type_course', 'credit')
					->where('deleted_at', NULL)
					->get();

		foreach($result as $key => $val){
			$UsageCourse = new UsageCourse;
			$usage_course = \DB::table($UsageCourse->getTableName())
							->where('buy_course_id', $val->id)
							->where('deleted_at', NULL)
							->get();
			foreach($usage_course as $k => $v){
				if(!isset($arr_category[$v->category_item_name])){
					$arr_category[$v->category_item_name] = array();
				}

				if(array_search($v->item_name, $arr_category[$v->category_item_name]) === false){
					$temp_val = $arr_category[$v->category_item_name];
					$temp_val[] = $v->item_name;
					$arr_category[$v->category_item_name] = $temp_val;
				}
			}
		}

		$array_data = array();
		$count = 0;
		$total_price = 0;
		$total_credit = 0;
		$total_use = 0;
		$usage_credit = 0;
		$balance = 0;
		$balance_credit = 0;

		foreach($result as $key => $val){
			$total_price = $total_price + $val->total_price;
			$total_credit = $total_credit + $val->total_credit;
			if($val->usage_credit > 0){
				$total_use = $total_use + ($val->usage_credit / $val->multiplier_price);
			}
			$usage_credit = $usage_credit + $val->usage_credit;
			$balance = $balance + ($val->total_price - ($val->usage_credit / $val->multiplier_price));
			$balance_credit = $balance_credit + ($val->total_credit - $val->usage_credit);
			
		}

		$corse_2_total = 0;
		foreach($arr_category as $key_ctg => $val_ctg){
			$array_data[] = '';
			$array_data[] = $key_ctg;
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
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

			foreach($val_ctg as $k => $v){
				$name = $v;
				$mpl = 0;
				$unit = "ครั้ง";
				$corse_1 = 0;
				$corse_2 = 0;
				$corse_3 = 0;
				$corse_4 = 0;
				$corse_5 = 0;
				$corse_6 = 0;
				$corse_7 = 0;
				$corse_8 = 0;
				$corse_9 = 0;

				foreach($result as $key => $val){
					$UsageCourse = new UsageCourse;
					$usage_course = \DB::table($UsageCourse->getTableName())
									->where('buy_course_id', $val->id)
									->where('deleted_at', NULL)
									->get();
					foreach($usage_course as $k_use => $v_use){
						if($v == $v_use->item_name){
							$corse_2 = $corse_2 + $v_use->amount;
							$corse_6 = $corse_6 + ($v_use->total_per_item / $val->multiplier_price);
							$corse_7 = $corse_7 + $v_use->total_per_item;

							if($mpl == 0){
								$ItemOfCourse = new ItemOfCourse;
								$item_ = \DB::table($ItemOfCourse->getTableName())
											->where('id', $v_use->item_of_course_id)
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
				$array_data[] = $corse_7;
				$array_data[] = $corse_8;
				$array_data[] = $corse_9;
				$arr_report[] = $array_data;
				$array_data = array();

				$corse_2_total = $corse_2_total + $corse_2;
			}
		}

		$temp_total_1 = array(
				array('', 'วงเงินคงเหลือ ณ ต้นงวด', '', '', '', '', '', $total_price, $total_credit, '', '', $balance, $balance_credit)
			);
		$data_total_temp_1 = array_merge($temp_total_1, $arr_report);

		$balance_final = ($total_price - $total_use);
		$balance_credit_final = ($total_credit - $usage_credit);
		$temp_total_2 = array(
				array('', 'วงเงินคงเหลือ ณ สิ้นงวด', '', '', '', $corse_2_total, '', $total_price, $total_credit, $total_use, $usage_credit, $balance_final, $balance_credit_final)
			);

		$data_total_temp_2 = array_merge($data_total_temp_1, $temp_total_2);
		//dd($data_total_temp_2);
		//dd($result);

		return $data_total_temp_2;
	}

	public function get_report_for_person_all_by_credit($customer_id, $date_range, $course_id){
		$arr_report = array();
		$arr_category = array();
		if($date_range){
			$temp = explode(' - ', $date_range);
			$start_date = date("Y-m-d", strtotime($temp[0]))." 00:00:00";
			$end_date = date("Y-m-d", strtotime($temp[1]))." 23:59:59";

			$BuyCourse = new BuyCourse;
			if($course_id){
				$result = \DB::table($BuyCourse->getTableName())
	                    ->whereBetween('created_at', [$start_date, $end_date])
	                    ->where('id', $course_id)
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'credit')
						->where('deleted_at', NULL)
						->get();
			}else{
				$result = \DB::table($BuyCourse->getTableName())
	                    ->whereBetween('created_at', [$start_date, $end_date])
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'credit')
						->where('deleted_at', NULL)
						->get();
			}
			
		}else{
			$BuyCourse = new BuyCourse;
			if($course_id){
				$result = \DB::table($BuyCourse->getTableName())
						->where('id', $course_id)
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'credit')
						->where('deleted_at', NULL)
						->get();
			}else{
				$result = \DB::table($BuyCourse->getTableName())
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'credit')
						->where('deleted_at', NULL)
						->get();
			}
			
		}
		
		foreach($result as $key => $val){
			$UsageCourse = new UsageCourse;
			$usage_course = \DB::table($UsageCourse->getTableName())
							->where('buy_course_id', $val->id)
							->where('deleted_at', NULL)
							->get();
			foreach($usage_course as $k => $v){
				if(!isset($arr_category[$v->category_item_name])){
					$arr_category[$v->category_item_name] = array();
				}

				if(array_search($v->item_name, $arr_category[$v->category_item_name]) === false){
					$temp_val = $arr_category[$v->category_item_name];
					$temp_val[] = $v->item_name;
					$arr_category[$v->category_item_name] = $temp_val;
				}
			}
		}
		//dd($arr_category);
		$array_data = array();
		$count = 0;
		$total_price = 0;
		$total_credit = 0;
		$total_use = 0;
		$usage_credit = 0;
		$balance = 0;
		$balance_credit = 0;

		foreach($result as $key => $val){
			$total_price = $total_price + $val->total_price;
			$total_credit = $total_credit + $val->total_credit;
			if($val->usage_credit > 0){
				$total_use = $total_use + ($val->usage_credit / $val->multiplier_price);
			}
			$usage_credit = $usage_credit + $val->usage_credit;
			$balance = $balance + ($val->total_price - ($val->usage_credit / $val->multiplier_price));
			$balance_credit = $balance_credit + ($val->total_credit - $val->usage_credit);
			
		}

		$corse_6_total = 0;
		foreach($arr_category as $key_ctg => $val_ctg){
			$array_data[] = '';
			$array_data[] = $key_ctg;
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
			$array_data[] = '';
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

			foreach($val_ctg as $k => $v){
				$name = $v;
				$mpl = 0;
				$unit = "ครั้ง";
				$corse_1 = 0;
				$corse_2 = 0;
				$corse_3 = 0;
				$corse_4 = 0;
				$corse_5 = 0;
				$corse_6 = 0;
				$corse_7 = 0;
				$corse_8 = 0;
				$corse_9 = 0;
				$corse_10 = 0;
				$corse_11 = 0;
				$corse_12 = 0;
				$corse_13 = 0;

				foreach($result as $key => $val){
					$UsageCourse = new UsageCourse;
					$usage_course = \DB::table($UsageCourse->getTableName())
									->where('buy_course_id', $val->id)
									->where('deleted_at', NULL)
									->get();
					foreach($usage_course as $k_use => $v_use){
						if($v == $v_use->item_name){
							$corse_6 = $corse_6 + $v_use->amount;
							$corse_7 = $corse_7 + ($v_use->total_per_item / $val->multiplier_price);
							$corse_8 = $corse_8 + $v_use->total_per_item;

							if($mpl == 0){
								$ItemOfCourse = new ItemOfCourse;
								$item_ = \DB::table($ItemOfCourse->getTableName())
											->where('id', $v_use->item_of_course_id)
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
				$array_data[] = $corse_7;
				$array_data[] = $corse_8;
				$array_data[] = $corse_9;
				$array_data[] = $corse_10;
				$array_data[] = $corse_11;
				$array_data[] = $corse_12;
				$array_data[] = $corse_13;
				$arr_report[] = $array_data;
				$array_data = array();

				$corse_6_total = $corse_6_total + $corse_6;
			}
		}

		$temp_total_1 = array(
				array('', 'วงเงินคงเหลือ ณ ต้นงวด', '', '', '', $total_price, $total_credit, '', '', '', '', '', '', '', '', $balance, $balance_credit)
			);
		$data_total_temp_1 = array_merge($temp_total_1, $arr_report);
		//dd($data_total_temp_1);
		$balance_final = ($total_price - $total_use);
		$balance_credit_final = ($total_credit - $usage_credit);
		$temp_total_2 = array(
				array('', 'วงเงินคงเหลือ ณ สิ้นงวด', '', '', '', $total_price, $total_credit, '', '', $corse_6_total, $total_use, $usage_credit, '', '', '', $balance_final, $balance_credit_final)
			);

		$data_total_temp_2 = array_merge($data_total_temp_1, $temp_total_2);
		//dd($data_total_temp_2);
		//dd($result);

		return $data_total_temp_2;
	}

	public function get_report_for_person_all_by_debit($customer_id, $date_range, $course_id){
		$arr_report = array();
		$arr_category = array();
		if($date_range){
			$temp = explode(' - ', $date_range);
			$start_date = date("Y-m-d", strtotime($temp[0]))." 00:00:00";
			$end_date = date("Y-m-d", strtotime($temp[1]))." 23:59:59";

			$BuyCourse = new BuyCourse;
			if($course_id){
				$result = \DB::table($BuyCourse->getTableName())
	                    ->whereBetween('created_at', [$start_date, $end_date])
	                    ->where('id', $course_id)
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'debit')
						->where('deleted_at', NULL)
						->get();
			}else{
				$result = \DB::table($BuyCourse->getTableName())
	                    ->whereBetween('created_at', [$start_date, $end_date])
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'debit')
						->where('deleted_at', NULL)
						->get();
			}
			
		}else{
			$BuyCourse = new BuyCourse;
			if($course_id){
				$result = \DB::table($BuyCourse->getTableName())
						->where('id', $course_id)
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'debit')
						->where('deleted_at', NULL)
						->get();
			}else{
				$result = \DB::table($BuyCourse->getTableName())
	                    ->where('customers_id', $customer_id)
						->where('type_course', 'debit')
						->where('deleted_at', NULL)
						->get();
			}
			
		}

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
				$corse_7 = 0;
				$corse_8 = 0;
				$corse_9 = 0;
				$corse_10 = 0;
				$corse_11 = 0;
				$corse_12 = 0;
				foreach($result as $s_key => $s_val){
					$temp_1 = unserialize($s_val->item_of_course);
					foreach($temp_1 as $ctg_1){
						if($v == $ctg_1['item_name']){
							$corse_2 = $corse_2 + $ctg_1['amount_total'];
							$corse_3 = $corse_3 + $ctg_1['total_per_item'];
							$corse_6 = $corse_6 + $ctg_1['amount_usage'];
							$corse_7 = $corse_7 + ($ctg_1['amount_usage'] * $ctg_1['price_per_unit']);
							$corse_11 = $corse_11 + ($ctg_1['amount_total'] - $ctg_1['amount_usage']);
							$corse_12 = $corse_12 + ($ctg_1['total_per_item'] - ($ctg_1['amount_usage'] * $ctg_1['price_per_unit']));

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
				$array_data[] = $corse_7;
				$array_data[] = $corse_8;
				$array_data[] = $corse_9;
				$array_data[] = $corse_10;
				$array_data[] = $corse_11;
				$array_data[] = $corse_12;
				$arr_report[] = $array_data;
				$array_data = array();
			}
		}

		//dd($arr_report);
		return $arr_report;
	}

}
