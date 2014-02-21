<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		session_start();
		$this->header = get_header_data();
	}

	public function commitsignup(){
		// echo "sdaf";
		// $pass = $this->input->post('password');
		// $name = $this->input->post('name');
		// $email = $this->input->post('email');
		// $birth = $this->input->post('birthdate');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		
		if($this->form_validation->run() != false){
			redirect($this->input->get('return'));
			// $data['header'] = $this->load->view('header', $this->header, TRUE);
			// $data['footer'] = $this->load->view('footer', $this->footer, TRUE);
			// $this->load->view('auth/signup', $data);
		}
		//echo "fdsa";
		// $data['header'] = $this->load->view('header', $this->header, TRUE);
		// 	$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		// 	$this->load->view('auth/signup', $data);

		// if($pass == ''||
		//    $pass != $this->input->post('password2')||
		//    $email == ''||
		//    $name == '' ||
		//    $birth == '' 
		//    ) {
		// 	$data['header'] = $this->load->view('header', $this->header, TRUE);
		// 	$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		// 	$this->load->view('auth/signup', $data);
			
		// }else{
		// 	// echo "asdf";

		// }

		

		// if()
		// echo $this->input->post('name')."<br/>";
		// echo $this->input->post('email')."<br/>";
		// echo $this->input->post('birthdate')."<br/>";
		// echo $this->input->post('picture')."<br/>";
		// echo $this->input->post('password')."<br/>";
		// echo $this->input->post('password2')."<br/>";
		// $data['header'] = $this->load->view('header', $this->header, TRUE);
		// $data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		// $this->load->view('auth/signup', $data);
	}

	public function index(){
		if(isset($_SESSION['person_id'])){
			redirect('/');
		}
		$this->load->library('form_validation');
		$this->load->model('person_model');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		if($this->form_validation->run() != false){
			$person = $this->person_model->verify_person($this->input->post('email'), $this->input->post('password'));
			if($person){
				$_SESSION['person_id'] = $person->PERSON_ID;
				redirect($this->input->get('return'));
			}
		}
		$data['return'] = $this->input->get('return');
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('auth/index', $data);
	}

	public function signout(){
		session_destroy();
		redirect($this->input->get('return'));
	}
	public function signup(){

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('auth/signup', $data);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('facebook', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$map = array(
			'name' => 'DISPLAY_NAME',
			'password' => 'PASSWORD',
			'birthdate' => 'BIRTHDATE',
			'twitter' => 'TWITTER',
			'facebook' => 'FACEBOOK',
			'email' => 'EMAIL'
			);
		
		if($this->form_validation->run() != false){
			// $data['header'] = $this->load->view('header', $this->header, TRUE);
			// $data['footer'] = $this->load->view('footer', $this->footer, TRUE);
			// $this->load->view('topiclist', $data);
			//var_dump($_POST);
			$this->load->model('signup');
			foreach ($map as $key => $value) {
				# code...
				$person[$value] = $_POST[$key];
			}
			$co = $this->signup->add_person($person);
			echo $co;
			

			// $person = array(
			// 		'DISPLAY_NAME'
			// 		'PASSWORD'
			// 		'AVARTAR'
			// 		'BIRTHDATE'

			// 	);
			// $this->signup->add_person();
			//redirect($this->input->get('return'));
			
		}
		else{
			
		}


	}

}
