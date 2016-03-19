<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryPayment extends Model
{
	use SoftDeletes;
	protected $table = 'history_payment';

	protected $fillable = [
    	'buy_course_id',
		'payment_amount',
		'payment_type',
		'cash',
		'credit_debit_card',
		'bank_name',
		'TID',
		'MID',
		'comment',

    ];

    protected $casts = [
        'id' => 'string',
    ];

	protected $dates = ['deleted_at'];

	public function getTableName(){
		return $this->table;
	}
	public function save_history_payment_of_credit($buy_course_id, $data){
		$res = $this->set_fillable_credit($buy_course_id, $data);
		\DB::table($this->table)->insert($res);
		return 200;
	}
	public function set_fillable_credit($buy_course_id, $data){
		return [
			"buy_course_id" => $buy_course_id,
			"payment_amount" => $data['payment_amount'],
			"payment_type" => $data['payment_type'],
			"cash" => $data['cash'],
			"credit_debit_card" => $data['credit_debit_card'],
			"bank_name" => $data['bank_name'],
			"TID" => $data['TID'],
			"MID" => $data['MID'],
			"comment" => $data['comment_history_payment'],
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		];
	}
}

?>
