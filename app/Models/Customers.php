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

    public function count_customers(){

        return \DB::table($this->table)->count();
    }

    public function get_list_customers($offset, $limit){
        return \DB::table($this->table)->orderBy('updated_at', 'desc')->skip($offset)->take($limit)->get();
    }
}
