<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


function get_asesores(){

	$CI =& get_instance();   
	$CI->load->model('Asesores_model', 'asesores_model', TRUE);
	
	$data = $CI->asesores_model->get_asesores();

	return $data;	
}


function books_page(){

	// Datatables Variables
	$draw = intval($this->input->get("draw"));
	$start = intval($this->input->get("start"));
	$length = intval($this->input->get("length"));
	$books = $this->books_model->get_books();
	$data = array();

	foreach($books->result() as $r) {

	$data[] = array(
	$r->name,
	$r->price,
	$r->author,
	$r->rating . "/10 Stars",
	$r->publisher
	);
	}

	$output = array(
	"draw" => $draw,
	"recordsTotal" => $books->num_rows(),
	"recordsFiltered" => $books->num_rows(),
	"data" => $data
	);
	echo json_encode($output);
	exit();
}

function asesores_page(){

  // Datatables Variables
  $draw = '5';
  $start = '1';
  $length = '10';


	$CI =& get_instance();   
	$CI->load->model('Asesores_model', 'asesores_model', TRUE);

	$asesores = $CI->asesores_model->get_asesores();


  $data = array();

  foreach($asesores as $r) {

       $data[] = array(
            'price' 	=> $r['id_asesor'],
            'name' 		=> $r['primer_nombre'].' '.$r['primer_apellido'],
            'author' 	=> $r['asesor_email'],
            'rating' 	=> $r['celular']
       );
  }

	$output = array(
		"draw" => $draw,
		"recordsTotal" => sizeof($asesores),
		"recordsFiltered" => sizeof($asesores),
		"data" => $data
	);
		
	return $output;
}

?>