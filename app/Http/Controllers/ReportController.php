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

		//dump(app()->make("App\Services\Report")->get_report_for_month(0, 0));

		$this->render_view('report/form_report', $data, 'report', 1, 1);
	}
}

/*
$data = ItemOfCourse::get()->toArray();
return \Excel::create('itsolutionstuff_example', function($excel) use ($data) {
	$excel->sheet('mySheet', function($sheet) use ($data)
	{
		$sheet->fromArray($data);
	});
})->download('xls');
*/
?>
