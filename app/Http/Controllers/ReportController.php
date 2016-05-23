<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;

class ReportController extends QwcController{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
		$data = array(

		);

		$this->render_view('report/form_report', $data, 'report', 1, 1);
	}
}
?>
