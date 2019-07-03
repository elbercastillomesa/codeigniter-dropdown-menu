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

	public function getData(){

		// create the data object
		$data = new stdClass();
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$data = showLinks($_SESSION, 'Asesores');
			$data['lista'] = get_asesores();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);		
			$this->load->view('partners/asesores');
			$this->load->view('templates/footer');

		} else {
			
			// set variables from the form
			$array 			= $this->input->post('array');
			$query_array 	= get_asesores($array);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			
			if ($query_array['result']) {
				
				$this->load->view('partners/asesores', $query_array['lista']);			
				
			} else {
				
				// Falla en la consulta
				$data['error'] = 'Se present&oacute; un problema con los datos solicitados, intente nuevamente.';

				$this->load->view('partners/asesores', $data['error']);	
			}

			$this->load->view('templates/footer');	
		}
	}
}