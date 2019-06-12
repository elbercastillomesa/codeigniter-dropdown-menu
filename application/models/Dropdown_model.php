<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function dropdown_menu($id){

		$this->db->select('menu.m_id AS menu_id, menu.m_name, menu_item.m_id AS menu_item_id');
		$this->db->from('menu');
		$this->db->join('menu_item', 'menu.m_id = menu_item.m_id', 'left');
		$this->db->where('menu.m_session <= '.$id);
		$this->db->group_by('menu_id');
		$this->db->order_by('m_name', 'ASC');
		$query = $this->db->get();
		//echo PHP_EOL.$this->db->last_query().PHP_EOL;
		return $query->result();
	}

	public function dropdown_menu_item($id){

		$this->db->select('*');
		$this->db->from('menu_item');
		$this->db->order_by('m_item_name');
		$query = $this->db->get();
		return $query->result();
	}

}