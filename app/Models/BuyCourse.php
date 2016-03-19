<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\HistoryPayment;

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
}

?>
