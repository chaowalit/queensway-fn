<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class HistoryPaymentController extends QwcController{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
		
	}
}

?>
