<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function person_login(){
	if(!isset($_SESSION['person_id'])){ // hasn't logged in
		redirect('auth?return='.uri_string());
	}
}