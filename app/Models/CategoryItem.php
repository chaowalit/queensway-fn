<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryItem extends Model
{
	use SoftDeletes;

    protected $table = 'category_item';

    protected $fillable = [
    	'category_item_name',
        
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected $dates = ['deleted_at'];
}

?>