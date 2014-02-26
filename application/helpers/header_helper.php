<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function get_header_data(){
	$data['user'] = get_user();
	return $data;
}

function get_person_id2(){
	$CI =& get_instance();
	return $CI->session->userdata('person_id');		
}

function get_person_id($CI){
	return $CI->session->userdata('person_id');
}

function is_not_banned($id){
	$CI =& get_instance();
	$CI->load->model('ban_model');
	$current_ban_num = $CI->ban_model->get_current_user_bans_num($id);
	if($current_ban_num > 0){
		return false;
	}
	return true;
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

function get_mod_tags(){
	$CI =& get_instance();
	$CI->load->model('tag_model');
	return $CI->tag_model->get_mod_tags(get_person_id($CI));	
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

function is_moderator2(){
	$CI =& get_instance();
	$CI->load->model('person_model');
	if($person_id = get_person_id($CI)){
		return $CI->person_model->is_moderator2($person_id);
	}
	return false;
}

function is_moderator($topic_id){
	$CI =& get_instance();
	$CI->load->model('person_model');
	if($person_id = get_person_id($CI)){
		return $CI->person_model->is_moderator($person_id,$topic_id);
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

function moderator_login(){
	person_login();
	if(!is_moderator2()){
		redirect('/');
	}
}

function moderator_admin_login(){
	person_login();
	if(!(is_moderator2() || is_admin())){
		redirect('/');
	}
}

function is_person($id){
	$CI =& get_instance();
	if($id == get_person_id($CI)) return true;
	return false;
}