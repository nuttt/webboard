<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TopicList extends CI_Controller {

	var $header;

	function __construct(){
		parent::__construct();
		$this->header['user'] = $this->authentication->person_login();
	}

	public function index(){
		$this->load->model('Person_model');
		$data['test'] = '';
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$this->load->view('topiclist/index', $data);
	}
}
