<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\HistoryPayment;
use App\Models\ItemOfCourse;
use App\Models\Customers;
use App\Models\BuyCourse;

class UsageCourse extends Model
{
	use SoftDeletes;
	protected $table = 'usage_course';

	protected $fillable = [
    	'buy_course_id',
		'item_of_course_id',
		'referent_code',
		'category_item_name',
		'item_name',
		'amount',
		'price_per_unit',
		'total_per_item',

    ];

    protected $casts = [
        'id' => 'string',
    ];

	protected $dates = ['deleted_at'];

	public function getTableName(){
		return $this->table;
	}
	public function save_form_usage_course_by_credit($data, $total_cost, $data_course){
		//------------------------- save usage course table ------------------------//
		foreach($data['check_usage_course'] as $k => $v){
			$info = array(
				"buy_course_id" => $data['buy_course_id'],
				"item_of_course_id" => $v,
				"referent_code" => null,
				"category_item_name" => $data['category_item_name_'.$v],
				"item_name" => $data['item_name_'.$v],
				"amount" => $data['amount_'.$v],
				"price_per_unit" => $data['price_per_unit_'.$v],
				"total_per_item" => $data['total_per_item_'.$v],
				"created_at" => date("Y-m-d", strtotime($data['date_usage_course'])).' '.$data['time_usage_course'], //date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s"),
			);
			\DB::table($this->table)->insert($info);
		}
		//------------------------- update buy course table ------------------------//
		$info_buy_course = array(
			"usage_credit" => ($data_course[0]->usage_credit + $total_cost),
		);
		$BuyCourse = new BuyCourse;
		\DB::table($BuyCourse->getTableName())
            ->where('id', $data_course[0]->id)
            ->update($info_buy_course);

		return 200;
	}
	public function save_form_usage_course_by_debit($data, $data_course){
		//------------------------- save usage course table ------------------------//
		foreach($data['check_usage_course'] as $k => $v){
			$info = array(
				"buy_course_id" => $data['buy_course_id'],
				"item_of_course_id" => $v,
				"referent_code" => $data['referent_code_'.$v],
				"category_item_name" => $data['category_item_name_'.$v],
				"item_name" => $data['item_name_'.$v],
				"amount" => $data['amount_'.$v],
				"price_per_unit" => $data['price_per_unit_'.$v],
				"total_per_item" => $data['total_per_item_'.$v],
				"created_at" => date("Y-m-d", strtotime($data['date_usage_course'])).' '.$data['time_usage_course'], //date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s"),
			);
			\DB::table($this->table)->insert($info);
		}
		//------------------------- update buy course table ------------------------//
		$item_of_course = unserialize($data_course[0]->item_of_course);
		foreach($data['check_usage_course'] as $k => $v){
			foreach(unserialize($data_course[0]->item_of_course) as $key => $val){
				if($data['referent_code_'.$v] == $val['referent_code']){
					$item_of_course[$key]['amount_usage'] = $item_of_course[$key]['amount_usage'] + $data['amount_'.$v];
				}
			}
		}
		$info_buy_course = array(
			"item_of_course" => serialize($item_of_course),
		);
		$BuyCourse = new BuyCourse;
		\DB::table($BuyCourse->getTableName())
            ->where('id', $data_course[0]->id)
            ->update($info_buy_course);

		return 200;
	}
	public function getDataUsageCourseById($buy_course_id){
		return \DB::table($this->table)
					->select($this->table.'.*')->where('buy_course_id', $buy_course_id)->where('deleted_at', NULL)->get();
	}
}
?>
