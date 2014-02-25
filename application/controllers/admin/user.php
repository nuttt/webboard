<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		admin_login();
		$this->header = get_header_data();
		$this->load->model('person_model');
	}

	public function index(){
		$data['users']['Members'] = $this->person_model->get_members();
		$data['users']['Moderators'] = $this->person_model->get_moderators();
		$data['users']['Administrators'] = $this->person_model->get_admins();
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/user/index', $data);
	}

	public function remove($id){
		$person = $this->person_model->get_person_profile($id);
		$result = $this->person_model->remove_person($id);
		$this->session->set_flashdata('alert', 'Successfully removed user <strong>'.$person->DISPLAY_NAME.'</strong>');
		redirect('admin/user');
	}

	public function tag($person_id){
		$this->load->model('tag_model');

	}

	public function remove_tag($person_id, $tag_id){

	}

	public function to_moderator($person_id){

	}

	public function to_admin($person_id){

	}

	public function to_member($person_id){

	}
	
}