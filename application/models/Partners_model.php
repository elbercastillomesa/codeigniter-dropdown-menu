<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Partners_model class.
 * 
 * @extends CI_Model
 */

class Partners_model extends CI_Model {

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

	public function get_asesores() {
		
		$this->db->select('id_asesor, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, asesor_email, celular');
		$this->db->from('o_asesor');
		$result = $this->db->get()->result_array();
		//echo PHP_EOL.$this->db->last_query().PHP_EOL;
		return $result;
	}

}