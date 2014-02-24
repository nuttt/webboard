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
		date_default_timezone_set('Asia/Bangkok');
	}

	public function index() {
		redirect('admin/dashboard');
	}

	public function person($person_id = false){
		if(!$person_id){
			redirect('admin/dashboard');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start-date', 'Start date', 'required');
		$this->form_validation->set_rules('end-date', 'End date', 'required');
		$this->form_validation->set_rules('start-time', 'Start time', 'required');
		$this->form_validation->set_rules('end-time', 'End time', 'required');

		$ban_data = array();
		if($this->form_validation->run()){
			$ban_data['start_date'] = $this->input->post('start-date') . " " . $this->input->post('start-time'); 
			$ban_data['end_date'] = $this->input->post('end-date') . " " . $this->input->post('end-time'); 
			$ban_data['admin_id'] = $this->session->userdata('person_id');
			$ban_data['person_id'] = $person_id;

			$this->ban_model->set_user_ban($ban_data);
			$this->session->set_flashdata('alert', 'Successfully added ban.');
			redirect('admin/ban/person/'.$person_id);
		}
		// if(isset($_GET['start-date']) && isset($_GET['start-time']) && isset($_GET['end-date']) && isset($_GET['end-time'])){ 
		// 	$ban_data['start_date'] = $_GET['start-date'] . " " . $_GET['start-time']; 
		// 	$ban_data['end_date'] = $_GET['end-date'] . " " . $_GET['end-time']; 
		// 	$ban_data['admin_id'] = $this->session->userdata('person_id');
		// 	$ban_data['person_id'] = $person_id;

		// 	$this->ban_model->set_user_ban($ban_data);
		// 	redirect('admin/ban/person/'.$person_id);
		// }
		
		$data['start_date'] = date('Y-m-d');
		$data['start_time'] = date('H:i');
		$tmr = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
		$end = mktime(0, 0, 0, date("m"), date("d")+7, date("Y"));
		$data['tmr_date'] = date('Y-m-d', $tmr);
		$data['end_date'] = date('Y-m-d', $end);
		$data['end_time'] = date('H:i');

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
		$this->session->set_flashdata('alert', 'Successfully removed ban.');
		redirect('admin/ban/person/'.$person_id);
	}

	public function view($ban_log_id = false){
		if(!$ban_log_id){
			redirect('admin/dashboard');
		}
		$person_id = $this->ban_model->get_person_id_from_banlog($ban_log_id);
		$data['ban'] = $this->ban_model->get_ban($ban_log_id);
		$start_date = strtotime($data['ban']->START_DATE);
		$end_date = strtotime($data['ban']->END_DATE);
		$data['start_date'] = date('Y-m-d', $start_date);
		$data['start_time'] = date('H:i', $start_date);
		$data['end_date'] = date('Y-m-d', $end_date);
		$data['end_time'] = date('H:i', $end_date);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start-date', 'Start date', 'required');
		$this->form_validation->set_rules('end-date', 'End date', 'required');
		$this->form_validation->set_rules('start-time', 'Start time', 'required');
		$this->form_validation->set_rules('end-time', 'End time', 'required');

		if($this->form_validation->run()){
			$ban_data = array();
			$ban_data['start_date'] = $this->input->post('start-date') . " " . $this->input->post('start-time'); 
			$ban_data['end_date'] = $this->input->post('end-date') . " " . $this->input->post('end-time'); 
			$ban_data['admin_id'] = $this->session->userdata('person_id');
			$ban_data['person_id'] = $person_id;
			$ban_data['ban_log_id'] = $ban_log_id;

			$this->ban_model->update_user_ban($ban_data);
			$this->session->set_flashdata('alert', 'Successfully edited ban ('.$ban_data['start_date'].' - '.$ban_data['end_date'].')');
			redirect('admin/ban/person/'.$person_id);

		}


		$data['person'] = $this->person_model->get_person_profile($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/ban/view', $data);
	}
}