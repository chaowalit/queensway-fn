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
	public function save_form_usage_course_by_credit($data){

		foreach($data['check_usage_course'] as $k => $v){
			$info = array(

			);
		}
	}
}
?>
