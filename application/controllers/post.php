<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		//person_login();
		$this->header = get_header_data();
		$this->load->model('post_model');
		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
	}

	public function index(){
		$data['posts'] = $this->post_model->get_topics();
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$data['Title'] = "All Topics";
		$data['ListOfTag'] = $this->tag_model->get_tags();
		$this->load->view('post/index', $data);
	}

	public function tag($tag_ID ="0"){
		$data['Title'] = $this->tag_model->get_name($tag_ID);
		if($data['Title'] == false) {
			$data['Title'] = "All Topics";
			$data['posts'] = $this->post_model->get_topics($tag_ID);
		}
		else $data['posts'] = $this->post_model->get_topics_with_tag($tag_ID);

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$data['ListOfTag'] = $this->tag_model->get_tags();
		$this->load->view('post/index', $data);
	}

	public function view($post_id) {
		$data['post'] = $this->post_model->get_content($post_id);
		$data['replies'] = $this->post_reply_model->get_post_reply($post_id);

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('post/content', $data);
	}


}