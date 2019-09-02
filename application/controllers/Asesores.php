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
		$data = showLinks($_SESSION, 'Asesores');

		$this->form_validation->set_rules('accept_terms_checkbox', '', 'callback_accept_terms');

		if ($this->form_validation->run() === false) {

			// validation not ok, send validation errors to the view			
			$data['lista'] = get_asesores();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);		
			$this->load->view('partners/asesores');
			$this->load->view('templates/footer');

		} else {
		
			// set variables from the form
			$array['dato']	= $this->input->post('dato[]');
			$data['lista'] 	= get_asesores_array($array['dato']);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('partners/asesores');
			if (!empty($data['lista'])) {
				$this->load->view('partners/dataTable');
			}			
			$this->load->view('partners/footer');
			$this->load->view('templates/footer');	
		}
	}

	function accept_terms(){

		if ($this->input->post('dato[]')){
			return TRUE;	
		} else {
			$error = 'Por favor seleccione al menos una opcí&oacute;n.';
			$this->form_validation->set_message('accept_terms', $error);
			return FALSE;
		}
	}
}