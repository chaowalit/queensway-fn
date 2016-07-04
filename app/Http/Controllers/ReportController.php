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
		$Customers = new Customers;
		$customers = $Customers->get_list_customers(0, 9000, '', '');
		$data = array(
			'customers' => $customers,
		);

		//dump(app()->make("App\Services\Report")->get_report_for_month(0, 0));
		$this->render_view('report/form_report', $data, 'report', 1, 1);
	}

	public function gen_report_for_month(Request $request){
		$text_month = array(
			"01" => "มกราคม",
			"02" => "กุมภาพันธ์",
			"03" => "มีนาคม",
			"04" => "เมษายน",
			"05" => "พฤษภาคม",
			"06" => "มิถุนายน",
			"07" => "กรกฎาคม",
			"08" => "สิงหาคม",
			"09" => "กันยายน",
			"10" => "ตุลาคม",
			"11" => "พฤศจิกายน",
			"12" => "ธันวาคม",
		);
		//$data = ItemOfCourse::get()->toArray();
		//dd($data);
		//dd($request->all());
		$text_type_report = $request->get('type_report') == "credit"? "แบบวงเงิน":"แบบรายคอร์ส";
		$month_report = $request->get('month_report');
		$year_report = $request->get('year_report');
		$branch_name = \Auth::user()->branch_name;

		if($request->get('type_report') == 'debit'){
			return \Excel::create('รายงานประจำเดือน '.$text_type_report.' '.$month_report.'-'.$year_report, function($excel) use ($text_month, $month_report, $year_report, $branch_name) {

				$excel->sheet('แบบรายคอร์ส', function($sheet) use ($text_month, $month_report, $year_report, $branch_name)
				{
					// Set width for multiple cells
					$sheet->setWidth(array(
					    'A'     =>  3,
					    'B'     =>  5,
						'C'		=>  35,
						'D'		=>	13,
						'E'		=>	8,
						'F'		=>  10,
						'G'		=>  10,
					));

					$sheet->mergeCells('A1:M1');
					$sheet->row(1, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(14);
			            //$row->setFontWeight('bold');
			        });
					$sheet->row(1, array('รายงานการตัดคอร์สแบบรายคอร์สประจำเดือน '.$text_month[$month_report].' '.$year_report.' สาขา'.$branch_name));
					//------------------------------------------- header column --------------------------------------//
					$data = array(
					    array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', ''),
						array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ')
					);
					//-------------------------------------------------------------------------------------------------
					$res = app()->make("App\Services\Report")->get_report_for_month_by_debit($month_report, $year_report);
					$data_total = array_merge($data, $res);
					//-------------------------------------------------------------------------------------------------
					$sheet->fromArray($data_total, null, 'B3', false, false);

					$sheet->mergeCells('F3:H3');
					$sheet->mergeCells('I3:K3');
					$sheet->setMergeColumn(array(
					    'columns' => array('B'),
					    'rows' => array(
					        array(3,4)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('C'),
					    'rows' => array(
					        array(3,4)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('D'),
					    'rows' => array(
					        array(3,4)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('E'),
					    'rows' => array(
					        array(3,4)
					    )
					));

					$sheet->row(3, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(12);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });
					$sheet->row(4, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(12);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });

					$sheet->cells('B3:B4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('B5:B100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('C3:C4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('D3:D4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('D5:D100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('E3:E4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('E5:E100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('F3:F4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('F5:F100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('G3:G4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('G5:G100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('H3:H4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('H5:H100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('I3:I4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('I5:I100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('J3:J4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('J5:J100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('K3:K4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('K5:K100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					// Set border for range
					$sheet->setBorder('B3:K4', 'thin');
					$sheet->setBorder('B5:K'.(2 + count($data_total)), 'thin');
				});
			})->download('xls');

		}else if($request->get('type_report') == "credit"){
			return \Excel::create('รายงานประจำเดือน '.$text_type_report.' '.$month_report.'-'.$year_report, function($excel) use ($text_month, $month_report, $year_report, $branch_name) {

				$excel->sheet('แบบวงเงิน', function($sheet) use ($text_month, $month_report, $year_report, $branch_name)
				{
					$sheet->setWidth(array(
					    'A'     =>  3,
					    'B'     =>  5,
						'C'		=>  35,
						'D'		=>	13,
						'E'		=>	8,
						'F'		=>  10,
						'G'		=>  10,
						'L'		=>  12,
						'N'		=>  13,
					));

					$sheet->mergeCells('A1:M1');
					$sheet->row(1, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(14);
			            //$row->setFontWeight('bold');
			        });
					$sheet->row(1, array('รายงานการตัดคอร์สแบบวงเงินประจำเดือน '.$text_month[$month_report].' '.$year_report.' สาขา'.$branch_name));
					//------------------------------------------- header column --------------------------------------//
					$data = array(
					    array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', '', '', '', ''),
						array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ยอดวงเงิน', 'ใช้ไป', 'วงเงินใช้ไป', 'คงเหลือ', 'วงเงินคงเหลือ')
					);
					//-------------------------------------------------------------------------------------------------
					$res = app()->make("App\Services\Report")->get_report_for_month_by_credit($month_report, $year_report);
					$data_total = array_merge($data, $res);

					$sheet->fromArray($data_total, null, 'B3', false, false);

					$sheet->mergeCells('F3:H3');
					$sheet->mergeCells('I3:N3');
					$sheet->setMergeColumn(array(
					    'columns' => array('B'),
					    'rows' => array(
					        array(3,4)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('C'),
					    'rows' => array(
					        array(3,4)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('D'),
					    'rows' => array(
					        array(3,4)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('E'),
					    'rows' => array(
					        array(3,4)
					    )
					));

					$sheet->row(3, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(12);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });
					$sheet->row(4, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(12);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });

					$sheet->cells('B3:B4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('B5:B100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('C3:C4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('D3:D4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('D5:D100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('E3:E4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('E5:E100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('F3:F4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('F5:F100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('G3:G4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('G5:G100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('H3:H4', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('H5:H100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('I3:I4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('I5:I100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('J3:J4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('J5:J100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('K3:K4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('K5:K100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('L3:L4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('L5:L100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('M3:M4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('M5:M100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('N3:N4', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('N5:N100', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					// Set border for range
					$sheet->setBorder('B3:N4', 'thin');
					$sheet->setBorder('B5:N'.(2 + count($data_total)), 'thin');
				});
			})->download('xls');
		}

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
