<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;
use App\Models\UsageCourse;

class CompanyController extends QwcController{
	public function __construct()
    {
        //$this->middleware('auth');
		//$password_api = a93490dea95f1bf527827bdc047e8a3f11371081
		//getPasswordApiV1()
    }

	public function getCompanyInfo(Request $request){
		$password_api = $request->get('password', '');
		if($password_api == getPasswordApiV1()){
			$data = array();
			$data_qwc = \DB::table('users')
	                    ->select('users.*')->where('id', 1)->where('deleted_at', NULL)->get();
			foreach($data_qwc as $key => $val){
				$data[$key] = (array)$val;
			}

			return $this->render_json(200, 'OK', $data, count($data_qwc), count($data_qwc));
		}else{
			return $this->render_json(400, 'Password_Incorrect', [], 0, 0);
		}

	}
}
?>
