<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function index(){
		// if(!is_login()){
		// 	redirect('/', 'refresh');
		// }
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		if($this->form_validation->run() != false){
			//validation passed
		}
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$this->load->view('login/index', $data);
	}

}