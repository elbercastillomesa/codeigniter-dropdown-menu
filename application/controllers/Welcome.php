<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Dropdown_model', 'menu_model', TRUE);
	}

	public function index()
	{
		$data['title'] = 'Dropdown Bootstrap Template';


		if (true){//(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
					
			$data['dropdown'] = $this->menu_model->dropdown_menu('1');
			$data['dropdown_items'] = $this->menu_model->dropdown_menu_item('1');
					
		} else {
			
			$data['dropdown'] = $this->menu_model->dropdown_menu('0');
			$data['dropdown_items'] = $this->menu_model->dropdown_menu_item('0');
		}

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
