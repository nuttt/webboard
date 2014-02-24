<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		// session_start();
		$this->header = get_header_data();
		$this->load->model('ban_model');
	}

	
	public function index(){
		// if(isset($_SESSION['person_id'])){
		// 	redirect('/');
		// }
		if($this->session->userdata('person_id')){
			redirect('/');
		}
		$this->load->library('form_validation');
		$this->load->model('person_model');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		$data['error'] = '';
		if($this->form_validation->run()){
			$person = $this->person_model->verify_person($this->input->post('email'), $this->input->post('password'));
			if($person){
				if(is_not_banned($person->PERSON_ID)){
					$this->session->set_userdata('person_id', $person->PERSON_ID);
					redirect($this->input->get('return'));
				}
				else{
					$data['error'] = 'You are banned. Please contact admin.';
				}
			}
			else{
				$data['error'] = 'E-mail or password is incorrect.';
			}
		}
		$data['return'] = $this->input->get('return');
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('auth/index', $data);
	}

	public function signout(){

		$this->session->sess_destroy();
		redirect($this->input->get('return'));
	}
	public function username_check($check_name){
		return $this->signup->check_name($check_name);
	}
	public function email_check($check_email){
		return $this->signup->check_email($check_email);
	}

	public function signup(){


		// session_destroy();
		//$this->session->sess_destroy();
		$this->load->model('signup');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]|max_length[45]|xss_clean|callback_username_check');
		$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]|min_length[8]|max_length[45]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_message('username_check','Member is already used!');
		$this->form_validation->set_message('email_check','Email is already used!');

		$map = array(
			'name' => 'DISPLAY_NAME',
			'password' => 'PASSWORD',
			'birthdate' => 'BIRTHDATE',
			'twitter' => 'TWITTER',
			'facebook' => 'FACEBOOK',
			'email' => 'EMAIL'
			);
		
		if($this->form_validation->run() != false){
			$tmp = $this->signup->add_picture();
			if(isset($tmp['upload_data'])){
				foreach ($map as $key => $value) {
					# code...
					$person[$value] = $_POST[$key];
				}
				$this->load->model('person_model');
				$person['AVATAR'] = $tmp['upload_data']['file_name'];
				$co = $this->signup->add_person($person);
				$this->session->set_userdata('person_id', $co->row()->PERSON_ID);
				$success = true;	
			}
		}
		$data['type'] = 'signup';
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('auth/signup', $data);
		if(isset($success))
			redirect('/');

	}
		


	

}
