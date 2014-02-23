<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function get_header_data(){
	$data['user'] = get_user();
	return $data;
}

function get_person_id($CI){
	return $CI->session->userdata('person_id');
}

function get_user(){
	$CI =& get_instance();
	
	if($person_id = get_person_id($CI)){ // has logged in
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

function is_admin(){
	$CI =& get_instance();
	$CI->load->model('person_model');
	if($person_id = get_person_id($CI)){
		return $CI->person_model->is_admin($person_id);
	}
	return false;
}

function person_login(){
	$CI =& get_instance();
	if(!$CI->session->userdata('person_id')){ // hasn't logged in
    redirect('auth?return='.uri_string());
  }
}

function admin_login(){
	person_login();
  if(!is_admin()){
  	redirect('/');
  }
}

function is_person($id){
	$CI =& get_instance();
	if($id == get_person_id($CI)) return true;
	return false;
}