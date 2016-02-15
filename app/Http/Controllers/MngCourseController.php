<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;

class MngCourseController extends QwcController
{
	public $customers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Customers $customers)
    {
        $this->middleware('auth');

        $this->customers = $customers;
    }

    public function index(){
    	$data = array(

		);
    	$this->render_view('mng_course/mng_item_course', $data, 'mng_course', 1);
    }
}

?>