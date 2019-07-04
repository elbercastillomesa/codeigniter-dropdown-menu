<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function get_asesores($array = ''){

if(isset($array)){ var_dump($array); }

	$CI =& get_instance();   
	$CI->load->model('Asesores_model', 'asesores_model', TRUE);	
	$data = $CI->asesores_model->get_asesores();
	return $data;	
}

?>