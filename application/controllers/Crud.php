<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load member model
        $this->load->model('crud_model');
    }
    
    function index(){
        // Load the member list view
        $this->load->view('crud');
    }
    
    function getLists(){
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->member->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            $created = date( 'jS M Y', strtotime($member->created));
            $status = ($member->status == 1)?'Active':'Inactive';
            $data[] = array($i, $member->first_name, $member->last_name, $member->email, $member->gender, $member->country, $created, $status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->member->countAll(),
            "recordsFiltered" => $this->member->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
}