<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\HistoryPayment;
use App\Models\ItemOfCourse;

class BuyCourse extends Model
{
	use SoftDeletes;
	protected $table = 'buy_course';

	protected $fillable = [
    	'customers_id',
		'type_course',
		'order_number',
		'book_no',
		'number_no',
		'total_price',
		'item_of_course',
		'multiplier_price',
		'total_credit',
		'consultant',
		'payment_amount_total',
		'accrued_expenses',
		'limit_credit',
		'usage_credit',
		'status_course',
		'comment',

    ];

    protected $casts = [
        'id' => 'string',
    ];

	protected $dates = ['deleted_at'];

	public function getTableName(){
		return $this->table;
	}
	public function save_form_sale_credit($data = array()){
		$res = $this->set_data_fillable_form_sale_credit($data);

		$buy_course_id = \DB::table($this->table)->insertGetId($res);

		$HistoryPayment = new HistoryPayment;
		$history_payment = $HistoryPayment->save_history_payment_of_credit($buy_course_id, $data);

		return 200;
	}
	public function set_data_fillable_form_sale_credit($data){
		return [
			"customers_id" => $data['customers_id'],
			"type_course" => $data['type_course'],
			"order_number" => $data['number_no'].'-'.date("YmdHis"),
			"book_no" => $data['book_no'],
			"number_no" => $data['number_no'],
			"total_price" => $data['total_price'],
			"multiplier_price" => $data['multiplier_price'],
			"total_credit" => $data['total_credit'],
			"consultant" => $data['consultant'],
			"payment_amount_total" => $data['payment_amount'],
			"accrued_expenses" => $data['accrued_expenses'],
			"limit_credit" => $data['limit_credit'],
			"status_course" => "active",
			"comment" => $data['comment_sale_credit'],
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		];
	}

	public function save_form_sale_debit($data = array()){
		$res = $this->set_data_fillable_form_sale_debit($data);

		$buy_course_id = \DB::table($this->table)->insertGetId($res);

		$HistoryPayment = new HistoryPayment;
		$history_payment = $HistoryPayment->save_history_payment_of_debit($buy_course_id, $data);

		return 200;
	}
	public function set_data_fillable_form_sale_debit($data){
		$item_of_course = array();
		foreach($data['check_list'] as $k => $v){
			$temp['item_of_course_id'] = $v;

			$ItemOfCourse = new ItemOfCourse;
			$item = $ItemOfCourse->getDataItemOfCourseById($v);
			$temp['category_item_name'] = $item[0]->category_item_name;
			$temp['item_name'] = $item[0]->item_name;

			$temp['amount_total'] = $data['amount_'.$v];
			$temp['amount_usage'] = '0';
			$temp['price_per_unit'] = $data['price_per_unit_'.$v];
			$temp['total_per_item'] = $data['total_per_item_'.$v];

			array_push($item_of_course, $temp);
		}
		//dd($item_of_course);
		return [
			"customers_id" => $data['customers_id'],
			"type_course" => $data['type_course'],
			"order_number" => $data['number_no'].'-'.date("YmdHis"),
			"book_no" => $data['book_no'],
			"number_no" => $data['number_no'],
			"total_price" => $data['total_price'],
			"item_of_course" => serialize($item_of_course),
			"consultant" => $data['consultant'],
			"payment_amount_total" => $data['payment_amount'],
			"accrued_expenses" => $data['accrued_expenses'],
			"status_course" => "active",
			"comment" => $data['comment_sale_debit'],
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		];
	}
}

?>
