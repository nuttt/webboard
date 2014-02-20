<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TopicList extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		session_start();
		//person_login();
		$this->header = get_header_data();
	}

	public function index(){
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('topiclist/index', $data);
	}
}