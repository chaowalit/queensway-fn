<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BuyCourse;

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
			"book_no" => $data['book_no'],
			"number_no" => $data['number_no'],
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

	public function save_history_payment_of_debit($buy_course_id, $data){
		$res = $this->set_fillable_debit($buy_course_id, $data);
		\DB::table($this->table)->insert($res);
		return 200;
	}
	public function set_fillable_debit($buy_course_id, $data){
		return [
			"buy_course_id" => $buy_course_id,
			"book_no" => $data['book_no'],
			"number_no" => $data['number_no'],
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
	public function getDataHistoryPayment($buy_course_id){
		return \DB::table($this->table)->where('deleted_at', NULL)->where('buy_course_id', $buy_course_id)
					->orderBy('created_at', 'desc')->get();
	}

	public function save_history_payment($data, $buy_course){
		//dump($data);
		//----------- save history payment -------------------------------//
		$res = $this->set_fillable_credit($buy_course[0]->id, $data);
		\DB::table($this->table)->insert($res);
		//----------- ตัดยอดค้างชำระจากคอร์สที่ซื้อมา ---------------------------//
		if($buy_course[0]->type_course == 'credit'){
			$update = array();
			$update['payment_amount_total'] = ($buy_course[0]->payment_amount_total + $data['payment_amount']);
			$update['accrued_expenses'] = ($buy_course[0]->accrued_expenses - $data['payment_amount']);
			$update['limit_credit'] = $buy_course[0]->limit_credit + ($buy_course[0]->multiplier_price * $data['payment_amount']);

			$BuyCourse = new BuyCourse;
			$update_course_buy = $BuyCourse->update_course_accrued_expenses($update, $buy_course[0]->id);
			if($update_course_buy == 200){
				return 200;
			}else{
				//error
			}
		}else if($buy_course[0]->type_course == 'debit'){
			$update = array();
			$update['payment_amount_total'] = ($buy_course[0]->payment_amount_total + $data['payment_amount']);
			$update['accrued_expenses'] = ($buy_course[0]->accrued_expenses - $data['payment_amount']);

			$BuyCourse = new BuyCourse;
			$update_course_buy = $BuyCourse->update_course_accrued_expenses($update, $buy_course[0]->id);
			if($update_course_buy == 200){
				return 200;
			}else{
				//error
			}
		}
		//dd($buy_course);
	}
}

?>
