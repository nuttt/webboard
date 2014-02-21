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
		$this->load->model('tag_model');
	}

	public function index(){
		$data['posts'] = $this->post_model->get_topics();
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$data['Title'] = "All Topics";
		$data['ListOfTag'] = $this->tag_model->get_all();
		$this->load->view('post/index', $data);
	}

	public function tag($tag_ID = "0"){
		$data['posts'] = $this->post_model->get_topics_with_tag($tag_ID);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$data['Title'] = $this->tag_model->get_Name($tag_ID);
		$data['ListOfTag'] = $this->tag_model->get_all();
		$this->load->view('post/index', $data);
	}
}