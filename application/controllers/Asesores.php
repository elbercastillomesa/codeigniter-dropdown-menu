<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asesores extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->model('asesores_model');
		$this->load->helper('navbar_helper');			
		$this->load->helper('asesores_helper');			
	}
	
	
	public function index() {

		$data = showLinks($_SESSION, 'Asesores');
		$data['lista'] = get_asesores();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('partners/asesores');
		$this->load->view('templates/footer');		
	}

}