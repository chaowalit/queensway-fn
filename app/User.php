<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'company_name',
        'branch_no',
        'branch_name',
        'first_name',
        'last_name',
        'address',
        'tel',
        'comment',
        'email',
        'password',
        'set_password_transection',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getTableName(){
		return $this->table;
	}
}
