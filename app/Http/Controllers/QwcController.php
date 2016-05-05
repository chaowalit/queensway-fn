<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QwcController extends Controller
{

    public function render_view($view_path = '', $data = array(), $menu_nav = '', $menu_level = 0, $page_inside = 1){
		//$sidebar      = app()->make('App\Services\Template')->settingSideBar($menu_nav, $menu_level);
		//$header_title = app()->make('App\Services\Template')->settingHeaderTitle($menu_nav, $menu_level);
    	$template_data = [
			"view_data"    => $data,
			"menu_nav"     => $menu_nav,  // it is name of in active_menu, css, js
			"menu_level"   => $menu_level, // it is check active_submenu
            "page_inside" => $page_inside, // ตรวจสอบแต่ละของ sub menu ที่เราทำงานอยู่ เพื่อแยก js
		];
		if($menu_nav){
			echo view($view_path, $template_data);
		}else{
			dump($template_data); die;
		}

    }

    public function render_json($code = 200, $message = 'OK', $res_data = array(), $total = 0, $total_result = 0){
        $render = array();
        $render['header']['code'] = $code;
        $render['header']['message'] = $message;
        $render['total'] = $total;
        $render['total_result'] = $total_result;

        if($code == 200){
            $render['data']['item'] = $res_data;
        }else{
            $render['data'] = $res_data;
        }


        return json_encode($render, true);
    }
}
