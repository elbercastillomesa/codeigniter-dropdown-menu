<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('Dropdown_model', 'menu_model', TRUE);
		$this->load->helper('navbar_helper');
	}

	public function index()
	{
		$data = showLinks($_SESSION, 'Dropdown Bootstrap Template');		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('landing/home');
		$this->load->view('templates/footer');
	}

	public function test()
	{

		$data['title'] = 'Dropdown Bootstrap Template';
		$this->load->view('templates/header', $data);
		//$this->load->view('templates/navbar', $data);		
		$this->load->view('landing/home');
		$this->load->view('templates/footer');
	}
}
