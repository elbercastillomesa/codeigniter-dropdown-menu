<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


function showLinks($session_var, $title){

	$data['title'] = $title . ' - Ondas Valle' ;
	$CI =& get_instance();   
	$CI->load->model('Dropdown_model', 'menu_model', TRUE);

	//if (true){
	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
					
		$data['dropdown'] = $CI->menu_model->dropdown_menu(array('0','2'));
		$data['dropdown_items'] = $CI->menu_model->dropdown_menu_item(array('0','2'));
				
	} else {
		
		$data['dropdown'] = $CI->menu_model->dropdown_menu(array('1','2'));
		$data['dropdown_items'] = $CI->menu_model->dropdown_menu_item(array('1','2'));
	}
	return $data;	
}


?>