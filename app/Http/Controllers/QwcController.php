<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QwcController extends Controller
{
    
    public function render_view($view_path = '', $data = array(), $menu_nav = '', $menu_level = 0){
		//$sidebar      = app()->make('App\Services\Template')->settingSideBar($menu_nav, $menu_level);
		//$header_title = app()->make('App\Services\Template')->settingHeaderTitle($menu_nav, $menu_level);
    	$template_data = [
			"view_data"    => $data,
			"menu_nav"     => $menu_nav,  // it is name of in active_menu, css, js
			"menu_level"   => $menu_level, // it is check active_submenu
		];
		if($menu_nav){
			echo view($view_path, $template_data);
		}else{
			dump($template_data); die;
		}
    	
    }
}
