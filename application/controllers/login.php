<?php
class Login extends CI_Controller {

	function index(){
		// if(!is_login()){
		// 	redirect('/', 'refresh');
		// }
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$this->load->view('login/index', $data);
	}

}