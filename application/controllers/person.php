<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		//session_start();
		//person_login();
		$this->header = get_header_data();
		$this->load->model('person_model');
	}

	public function profile($person_id){
		//$data['person'] = $this->person_model->get_person_profile($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('person/index',$data);
	}
	
}