<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		session_start();
		//person_login();
		$this->header = get_header_data();
		$this->load->model('post_model');
	}

	public function index(){
		$data['posts'] = $this->post_model->get_topics();
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('post/index', $data);
	}
}