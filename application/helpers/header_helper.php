<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function get_header_data(){
	$data['user'] = get_user();
	return $data;
}

function get_user(){
	$CI =& get_instance();
	$person_id = $CI->session->userdata('person_id');
	if($person_id){ // has logged in
		$CI->load->model('person_model');
		return $CI->person_model->get_person($person_id);
	}
	// hasn't logged in
	return false;
}

function get_tags(){
	$CI =& get_instance();
	$CI->load->model('tag_model');
	return $CI->tag_model->get_tags();	
}

function get_tags_with_topic_num(){
	$CI =& get_instance();
	$CI->load->model('tag_model');
	return $CI->tag_model->get_tags_with_topic_num();	
}