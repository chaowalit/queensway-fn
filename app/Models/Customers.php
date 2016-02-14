<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
    	'customer_number',
        'prefix',
        'full_name',
        'thai_id',
        'address',
        'nickname',
        'tel',
        'email',
        'birthday',
        'intolerance_history',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected $dates = ['deleted_at'];

    public function count_customers(){

        return \DB::table($this->table)->count();
    }

    public function get_list_customers($offset, $limit){
        return \DB::table($this->table)->where('deleted_at', NULL)->orderBy('updated_at', 'desc')->skip($offset)->take($limit)->get();
    }

    public function data_edit_customer($id){
        return \DB::table($this->table)->where('id', $id)->where('deleted_at', NULL)->first();
    }

    public function save_edit_customer($customers_id, $data){
        \DB::table($this->table)
            ->where('id', $customers_id)
            ->update($data);
    }
}
