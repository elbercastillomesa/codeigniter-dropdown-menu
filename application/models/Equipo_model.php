<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Equipo_model class.
 * 
 * @extends CI_Model
 */
class Equipo_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * get_asesores function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_equipo($entidad = 'coordinadores') {
		
		$this->db->select('id_'.$entidad.', primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, '.$entidad.'_email, celular');
		$this->db->from('o_'.$entidad);
		$result = $this->db->get()->result_array();
		//echo PHP_EOL.$this->db->last_query().PHP_EOL;
		return $result;
	}

	public function get_equipo_array($entidad = 'coordinadores', $array_query = '') {

		if (empty($array_query)) {
			
			$result = $this->get_equipo();			
		
		} else {
		
			$this->db->select($array_query);
			$this->db->from('o_'.$entidad);
			$this->db->join('o_sexo', 'o_sexo.id_sexo = o_'.$entidad.'.fk_id_sexo', 'left');
			$this->db->join('o_etnia', 'o_etnia.id_etnia = o_'.$entidad.'.fk_id_etnia', 'left');
			$this->db->join('o_nivelacademico', 'o_nivelacademico.id_nivelaca = o_'.$entidad.'.fk_id_nivela', 'left');
			$this->db->join('o_municipio', 'o_municipio.id_municipio = o_'.$entidad.'.fk_id_mpio', 'left');
			$result = $this->db->get()->result_array();
		}
		//echo PHP_EOL.$this->db->last_query().PHP_EOL;
		return $result;
	}
	

}