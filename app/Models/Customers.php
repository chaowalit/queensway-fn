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
}
