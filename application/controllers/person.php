<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		$this->header = get_header_data();
		$this->load->model('person_model');
		$this->load->model('post_model');
		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
	}

	public function profile($person_id){
		$data['sort_by'] = NULL;
		$data['tag_filter'] = NULL;
		if(isset($_GET['sortby'])){ 
			$data['sort_by'] = $_GET['sortby']; 
		}
		if(isset($_GET['tag_filter'])){ 
			$data['tag_filter'] = $_GET['tag_filter']; 
		}
		
		$data['topics'] = $this->post_model->get_topics_with_person($person_id,$data['sort_by'],$data['tag_filter']);
		$data['person'] = $this->person_model->get_person_profile($person_id);
		$data['latest_replies']= $this->post_reply_model->get_latest_reply(0,$person_id);
		$data['tags'] = $this->tag_model->get_tags();
		$data['top_tags'] = $this->tag_model->get_top_tag_used($person_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('person/profile',$data);
	

	}
	public function edit(){
		$map = array(
			'name' => 'DISPLAY_NAME',
			'password' => 'PASSWORD',
			'birthdate' => 'BIRTHDATE',
			'twitter' => 'TWITTER',
			'facebook' => 'FACEBOOK',
			'email' => 'EMAIL',
			'picture' => 'AVARTAR'
			);
		person_login();
		$success = false;
		$this->load->model('person_model');
		$person_id = $this->session->userdata('person_id');
		$data['profile'] = $this->person_model->get_person($person_id);
		$name = $data['profile']->DISPLAY_NAME;
		$email = $data['profile']->EMAIL;
		//------------------------------------------------
		$this->load->model('signup');
		$this->load->library('form_validation');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]|min_length[8]|max_length[45]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		

		if(!isset($_POST['name']))$this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]|max_length[45]|xss_clean');
		else if($name!=$_POST['name'])$this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]|max_length[45]|xss_clean|callback_username_check');
		else $this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]|max_length[45]|xss_clean');
		
		if(!isset($_POST['email']))$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		elseif($email!=$_POST['email'])$this->form_validation->set_rules('email', 'Email', 'trim|required|matches[password2]|min_length[8]|max_length[45]|callback_email_check');
		else $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		// $this->form_validation->set_message('username_check','Member is already used!');
		// $this->form_validation->set_message('email_check','Email is already used!');

		$map = array(
			'name' => 'DISPLAY_NAME',
			'password' => 'PASSWORD',
			'birthdate' => 'BIRTHDATE',
			'twitter' => 'TWITTER',
			'facebook' => 'FACEBOOK',
			'email' => 'EMAIL'
			);
		
		if($this->form_validation->run() != false){
			//if($this->signup->check_name($_POST['name'])&&$this->signup->check_email($_POST['email'])){
				$tmp = $this->signup->add_picture();
				// if(isset($tmp['upload_data'])){
					foreach ($map as $key => $value) {
						# code...
						$person[$value] = $_POST[$key];
					}
					$this->load->model('person_model');
					$person['AVATAR'] = $tmp['upload_data']['file_name'];
					$co = $this->signup->edit_person($person_id,$person);
					$success = true;
					$this->session->set_flashdata('alert', 'Successfully updated profile.');
					redirect('/');	
				// }
			//}
		}
		// $data['type'] = 'edit';
		$data['type'] = 'edit';
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		
		$this->load->view('auth/signup', $data);

	}
	
	public function edit_all($id){
		$map = array(
			'name' => 'DISPLAY_NAME',
			'password' => 'PASSWORD',
			'birthdate' => 'BIRTHDATE',
			'twitter' => 'TWITTER',
			'facebook' => 'FACEBOOK',
			'email' => 'EMAIL',
			'picture' => 'AVARTAR'
			);
		admin_login();
		$success = false;
		$this->load->model('person_model');
		$person_id = $id;
		$data['profile'] = $this->person_model->get_person($person_id);
		$name = $data['profile']->DISPLAY_NAME;
		$email = $data['profile']->EMAIL;
		//------------------------------------------------
		$this->load->model('signup');
		$this->load->library('form_validation');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]|min_length[8]|max_length[45]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		

		if(!isset($_POST['name']))$this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]|max_length[45]|xss_clean');
		else if($name!=$_POST['name'])$this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]|max_length[45]|xss_clean|callback_username_check');
		else $this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]|max_length[45]|xss_clean');
		
		if(!isset($_POST['email']))$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		elseif($email!=$_POST['email'])$this->form_validation->set_rules('email', 'Email', 'trim|required|matches[password2]|min_length[8]|max_length[45]|callback_email_check');
		else $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		// $this->form_validation->set_message('username_check','Member is already used!');
		// $this->form_validation->set_message('email_check','Email is already used!');

		$map = array(
			'name' => 'DISPLAY_NAME',
			'password' => 'PASSWORD',
			'birthdate' => 'BIRTHDATE',
			'twitter' => 'TWITTER',
			'facebook' => 'FACEBOOK',
			'email' => 'EMAIL'
			);
		
		if($this->form_validation->run() != false){
			//if($this->signup->check_name($_POST['name'])&&$this->signup->check_email($_POST['email'])){
				$tmp = $this->signup->add_picture();
				// if(isset($tmp['upload_data'])){
					foreach ($map as $key => $value) {
						# code...
						$person[$value] = $_POST[$key];
					}
					$this->load->model('person_model');
					$person['AVATAR'] = $tmp['upload_data']['file_name'];
					$co = $this->signup->edit_person($person_id,$person);
					$success = true;
					$this->session->set_flashdata('alert', 'Successfully updated profile.');
					redirect('/');	
				// }
			//}
		}
		// $data['type'] = 'edit';
		$data['type'] = 'edit';
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		
		$this->load->view('auth/signup', $data);

	}

	public function remove(){
		$person = $this->person_model->get_person($this->session->userdata('person_id'));
		$result = $this->person_model->remove_person($this->session->userdata('person_id'));
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert', 'Successfully removed user <strong>'.$person->DISPLAY_NAME.'</strong>');
		redirect('/');
	}
	
}