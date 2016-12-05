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

class ReportController extends QwcController{

	private $text_month = array(
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
	private $type_report = array(
			"credit" => "แบบวงเงิน",
			"debit" => "แบบรายคอร์ส",
	);

	public function __construct()
    {
        $this->middleware('auth');
        ini_set('max_execution_time', 300); //timeout 5 minutes
    }

	public function index(){
		// return \Excel::create('รายงานแบบรายคอร์ส ประจำเดือน ตุลาคม 2016', function($excel) {
		// 	    $excel->sheet('แบบรายคอร์ส', function($sheet) {
		// 	    	$header = "รายงานการตัดคอร์สแบบรายคอร์ส ประจำเดือน ตุลาคม 2016";
		// 	    	$data = array(
		// 	    		"header" => $header,
		//     		);
		// 	        $sheet->loadView('report.test', $data);
		// 	    })->download('xls');
		// 	});

		$Customers = new Customers;
		$customers = $Customers->get_list_customers(0, 9000, '', '');
		$data = array(
			'customers' => $customers,
		);

		//dump(app()->make("App\Services\Report")->get_report_for_month(0, 0));
		$this->render_view('report/form_report', $data, 'report', 1, 1);
	}

	public function gen_report_for_month(Request $request){
		$branch_name = \Auth::user()->branch_name;
		$month_report = $this->text_month[$request->get('month_report', '')];
		$year_report = $request->get('year_report', '');
		$type_report = $this->type_report[$request->get('type_report', '')];

		$file_name = "รายงาน".$type_report. " ประจำเดือน ".$month_report ." ".$year_report;
		if($request->get('type_report', '') == 'debit'){
			return \Excel::create($file_name, function($excel)
							use($branch_name, $month_report, $year_report, $type_report, $request){
			    $excel->sheet($type_report, function($sheet)
			    			use($branch_name, $month_report, $year_report, $type_report, $request){

			    	$header = "รายงานการตัดคอร์สแบบรายคอร์ส ประจำเดือน ". $month_report ." ".$year_report;
			       $res = app()->make("App\Services\Report")
			       				->get_report_for_month_by_debit($request->get('month_report', ''), $year_report);
			    	//dd($res);
			    	$data = array(
			    		"header" => $header,
			    		"res" => $res,
		    		);
			        $sheet->loadView('report.template_debit', $data);
			    })->download('xls');
			});
		}else if($request->get('type_report', '') == 'credit'){
			return \Excel::create($file_name, function($excel)
							use($branch_name, $month_report, $year_report, $type_report, $request){
			    $excel->sheet($type_report, function($sheet)
			    			use($branch_name, $month_report, $year_report, $type_report, $request){

			    	$header = "รายงานการตัดคอร์สแบบวงเงิน ประจำเดือน ". $month_report ." ".$year_report;
			       $res = app()->make("App\Services\Report")
			       				->get_report_for_month_by_credit($request->get('month_report', ''), $year_report);
			    	//dd($res);
			    	$data = array(
			    		"header" => $header,
			    		"res" => $res,
		    		);
			        $sheet->loadView('report.template_credit', $data);
			    })->download('xls');
			});
		}
	}

	public function gen_report_for_year(Request $request){
		$branch_name = \Auth::user()->branch_name;

		$year_report = $request->get('year_report', '');
		$type_report = $this->type_report[$request->get('type_report', '')];

		$file_name = "รายงาน".$type_report. " ประจำปี " . " ".$year_report;
		if($request->get('type_report', '') == 'debit'){
			return \Excel::create($file_name, function($excel)
							use($branch_name, $year_report, $type_report, $request){
			    $excel->sheet($type_report, function($sheet)
			    			use($branch_name, $year_report, $type_report, $request){

			    	$header = "รายงานการตัดคอร์สแบบรายคอร์ส ประจำปี " ." ".$year_report;
			       $res = app()->make("App\Services\Report")
			       				->get_report_for_month_by_debit($request->get('month_report', ''), $year_report);
			    	//dd($res);
			    	$data = array(
			    		"header" => $header,
			    		"res" => $res,
		    		);
			        $sheet->loadView('report.template_debit', $data);
			    })->download('xls');
			});
		}else if($request->get('type_report', '') == 'credit'){
			return \Excel::create($file_name, function($excel)
							use($branch_name, $year_report, $type_report, $request){
			    $excel->sheet($type_report, function($sheet)
			    			use($branch_name, $year_report, $type_report, $request){

			    	$header = "รายงานการตัดคอร์สแบบวงเงิน ประจำปี " ." ".$year_report;
			       $res = app()->make("App\Services\Report")
			       				->get_report_for_month_by_credit($request->get('month_report', ''), $year_report);
			    	//dd($res);
			    	$data = array(
			    		"header" => $header,
			    		"res" => $res,
		    		);
			        $sheet->loadView('report.template_credit', $data);
			    })->download('xls');
			});
		}
	}

	public function gen_report_for_month_tmp(Request $request){
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

	public function gen_report_for_year_tmp(Request $request){
		$text_type_report = $request->get('type_report') == "credit"? "แบบวงเงิน":"แบบรายคอร์ส";
		$year_report = $request->get('year_report');
		$branch_name = \Auth::user()->branch_name;

		if($request->get('type_report') == "credit"){
			return \Excel::create('รายงานประจำปี '.$text_type_report.' '.$year_report, function($excel) use ($year_report, $branch_name) {

				$excel->sheet('แบบวงเงิน', function($sheet) use ( $year_report, $branch_name)
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
					$sheet->row(1, array('รายงานการตัดคอร์สแบบวงเงินประจำปี'.' '.$year_report.' สาขา'.$branch_name));
					//------------------------------------------- header column --------------------------------------//
					$data = array(
					    array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', '', '', '', ''),
						array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ยอดวงเงิน', 'ใช้ไป', 'วงเงินใช้ไป', 'คงเหลือ', 'วงเงินคงเหลือ')
					);
					//-------------------------------------------------------------------------------------------------
					$res = app()->make("App\Services\Report")->get_report_for_month_by_credit('', $year_report);
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

		}else if($request->get('type_report') == 'debit'){
			return \Excel::create('รายงานประจำปี '.$text_type_report.' '.$year_report, function($excel) use ($year_report, $branch_name) {

				$excel->sheet('แบบรายคอร์ส', function($sheet) use ($year_report, $branch_name)
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
					$sheet->row(1, array('รายงานการตัดคอร์สแบบรายคอร์สประจำปี'.' '.$year_report.' สาขา'.$branch_name));
					//------------------------------------------- header column --------------------------------------//
					$data = array(
					    array('ลำดับ', 'รายการ', 'ราคา MPL', 'หน่วย', 'จำนวนคอร์ส', '', '', 'ยอดเงิน (บาท)', '', ''),
						array('', '', '', '', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ', 'ยอดซื้อ', 'ใช้ไป', 'คงเหลือ')
					);
					//-------------------------------------------------------------------------------------------------
					$res = app()->make("App\Services\Report")->get_report_for_month_by_debit('', $year_report);
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

		}

		//dd($request->all());
	}

	public function list_report_for_person(Request $request){
		$customer_id = $request->get("customer_id", null);
		$date_range = $request->get("date-range-picker", null);
		$type_report = $request->get('type_report', 'credit');
		//dump($request->all());
		if($date_range){
			$temp = explode(' - ', $date_range);
			$start_date = date("Y-m-d", strtotime($temp[0]))." 00:00:00";
			$end_date = date("Y-m-d", strtotime($temp[1]))." 23:59:59";
		}

		$BuyCourse = new BuyCourse;
		$course_all = $BuyCourse->show_all_course_for_customer($customer_id);
		//dd($course_all);
		$Customers = new Customers;
		$customer = $Customers->getDataCustomerById($customer_id);
		//dd($customer);
		$data = array(
			'customer_id' => $customer_id,
			'date_range' => $date_range,
			'course_all' => $course_all,
			'customer' => $customer,
			'type_report' => $type_report,
		);

		$this->render_view('report/list_report_for_person', $data, 'report', 1, 1);
	}

	public function gen_report_for_person_all(Request $request){
		$type_report = $request->get('type_report', 'credit');
		$customer_id = $request->get('customer_id', null);
		$date_range = $request->get('date_range', null);
		$course_id = $request->get('course_id', null);
		$branch_name = \Auth::user()->branch_name;

		if($type_report == "debit"){
			$file_name = ($course_id)? "รายงานรายคน (1 คอร์ส) แบบรายคอร์ส":"รายงานรายคน (ทั้งหมด) แบบรายคอร์ส";

			return \Excel::create($file_name, function($excel)
							use($branch_name, $course_id, $date_range, $customer_id, $type_report, $request){
			    $excel->sheet($type_report, function($sheet)
			    			use($branch_name, $course_id, $date_range, $customer_id, $type_report, $request){

			    	$header_1 = 'รายงานลูกค้ารายตัวแบบรายคอร์ส'.' สาขา'.$branch_name;
			    	$Customers = new Customers;
					$customer = $Customers->getDataCustomerById($customer_id);
					$header_2 = "ชื่อลูกค้า : ".$customer[0]->prefix.$customer[0]->full_name . ' '.' รหัสลูกค้า : '.$customer[0]->customer_number;
					$header_3 = "เบอร์โทรศัพท์ : ".$customer[0]->tel;

					$show_date_range = ($date_range)? $date_range : "(ทั้งหมด)";
					if($course_id){
						$BuyCourse = new BuyCourse;
						$res_c = $BuyCourse->getDataBuyCourseById($course_id);

						$header_4 = 'ระหว่างวันที่ : '. $show_date_range ."  ".
									" สถานะคอร์ส : ".$res_c[0]->status_course;
					}else{
						$header_4 = 'ระหว่างวันที่ : '. $show_date_range;
					}

			       	$res = app()->make("App\Services\Report")->get_report_for_person_all_by_debit($customer_id, $date_range, $course_id);
			    	//dd($res);
			    	$data = array(
			    		"header_1" => $header_1,
			    		"header_2" => $header_2,
			    		"header_3" => $header_3,
			    		"header_4" => $header_4,
			    		"res" => $res,
		    		);
			        $sheet->loadView('report.template_person_debit', $data);
			    })->download('xls');
			});

		} else if($type_report == "credit"){
			$file_name = ($course_id)? "รายงานรายคน (1 คอร์ส) แบบวงเงิน":"รายงานรายคน (ทั้งหมด) แบบวงเงิน";

			return \Excel::create($file_name, function($excel)
							use($branch_name, $course_id, $date_range, $customer_id, $type_report, $request){
			    $excel->sheet($type_report, function($sheet)
			    			use($branch_name, $course_id, $date_range, $customer_id, $type_report, $request){

			    	$header_1 = 'รายงานลูกค้ารายตัวแบบวงเงิน'.' สาขา'.$branch_name;
			    	$Customers = new Customers;
					$customer = $Customers->getDataCustomerById($customer_id);
					$header_2 = "ชื่อลูกค้า : ".$customer[0]->prefix.$customer[0]->full_name . ' '.' รหัสลูกค้า : '.$customer[0]->customer_number;
					$header_3 = "เบอร์โทรศัพท์ : ".$customer[0]->tel;

					$show_date_range = ($date_range)? $date_range : "(ทั้งหมด)";
					if($course_id){
						$BuyCourse = new BuyCourse;
						$res_c = $BuyCourse->getDataBuyCourseById($course_id);

						$header_4 = 'ระหว่างวันที่ : '. $show_date_range ."  ".
									" สถานะคอร์ส : ".$res_c[0]->status_course;
					}else{
						$header_4 = 'ระหว่างวันที่ : '. $show_date_range;
					}

			       	$res = app()->make("App\Services\Report")->get_report_for_person_all_by_credit($customer_id, $date_range, $course_id);
			    	//dd($res);
			    	$data = array(
			    		"header_1" => $header_1,
			    		"header_2" => $header_2,
			    		"header_3" => $header_3,
			    		"header_4" => $header_4,
			    		"res" => $res,
		    		);
			        $sheet->loadView('report.template_person_credit', $data);
			    })->download('xls');
			});
		}
	}

	public function gen_report_for_person_all_tmp(Request $request){
		//dump($request->all());
		$type_report = $request->get('type_report', 'credit');
		$customer_id = $request->get('customer_id', null);
		$date_range = $request->get('date_range', null);
		$course_id = $request->get('course_id', null);
		$branch_name = \Auth::user()->branch_name;

		if($type_report == "credit"){
			$file_name = ($course_id)? "รายงานรายคน (1 คอร์ส) แบบวงเงิน":"รายงานรายคน (ทั้งหมด) แบบวงเงิน";
			return \Excel::create($file_name, function($excel) use ($customer_id, $date_range, $branch_name, $course_id) {

				$excel->sheet('แบบวงเงิน', function($sheet) use ( $customer_id, $date_range, $branch_name, $course_id)
				{
					$sheet->setWidth(array(
					    'A'     =>  3,
					    'B'     =>  5,
						'C'		=>  35,
						'D'		=>	13,
						'E'		=>	8,
						'F'		=>  10,
						'G'		=>  10,
						'H' 	=> 	13,
						'L'		=>  12,
						'N'		=>  10,
						'M'		=>  13,
						'R' 	=>	13,
					));

					$sheet->mergeCells('A1:M1');
					$sheet->row(1, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(14);
			            //$row->setFontWeight('bold');
			        });
			        
			        $Customers = new Customers;
					$customer = $Customers->getDataCustomerById($customer_id);
					$temp_1 = "ชื่อลูกค้า : ".$customer[0]->prefix.$customer[0]->full_name . ' '.' รหัสลูกค้า : '.$customer[0]->customer_number;
					$temp_2 = "เบอร์โทรศัพท์ : ".$customer[0]->tel;

					$sheet->row(1, array('รายงานลูกค้ารายตัวแบบวงเงิน'.' สาขา'.$branch_name));
					if($course_id){
						$BuyCourse = new BuyCourse;
						$res_c = $BuyCourse->getDataBuyCourseById($course_id);

						$rows_2 = 'ระหว่างวันที่ : '. $date_range ."  "." สถานะคอร์ส : ".$res_c[0]->status_course;
						$sheet->row(2, array($rows_2));
					}else{
						$sheet->row(2, array('ระหว่างวันที่ : '. $date_range));
					}
					
					$sheet->row(3, array($temp_1));
					$sheet->row(4, array($temp_2));
					//------------------------------------------- header column --------------------------------------//
					$data = array(
					    array('ลำดับ', 'รายการ', 'ราคา MPL (บาทต่อหน่วย)', 'หน่วย', 'ยอดที่ซื้อ', '', '', '', 'ยอดที่ใช้', '', '', '', '', '', '', 'คงเหลือ', ''),
						array('', '', '', '', 'วันที่ซื้อ', 'ยอดเงินที่ซื้อ', 'ยอดวงเงินที่ซื้อ', 'ชื่อ consult', 'วันที่ใช้', 'จำนวนที่ใช้', 'ยอดเงินที่ใช้', 'ยอดวงเงินที่ใช้', 'ชื่อหมอ', 'ชื่อ consult', 'ชื่อ BT/TT', 'คงเหลือ', 'วงเงินคงเหลือ')
					);
					//-------------------------------------------------------------------------------------------------
					$res = app()->make("App\Services\Report")->get_report_for_person_all_by_credit($customer_id, $date_range, $course_id);
					$data_total = array_merge($data, $res);

					$sheet->fromArray($data_total, null, 'B6', false, false);

					$sheet->mergeCells('F6:I6');
					$sheet->mergeCells('J6:P6');
					$sheet->mergeCells('Q6:R6');
					$sheet->setMergeColumn(array(
					    'columns' => array('B'),
					    'rows' => array(
					        array(6,7)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('C'),
					    'rows' => array(
					        array(6,7)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('D'),
					    'rows' => array(
					        array(6,7)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('E'),
					    'rows' => array(
					        array(6,7)
					    )
					));

					$sheet->row(6, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(10);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });
					$sheet->row(7, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(10);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });

					$sheet->cells('B6:B7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('B8:B103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('C6:C7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('D6:D7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('D8:D103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('E6:E7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('E8:E103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('F6:F7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('F8:F103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('G6:G7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('G8:G103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('H6:H7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('H8:H103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('I6:I7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('I8:I103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('J6:J7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('J8:J103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('K6:K7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('K8:K103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('L6:L7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('L8:L103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('M6:M7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('M8:M103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('N6:N7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('N8:N103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('O6:O7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('O8:O103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('P6:P7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('P8:P103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('Q6:Q7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('Q8:Q103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('R6:R7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('R8:R103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					// Set border for range
					$sheet->setBorder('B6:R7', 'thin');
					$sheet->setBorder('B8:R'.(5 + count($data_total)), 'thin');
				});
			})->download('xls');

		}else if($type_report == "debit"){
			//dsf-sdfsdfdsfsdfdsklajfdls;fjkl;djsflkjdlk
			$file_name = ($course_id)? "รายงานรายคน (1 คอร์ส) แบบรายคอร์ส":"รายงานรายคน (ทั้งหมด) แบบรายคอร์ส";
			return \Excel::create($file_name, function($excel) use ($customer_id, $date_range, $branch_name, $course_id) {

				$excel->sheet('แบบรายคอร์ส', function($sheet) use ($customer_id, $date_range, $branch_name, $course_id)
				{
					// Set width for multiple cells
					$sheet->setWidth(array(
					    'A'     =>  3,
					    'B'     =>  5,
						'C'		=>  35,
						'D'		=>	13,
						'E'		=>	8,
						'F'		=>  10,
						'G'		=>  12,
						'H'		=>  12,
						'I'		=>  12,
						'K'		=>  12,
						'L'     =>  12,
						'N'		=>  12,
					));

					$sheet->mergeCells('A1:M1');
					$sheet->row(1, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(14);
			            //$row->setFontWeight('bold');
			        });

					$Customers = new Customers;
					$customer = $Customers->getDataCustomerById($customer_id);
					$temp_1 = "ชื่อลูกค้า : ".$customer[0]->prefix.$customer[0]->full_name . ' '.' รหัสลูกค้า : '.$customer[0]->customer_number;
					$temp_2 = "เบอร์โทรศัพท์ : ".$customer[0]->tel;

					$sheet->row(1, array('รายงานลูกค้ารายตัวแบบรายคอร์ส'.' สาขา'.$branch_name));
					if($course_id){
						$BuyCourse = new BuyCourse;
						$res_c = $BuyCourse->getDataBuyCourseById($course_id);

						$rows_2 = 'ระหว่างวันที่ : '. $date_range ."  "." สถานะคอร์ส : ".$res_c[0]->status_course;
						$sheet->row(2, array($rows_2));
					}else{
						$sheet->row(2, array('ระหว่างวันที่ : '. $date_range));
					}
					
					$sheet->row(3, array($temp_1));
					$sheet->row(4, array($temp_2));

					//------------------------------------------- header column --------------------------------------//
					$data = array(
					    array('ลำดับ', 'รายการ', 'ราคา MPL (บาทต่อหน่วย)', 'หน่วย', 'ยอดที่ซื้อ', '', '', '', 'ยอดที่ใช้', '', '', '', '', '', 
					    	'ยอดคงเหลือ', ''),
						array('', '', '', '', 'วันที่ซื้อ', 'จำนวนหน่วย', 'ยอดเงินที่ซื้อ', 'ชื่อ consult', 'วันที่ใช้', 'จำนวนที่ใช้', 
							'ยอดเงินที่ใช้', 'ชื่อหมอ', 'ชื่อ consult', 'ชื่อ BT/TT', 'จำนวน', 'ยอดเงิน')
					);
					//-------------------------------------------------------------------------------------------------
					$res = app()->make("App\Services\Report")->get_report_for_person_all_by_debit($customer_id, $date_range, $course_id);
					$data_total = array_merge($data, $res);
					//-------------------------------------------------------------------------------------------------
					$sheet->fromArray($data_total, null, 'B6', false, false);

					$sheet->mergeCells('F6:I6');
					$sheet->mergeCells('J6:O6');
					$sheet->mergeCells('P6:Q6');
					$sheet->setMergeColumn(array(
					    'columns' => array('B'),
					    'rows' => array(
					        array(6,7)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('C'),
					    'rows' => array(
					        array(6,7)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('D'),
					    'rows' => array(
					        array(6,7)
					    )
					));
					$sheet->setMergeColumn(array(
					    'columns' => array('E'),
					    'rows' => array(
					        array(6,7)
					    )
					));

					$sheet->row(6, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(12);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });
					$sheet->row(7, function ($row) {
	            		// call cell manipulation methods
			            $row->setFontFamily('Calibri');
			            $row->setFontSize(12);
			            $row->setFontWeight('bold');
						$row->setAlignment('center');
						$row->setValignment('center');
			        });

					$sheet->cells('B6:B7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('B8:B103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('C6:C7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('D6:D7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('D8:D103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('E6:E7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('E8:E103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('F6:F7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('F8:F103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('G6:G7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('G8:G103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('H6:H7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('H8:H103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('I6:I7', function($cells) {
						$cells->setBackground('#99ccff');
					});
					$sheet->cells('I8:I103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('J6:J7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('J8:J103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('K6:K7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('K8:K103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('L6:L7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('L8:L103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('M6:M7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('M8:M103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('N6:N7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('N8:N103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('O6:O7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('O8:O103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('P6:P7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('P8:P103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					$sheet->cells('Q6:Q7', function($cells) {
						$cells->setBackground('#9585bf');
					});
					$sheet->cells('Q8:Q103', function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('center');
					});

					// Set border for range
					$sheet->setBorder('B6:Q7', 'thin');
					$sheet->setBorder('B8:Q'.(5 + count($data_total)), 'thin');
				});
			})->download('xls');

		}else{
			echo "error type report";
			exit;
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
