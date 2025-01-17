<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('Dropdown_model', 'menu_model', TRUE);
		$this->load->helper('navbar');
	}

	public function index()
	{		
		$data = showLinks($_SESSION, 'Descargar Reportes');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('reports/general');
		$this->load->view('templates/footer');
	}

	public function students()
	{		
		$data = showLinks($_SESSION, 'Descargar Reportes');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('landing/home');
		$this->load->view('templates/footer');
	}
}