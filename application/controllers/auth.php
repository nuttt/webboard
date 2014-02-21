<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		session_start();
		$this->header = get_header_data();
	}

	public function index(){
		if(isset($_SESSION['person_id'])){
			redirect('/');
		}
		$this->load->library('form_validation');
		$this->load->model('person_model');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		if($this->form_validation->run() != false){
			$person = $this->person_model->verify_person($this->input->post('email'), $this->input->post('password'));
			if($person){
				$_SESSION['person_id'] = $person->PERSON_ID;
				redirect($this->input->get('return'));
			}
		}
		$data['return'] = $this->input->get('return');
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('auth/index', $data);
	}

	public function signout(){
		session_destroy();
		redirect($this->input->get('return'));
	}

}
