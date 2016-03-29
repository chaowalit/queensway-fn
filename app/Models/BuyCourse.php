<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\HistoryPayment;
use App\Models\ItemOfCourse;
use App\Models\Customers;

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

		return ['status' => 200, 'buy_course_id' => $buy_course_id, 'message' => 'ok'];
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
			"total_credit" => ($data['total_price'] * $data['multiplier_price']),//$data['total_credit'],
			"consultant" => $data['consultant'],
			"payment_amount_total" => ($data['cash'] + $data['credit_debit_card']), //$data['payment_amount'],
			"accrued_expenses" => $data['total_price'] - ($data['cash'] + $data['credit_debit_card']), //$data['accrued_expenses'],
			"limit_credit" => ($data['cash'] + $data['credit_debit_card']) * $data['multiplier_price'], // $data['limit_credit'],
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

		return ['status' => 200, 'buy_course_id' => $buy_course_id, 'message' => 'ok'];
	}
	public function set_data_fillable_form_sale_debit($data){
		$item_of_course = array();
		$total_price = 0;
		foreach($data['check_list'] as $k => $v){
			$temp['item_of_course_id'] = $v;

			$ItemOfCourse = new ItemOfCourse;
			$item = $ItemOfCourse->getDataItemOfCourseById($v);
			$temp['category_item_name'] = $item[0]->category_item_name;
			$temp['item_name'] = $item[0]->item_name;

			$temp['amount_total'] = $data['amount_'.$v];
			$temp['amount_usage'] = '0';
			$temp['price_per_unit'] = $data['price_per_unit_'.$v];
			$temp['total_per_item'] = ($data['amount_'.$v] * $data['price_per_unit_'.$v]);  //$data['total_per_item_'.$v];
			$total_price = $total_price + ($data['amount_'.$v] * $data['price_per_unit_'.$v]);
			array_push($item_of_course, $temp);
		}
		//dd($item_of_course);
		return [
			"customers_id" => $data['customers_id'],
			"type_course" => $data['type_course'],
			"order_number" => $data['number_no'].'-'.date("YmdHis"),
			"book_no" => $data['book_no'],
			"number_no" => $data['number_no'],
			"total_price" => $total_price, //$data['total_price'],
			"item_of_course" => serialize($item_of_course),
			"consultant" => $data['consultant'],
			"payment_amount_total" => ($data['cash'] + $data['credit_debit_card']),
			"accrued_expenses" => $data['total_price'] - ($data['cash'] + $data['credit_debit_card']),
			"status_course" => "active",
			"comment" => $data['comment_sale_debit'],
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		];
	}

	public function query_customer_buy_course($id){
		return \DB::table($this->table)->where('customers_id', $id)->where('deleted_at', NULL)->get();
		//ค้นหา ลูกค้า ว่ามีประวัติการซื้อคอร์สหรือไม่ เพื่อใช้ในการตรวจสอบ กรณีลบลูกค้า ถ้ามี ห้ามลบ
	}

	public function get_list_search_customers_use_course($keyword, $column_name){
		$Customers = new Customers;
		if(trim($keyword) != ''){
			return \DB::table($this->table)->select($Customers->getTableName().'.*')
										->join($Customers->getTableName(), $this->table.'.customers_id', '=', $Customers->getTableName().'.id')

										->where($Customers->getTableName().'.'.$column_name, 'like', '%'.$keyword.'%')
										->where($Customers->getTableName().'.deleted_at', NULL)
										->where($this->table.'.deleted_at', NULL)
										->groupBy($Customers->getTableName().'.id')
										->orderBy($this->table.'.updated_at', 'desc')
										->take(15)
							            ->get();
		}else{
			return \DB::table($this->table)->select($Customers->getTableName().'.*')
										->join($Customers->getTableName(), $this->table.'.customers_id', '=', $Customers->getTableName().'.id')
										->where($Customers->getTableName().'.deleted_at', NULL)
										->where($this->table.'.deleted_at', NULL)
										->groupBy($Customers->getTableName().'.id')
										->orderBy($this->table.'.updated_at', 'desc')
										->take(15)
							            ->get();
		}

	}

	public function show_all_course_for_customer($customer_id){
		return \DB::table($this->table)
					->select($this->table.'.*')->where('customers_id', $customer_id)
					->where('deleted_at', NULL)->orderBy($this->table.'.updated_at', 'desc')->get();
	}

	public function getDataBuyCourseById($buy_course_id){
		$course = \DB::table($this->table)
					->select($this->table.'.*')->where('id', $buy_course_id)->where('deleted_at', NULL)->get();
		return $course;
	}

	public function getDataSaleCourseById($buy_course_id){
		// (ส่ง buy_course_id ได้แค่ 1 คอร์สเท่านั้น) จะแสดงทั้งรายละเอียดคอร์สที่ซื้อ ลูกค้าคนไหนซื้อไป ประวัติการชำระเงิน
		$HistoryPayment = new HistoryPayment;
		$Customers = new Customers;

		$course = \DB::table($this->table)
					->select($this->table.'.*')->where('id', $buy_course_id)->where('deleted_at', NULL)->get();
		if(count($course) > 0){
			$course = (array)$course[0];

			$customer = $Customers->getDataCustomerById($course['customers_id']);
			if(count($customer) > 0){
				$course['data_customer'] = (array)$customer[0];
			}else{
				$course['data_customer'] = [];
			}

			$history_payment = $HistoryPayment->getDataHistoryPayment($course['id']);
			if(count($history_payment) > 0){
				foreach($history_payment as $index => $tmp_1){
					$course['history_payment'][$index] = (array)$tmp_1;
				}

			}else{
				$course['history_payment'] = [];
			}

			$course['usage_course'] = [];
			//dd($course);
			return $course;
		}else{
			return [];
		}


	}
}

?>
