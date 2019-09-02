<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Asesores_model extends CI_Model {

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
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($username, $email, $password) {
		
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('users', $data);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {

		$this->db->select('usu_contr');
		$this->db->from('usuario');
		$this->db->where('usu_alias', $username);
		$hash = $this->db->get()->row('usu_contr');
		//echo PHP_EOL.$this->db->last_query().PHP_EOL;
		return $this->verify_password_hash(($password), $hash);
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('usu_id');
		$this->db->from('usuario');
		$this->db->where('usu_alias', $username);
		return $this->db->get()->row('usu_id');		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_asesores() {
		
		$this->db->select('id_asesor, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, asesor_email, celular');
		$this->db->from('o_asesor');
		$result = $this->db->get()->result_array();
		//echo PHP_EOL.$this->db->last_query().PHP_EOL;
		return $result;
	}

	public function get_asesores_array($array_query = '') {

		if (empty($array_query)) {
			
			$result = $this->get_asesores();			
		
		} else {
		
			$this->db->select($array_query);
			$this->db->from('o_asesor');
			$this->db->join('o_sexo', 'o_sexo.id_sexo = o_asesor.fk_id_sexo', 'left');
			$this->db->join('o_etnia', 'o_etnia.id_etnia = o_asesor.fk_id_etnia', 'left');
			$this->db->join('o_nivelacademico', 'o_nivelacademico.id_nivelaca = o_asesor.fk_id_nivela', 'left');
			$this->db->join('o_municipio', 'o_municipio.id_municipio = o_asesor.fk_id_mpio', 'left');
			$result = $this->db->get()->result_array();
		}
		echo PHP_EOL.$this->db->last_query().PHP_EOL;
		return $result;
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
	}
}