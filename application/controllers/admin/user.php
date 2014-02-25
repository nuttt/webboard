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
		if(!$this->person_model->is_moderator2($person_id)){
			redirect('admin/user');
		}
		$data['tags'] = $this->tag_model->get_tags('name');
		$data['person'] = $this->person_model->get_person($person_id);
		//$data['mod_tags'] = $this->tag_mode->get_mod_tags($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/user/tag', $data);

	}

	public function remove_tag($person_id, $tag_id){

	}

	public function to_moderator($id){
		$person = $this->person_model->get_person_profile($id);
		$this->person_model->to_moderator($id);
		$this->session->set_flashdata('alert', 'Successfully set user <strong>'.$person->DISPLAY_NAME.'</strong> role to <strong>Moderator</strong>');
		redirect('admin/user');
	}

	public function to_admin($id){
		$person = $this->person_model->get_person_profile($id);
		$this->person_model->to_admin($id);
		$this->session->set_flashdata('alert', 'Successfully set user <strong>'.$person->DISPLAY_NAME.'</strong> role to <strong>Admin</strong>');
		redirect('admin/user');
	}

	public function to_member($id){
		$person = $this->person_model->get_person_profile($id);
		$this->person_model->to_member($id);
		$this->session->set_flashdata('alert', 'Successfully set user <strong>'.$person->DISPLAY_NAME.'</strong> role to <strong>Member</strong>');
		redirect('admin/user');
	}
	
}