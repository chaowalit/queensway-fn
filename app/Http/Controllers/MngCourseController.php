<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\QwcController;
use App\Models\Customers;
use App\Models\CategoryItem;
use App\Models\ItemOfCourse;

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
        $item_of_course = ItemOfCourse::all();
    	$data = array(
            'item_of_course' => $item_of_course,
		);
    	$this->render_view('mng_course/mng_item_course', $data, 'mng_course', 1);
    }

    public function create_item(){
        $category_item = CategoryItem::all();
        $data = array(
            'category_item' => $category_item,
        );
        $this->render_view('mng_course/form_create_item', $data, 'mng_course', 1);
    }

    public function save_mng_course(Request $request){
        $validator = \Validator::make($request->all(), [
            'category_item_id' => 'required',
            'item_name' => 'required',
            'price' => 'required',
        ]);

        $item_of_course_id = $request->input('item_of_course_id', NULL);
        if($validator->fails()){
            return redirect('mng_course/create_item')
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = array(
            'category_item_id' => $request->input('category_item_id', ''),
            'item_name' => $request->input('item_name', ''),
            'comment' => $request->input('comment', ''),
            'price' => $request->input('price', ''),
            'active' => $request->input('active', ''),
        );

        $customer = ItemOfCourse::create($data);
        
        $request->session()->flash('status', 'success');
        return redirect('mng_course/create_item');
    }
}

?>