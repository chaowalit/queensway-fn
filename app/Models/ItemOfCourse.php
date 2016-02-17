<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CategoryItem;

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

	public function getItemOfCourse(){
		$CategoryItem = new CategoryItem;

		return \DB::table($this->table)
			->select($this->table.'.*', $CategoryItem->getTableName().'.*', $this->table.'.id as item_of_course_id')
            ->join($CategoryItem->getTableName(), $this->table.'.category_item_id', '=', $CategoryItem->getTableName().'.id')
			->where($this->table.'.deleted_at', NULL)
			->orderBy($this->table.'.category_item_id', 'asc')

            ->get();
	}

	public function CategoryItem()
    {
        return $this->hasOne('App\Models\CategoryItem', 'category_item_id', 'id');
    }
}

?>
