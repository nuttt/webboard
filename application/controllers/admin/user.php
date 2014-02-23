<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		admin_login();
		$this->header = get_header_data();
		$this->load->model('person_model');
	}

	public function index(){
		$data['users']['Members'] = $this->person_model->get_members();
		$data['users']['Moderators'] = $this->person_model->get_moderators();
		$data['users']['Administrators'] = $this->person_model->get_admins();
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/user/index', $data);
	}

	public function ban($person_id){
		$data['bans'] = $this->ban_model->get_user_bans($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/user/ban', $data);
	}

}