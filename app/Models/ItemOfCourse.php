<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemOfCourse extends Model
{
	use SoftDeletes;

    protected $table = 'item_of_course';

    protected $fillable = [
    	'category_item_id',
    	'item_name',
    	'comment',
    	'price',
    	'active',
        
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected $dates = ['deleted_at'];
}

?>