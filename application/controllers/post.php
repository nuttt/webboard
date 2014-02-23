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
		$data['sort_by'] = NULL;
		$data['tag_filter'] = NULL;
		if(isset($_GET['sortby'])){ 
			$data['sort_by'] = $_GET['sortby']; 
		}
		if(isset($_GET['tag_filter'])){ 
			$data['tag_filter'] = $_GET['tag_filter']; 
		}
		$data['posts'] = $this->post_model->get_topics($data['sort_by'],$data['tag_filter']);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$data['Title'] = "All Topics";
		$data['latest_replies'] = $this->post_reply_model->get_latest_reply();
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
		$data['latest_replies'] = $this->post_reply_model->get_latest_reply($tag_ID);
		$data['ListOfTag'] = $this->tag_model->get_tags();
		$this->load->view('post/index', $data);
	}

	public function view($post_id) {
		$data['post'] = $this->post_model->get_content($post_id);
		$data['replies'] = $this->post_reply_model->get_post_reply($post_id);
		$data['latest_replies'] = $this->post_reply_model->get_latest_reply(0);
		$data['related_tags'] = $this->tag_model->get_related_tag_by_topic($post_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('post/content', $data);
	}

	public function create() {
		person_login();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_rules('tag', 'Tag', 'required');

		$person_id = $this->session->userdata('person_id');

		$dt = new DateTime();
		$post_date = strtoupper($dt->format('d-M-y'));

		if($this->form_validation->run()) {
			echo "Pass";
			$post_data = array(
				'person_id' => $person_id,
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'tag' => $this->input->post('tag'),
				'status' => 1,
				'time' => $post_date
			);

			// $this->post_model->create($post_data);
		}

		$tags = $this->tag_model->get_tags();
		$data['tags'] = array();
		foreach($tags as $tag) {
			$data['tags'][$tag->TAG_ID] = $tag->NAME;
		}


		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('post/create', $data);

	}
}