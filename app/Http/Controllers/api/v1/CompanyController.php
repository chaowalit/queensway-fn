<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\ItemOfCourse;
use App\Models\BuyCourse;
use App\Models\UsageCourse;
use App\User;

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
	public function updateCompanyInfo(Request $request){
		$validator = \Validator::make($request->all(), [
            'company_name' => 'required',
            'branch_no' => 'required',
			'branch_name' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'tel' => 'required',
			'comment' => '',
			'id' => 'required|numeric',
			'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->render_json(400, 'Error Validator', [], 0, 0);
        }

		$password_api = $request->get('password', '');
		if($password_api == getPasswordApiV1()){
			$User = new User;
			$data = array(
				"company_name" => $request->get('company_name', ''),
				"branch_no" => $request->get('branch_no', ''),
				"branch_name" => $request->get('branch_name', ''),
				"first_name" => $request->get('first_name', ''),
				"last_name" => $request->get('last_name', ''),
				"address" => $request->get('address', ''),
				"tel" => $request->get('tel', ''),
				"comment" => $request->get('comment', ''),
				"updated_at" => date('Y-m-d H:i:s'),
			);

			\DB::table($User->getTableName())
	            ->where('id', $request->get('id', ''))
	            ->update($data);

			return $this->render_json(200, 'OK', $data, 1, 1);
		}else{
			return $this->render_json(400, 'Password_Incorrect', [], 0, 0);
		}
	}
	public function changePasswordCompany(Request $request){
		$validator = \Validator::make($request->all(), [
            'email' => 'required',
            'new_password' => 'required',

			'id' => 'required|numeric',
			'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->render_json(400, 'Error Validator', [], 0, 0);
        }

		$password_api = $request->get('password', '');
		if($password_api == getPasswordApiV1()){
			$User = new User;
			$data = array(
				"email" => $request->get('email', ''),
				"password" => bcrypt($request->get('new_password', '')),
			);

			\DB::table($User->getTableName())
	            ->where('id', $request->get('id', ''))
	            ->update($data);

			return $this->render_json(200, 'OK', $data, 1, 1);
		}else{
			return $this->render_json(400, 'Password_Incorrect', [], 0, 0);
		}
	}
}
?>
