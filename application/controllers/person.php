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
		$this->load->model('post_model');
		$this->load->model('tag_model');
	}

	public function profile($person_id){
		$data['sort_by'] = NULL;
		$data['tag_filter'] = NULL;
		if(isset($_GET['sortby'])){ 
			$data['sort_by'] = $_GET['sortby']; 
		}
		if(isset($_GET['tag_filter'])){ 
			$data['tag_filter'] = $_GET['tag_filter']; 
		}
		
		$data['topics'] = $this->post_model->get_topics_with_person($person_id,$data['sort_by'],$data['tag_filter']);
		$data['person'] = $this->person_model->get_person_profile($person_id);
		
		$data['tags'] = $this->tag_model->get_tags();

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('person/profile',$data);
	

	}
	
}