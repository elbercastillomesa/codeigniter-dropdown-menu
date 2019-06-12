<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('Dropdown_model', 'menu_model', TRUE);
	}

	public function index()
	{
		$data['dropdown'] = $this->menu_model->dropdown_menu();
		$data['dropdown_items'] = $this->menu_model->dropdown_menu_item();
		$this->load->view('home', $data);
	}
}
