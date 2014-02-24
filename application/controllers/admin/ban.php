<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ban extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		admin_login();
		$this->header = get_header_data();
		$this->load->model('person_model');
		$this->load->model('ban_model');
	}

	public function person($person_id = false){
		if(!$person_id){
			redirect('admin/dashboard');
		}
		$data['person'] = $this->person_model->get_person_profile($person_id);
		$data['bans'] = $this->ban_model->get_user_bans($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/ban/index', $data);

	}
}