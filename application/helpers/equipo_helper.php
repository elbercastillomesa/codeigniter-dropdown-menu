<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function get_equipo($entidad){

	$CI =& get_instance();   
	$CI->load->model('Equipo_model', 'equipo_model', TRUE);	
	$data = $CI->equipo_model->get_equipo($entidad);
	return $data;	
}


function get_equipo_array($entidad = '', $array = ''){

	$CI =& get_instance();   
	$CI->load->model('Equipo_model', 'equipo_model', TRUE);
	$query_array = array('id_'.$entidad,'primer_nombre','segundo_nombre','primer_apellido','segundo_apellido');

	if(empty($array)){ 

		$data = get_equipo($entidad);

	} else {

		$query = array('sexo', 'etnia', 'telefono', 'celular', $entidad.'_email', 'documento', 'fecha', 'fk_id_tipoid', 'nivel_academico', 'municipio', 'fk_id_ex');

		$keys = array('ID', 'Primer_Nombre', 'Segundo_Nombre', 'Primer_Apellido', 'Segundo_Apellido', 'Sexo', 'Etnia', 'Telefono', 'Celular', 'e-mail', 'Documento', 'Nivel_Academico', 'Municipio', );

		foreach ($query as $value) {
			$query_array[] = (array_key_exists($value,$array) ? $value : '' );
		}

		$data = $CI->equipo_model->get_equipo_array($entidad, $query_array);
		$array_data = replace_key($data, $keys, $entidad);

		return $array_data;
	}
}


function replace_key($array, $newkey, $entidad) {

    $newarr = array();

	foreach ($array as $data){

	    $oldkey = array_keys($data);
	    $value	= array_values($data);

	    $newkey = changeIDkey($oldkey, $entidad);
	    $newarr[] = array_combine($newkey, $value);
	}

	return $newarr;
}


function changeIDkey($array, $entidad='coordinadores'){

	$new_keys = array();

	foreach ($array as $key) {

		if ($key === "id_".$entidad) 	 $key = 'ID';
		if ($key === "primer_nombre") 	 $key = 'Primer_Nombre';
		if ($key === "segundo_nombre") 	 $key = 'Segundo_Nombre';
		if ($key === "primer_apellido")  $key = 'Primer_Apellido';
		if ($key === "segundo_apellido") $key = 'Segundo_Apellido';
		if ($key === "sexo") 		 	 $key = 'Sexo';
		if ($key === "etnia") 	 		 $key = 'Etnia';
		if ($key === "telefono") 		 $key = 'Telefono';
		if ($key === "celular") 		 $key = 'Celular';
		if ($key === $entidad."_email")	 $key = 'e-mail';
		if ($key === "documento") 		 $key = 'Documento';
		if ($key === "nivel_academico")	 $key = 'Nivel_Academico';
		if ($key === "municipio") 		 $key = 'Municipio';		

		$new_keys[] = $key;
	}
	return $new_keys;
}

?>