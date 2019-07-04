<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function get_asesores(){

	$CI =& get_instance();   
	$CI->load->model('Asesores_model', 'asesores_model', TRUE);	
	$data = $CI->asesores_model->get_asesores();
	return $data;	
}

?>