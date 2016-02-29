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
	public $item_of_course;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ItemOfCourse $item_of_course)
    {
        $this->middleware('auth');

        $this->item_of_course = $item_of_course;
    }

    public function index(){
        $item_of_course = $this->item_of_course->getItemOfCourse();
		//dd($item_of_course);
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

	public function edit_item($id){
		$category_item = CategoryItem::all();
		$ItemOfCourse = ItemOfCourse::where('id', $id)->get()->toArray();
		//dd($ItemOfCourse);
		$data = array(
			'category_item' => $category_item,
			'item_of_course' => $ItemOfCourse,
		);
		$this->render_view('mng_course/form_edit_item', $data, 'mng_course', 1);
	}

    public function save_mng_course(Request $request){
        $validator = \Validator::make($request->all(), [
            'category_item_id' => 'required',
            'item_name' => 'required',
            'price' => 'required',
			'price_credit' => 'required',
        ]);

		$data = array(
            'category_item_id' => $request->input('category_item_id', ''),
            'item_name' => $request->input('item_name', ''),
            'comment' => $request->input('comment', ''),
            'price' => $request->input('price', ''),
			'price_credit' => $request->input('price_credit', ''),
            'active' => $request->input('active', ''),
        );

        $item_of_course_id = $request->input('item_of_course_id', NULL);
		if($item_of_course_id){  // Edit data
			if($validator->fails()){
	            return redirect('mng_course/edit_item/'.$item_of_course_id)
	                    ->withErrors($validator)
	                    ->withInput();
	        }

			ItemOfCourse::where('id', $item_of_course_id)->update($data);
			$request->session()->flash('status', 'success');
			return redirect('mng_course/edit_item/'.$item_of_course_id);
		}else{
			if($validator->fails()){
	            return redirect('mng_course/create_item')
	                    ->withErrors($validator)
	                    ->withInput();
	        }

			$customer = ItemOfCourse::create($data);

	        $request->session()->flash('status', 'success');
	        return redirect('mng_course/create_item');
		}
    }

	public function del_item_of_course(Request $request){
		$item_of_course_id = $request->input('id', NULL);
		try {

            ItemOfCourse::where('id', $item_of_course_id)->delete();

            return "200";
        } catch (Exception $e) {
            return "error";
        }
	}

	public function doo_course(){
		$data = array();
		$this->render_view('mng_course/doo_course_detail', $data, 'mng_course', 3);
	}
}

?>
