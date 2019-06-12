<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('Dropdown_model', 'menu_model', TRUE);
	}

	public function index()
	{
		$data['dropdown'] = $this->menu_model->dropdown_menu();
		$data['dropdown_items'] = $this->menu_model->dropdown_menu_item();
		$data['title'] = 'Dropdown Bootstrap Template';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);		
		$this->load->view('landing/home');
		$this->load->view('templates/footer');
	}
}