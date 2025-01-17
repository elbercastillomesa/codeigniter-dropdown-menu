<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->model('equipo_model');
		$this->load->helper('navbar_helper');			
		$this->load->helper('equipo_helper');
		$this->load->helper('url');		
	}
	
	
	public function index() {

		$data = showLinks($_SESSION, 'Asesores');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('partners/index');
		$this->load->view('templates/footer');	
	}

	public function asesores() {

		$data = showLinks($_SESSION, 'Asesores');
		$data['parternType'] = basename(current_url());
		$data['lista'] = get_equipo_array($data['parternType']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('partners/asesores');
		$this->load->view('templates/footer');	
	}

	public function administrativos() {

		$data = showLinks($_SESSION, 'Administrativos');
		$data['parternType'] = basename(current_url());
		$data['lista'] = get_equipo_array($data['parternType']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('partners/administrativos');
		$this->load->view('templates/footer');	
	}

	public function coordinadores() {

		$data = showLinks($_SESSION, 'Coordinadores');
		$data['parternType'] = basename(current_url());
		$data['lista'] = get_equipo_array($data['parternType']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('partners/coordinadores');
		$this->load->view('templates/footer');	
	}

	public function docentes() {

		$data = showLinks($_SESSION, 'Docentes');
		$data['parternType'] = basename(current_url());
		$data['lista'] = get_equipo_array($data['parternType']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('partners/coordinadores');
		$this->load->view('templates/footer');	
	}

	public function getData(){

		// create the data object
		$data = new stdClass();
		$data = showLinks($_SESSION, 'Equipo');

		$this->form_validation->set_rules('accept_terms_checkbox', '', 'callback_accept_terms');

		if ($this->form_validation->run() === false) {

			// validation not ok, send validation errors to the view			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('partners/index');
			$this->load->view('templates/footer');

		} else {
			
			// set variables from the form
			$array['dato']	= $this->input->post('dato[]');
			$data['parternType'] = $this->input->post('parternType');
			$data['lista'] 	= get_equipo_array($data['parternType'], $array['dato']);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('partners/'.$data['parternType'], $data);
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