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
	public function edit(){
		$map = array(
			'name' => 'DISPLAY_NAME',
			'password' => 'PASSWORD',
			'birthdate' => 'BIRTHDATE',
			'twitter' => 'TWITTER',
			'facebook' => 'FACEBOOK',
			'email' => 'EMAIL',
			'picture' => 'AVARTAR'
			);
		person_login();
		$this->load->model('person_model');
		$id = $this->session->userdata('person_id');
		$data['profile'] = $this->person_model->get_person($id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('person/edit',$data);

	}
	public function edit_all($id){
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('person/edit',$data);

	}
	
}