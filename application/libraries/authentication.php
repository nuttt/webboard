<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Authentication {

	public function person_login(){
		session_start();
		if(!isset($_SESSION['person_id'])){ // hasn't logged in
			redirect('auth');
		}
		else{ // logged in, return person object
			$CI =& get_instance();
			$CI->load->model('person_model');
			return $CI->person_model->get_person($_SESSION['person_id']);
		}
	}

}