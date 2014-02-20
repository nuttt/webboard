<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function get_header_data(){
	$data['user'] = get_user();
	return $data;
}

function get_user(){
	if(isset($_SESSION['person_id'])){ // has logged in
		$CI =& get_instance();
		$CI->load->model('person_model');
		return $CI->person_model->get_person($_SESSION['person_id']);
	}
	// hasn't logged in
	return false;
}