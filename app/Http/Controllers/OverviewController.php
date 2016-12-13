<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;
use App\Models\UsageCourse;
use App\Models\HistoryPayment;

class OverviewController extends QwcController{
	public function __construct()
    {
        $this->middleware('auth');
        ini_set('max_execution_time', 300); //timeout 5 minutes
    }
    public function index(){
    	$data = array();
    	$this->render_view('overview/main', $data, 'overview', 1, 1);
    }
}