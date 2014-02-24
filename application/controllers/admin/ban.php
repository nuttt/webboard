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

	public function index() {
		redirect('admin/dashboard');
	}

	public function person($person_id = false){
		if(!$person_id){
			redirect('admin/dashboard');
		}

		$ban_data = array();
		if(isset($_GET['start-date']) && isset($_GET['start-time']) && isset($_GET['end-date']) && isset($_GET['end-time'])){ 
			$ban_data['start_date'] = $_GET['start-date'] . " " . $_GET['start-time']; 
			$ban_data['end_date'] = $_GET['end-date'] . " " . $_GET['end-time']; 
			$ban_data['admin_id'] = $this->session->userdata('person_id');
			$ban_data['person_id'] = $person_id;

			$this->ban_model->set_user_ban($ban_data);
			redirect('admin/ban/person/'.$person_id);
		}
		


		$data['person'] = $this->person_model->get_person_profile($person_id);
		$data['bans'] = $this->ban_model->get_user_bans($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/ban/index', $data);

	}

	public function remove($ban_log_id = false){
		if(!$ban_log_id){
			redirect('admin/dashboard');
		}

		$person_id = $this->ban_model->get_person_id_from_banlog($ban_log_id);
		$this->ban_model->remove_user_ban($ban_log_id);
		redirect('admin/ban/person/'.$person_id);
	}

	public function view($ban_log_id = false){
		if(!$ban_log_id){
			redirect('admin/dashboard');
		}
		$person_id = $this->ban_model->get_person_id_from_banlog($ban_log_id);
		

		$ban_data = array();
		if(isset($_GET['start-date']) && isset($_GET['start-time']) && isset($_GET['end-date']) && isset($_GET['end-time'])){ 
			$ban_data['start_date'] = $_GET['start-date'] . " " . $_GET['start-time']; 
			$ban_data['end_date'] = $_GET['end-date'] . " " . $_GET['end-time']; 
			$ban_data['admin_id'] = $this->session->userdata('person_id');
			$ban_data['person_id'] = $person_id;
			$ban_data['ban_log_id'] = $ban_log_id;

			$this->ban_model->update_user_ban($ban_data);
			redirect('admin/ban/person/'.$person_id);
		}


		$data['person'] = $this->person_model->get_person_profile($person_id);
		$data['bans'] = $this->ban_model->get_user_bans($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/ban/view', $data);
	}
}