<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function get_asesores(){

	$CI =& get_instance();   
	$CI->load->model('Asesores_model', 'asesores_model', TRUE);	
	$data = $CI->asesores_model->get_asesores();
	return $data;	
}


function get_asesores_array($array = ''){

	$CI =& get_instance();   
	$CI->load->model('Asesores_model', 'asesores_model', TRUE);
	$query_array = array('id_asesor','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido');

	if(empty($array)){ 

		$data = get_asesores();
		$query_array = array('id_asesor','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido');

	} else {

		$query = array('fk_id_sexo', 'fk_id_etnia', 'telefono', 'celular', 'asesor_email', 'documento', 'fecha', 'fk_id_tipoid', 'fk_id_nivela', 'fk_id_mpio', 'fk_id_ex');

		foreach ($query as $value) {
			$query_array[] = (array_key_exists($value,$array) ? $value : '' );
		}

		$data = $CI->asesores_model->get_asesores_array($query_array);

		foreach ($data as $key => $value){

		    $keys = array_keys($value);		    
		    array_walk($keys,"changeIDkey");
		    $array_data[] = array_combine($keys,array_values($value));

var_dump($value);
echo "<br><br>";
var_dump($keys);
echo "<br><br>";
var_dump(array_combine($keys,array_values($value)));
echo "<br><br>";		    
		}

		return $array_data;
	}
}


function changeIDkey(&$value,$key){

    if ($key === "id_asesor") 		 $key = 'ID';
	if ($key === "primer_nombre") 	 $key = 'Primer Nombre';
	if ($key === "segundo_nombre") 	 $key = 'Segundo Nombre';
	if ($key === "primer_apellido")  $key = 'Primer Apellido';
	if ($key === "segundo_apellido") $key = 'Segundo Apellido';
	if ($key === "fk_id_sexo") 		 $key = 'Sexo';
	if ($key === "fk_id_etnia") 	 $key = 'Etnia';
	if ($key === "telefono") 		 $key = 'Telefono';
	if ($key === "celular") 		 $key = 'Celular';
	if ($key === "asesor_email") 	 $key = 'e-mail';
	if ($key === "documento") 		 $key = 'Documento';
	if ($key === "fk_id_nivela") 	 $key = 'Nivel Academico';
	if ($key === "fk_id_mpio") 		 $key = 'Municipio';
}

?>