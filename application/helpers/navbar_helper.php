<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


function showLinks($session_var, $title){

	$data['title'] = $title;
	$CI =& get_instance();   
	$CI->load->model('Dropdown_model', 'menu_model', TRUE);

	if (true){//(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
					
		$data['dropdown'] = $CI->menu_model->dropdown_menu('1');
		$data['dropdown_items'] = $CI->menu_model->dropdown_menu_item('1');
				
	} else {
		
		$data['dropdown'] = $CI->menu_model->dropdown_menu('0');
		$data['dropdown_items'] = $CI->menu_model->dropdown_menu_item('0');
	}

	return $data;	
}
?>