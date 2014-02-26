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
		$data['Title'] = "All Topics";
		$data['sort_by'] = NULL;
		$data['tag_filter'] = NULL;
		if(isset($_GET['sortby'])){ 
			$data['sort_by'] = $_GET['sortby']; 
		}
		if(isset($_GET['tag_filter'])){ 
			$data['tag_filter'] = $_GET['tag_filter'];
			if($_GET['tag_filter']!='') $data['Title'] = $_GET['tag_filter']; 
		}
		$data['posts'] = $this->post_model->get_topics($data['sort_by'],$data['tag_filter']);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		
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
		$data['person_loggedin'] = get_user();
		$data['login_url'] = base_url('auth?return='.uri_string());
		$data['post'] = $this->post_model->get_content($post_id);
		if(!$data['post']){
			redirect('/');
		}
		$data['replies'] = $this->post_reply_model->get_nested_post_reply($post_id);
		$data['latest_replies'] = $this->post_reply_model->get_latest_reply(0);
		$data['related_tags'] = $this->tag_model->get_related_tag_by_topic($post_id);
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->post_model->incVisit($post_id);

		$data['reply_view'] = array();
		if($data['replies']){
			foreach($data['replies'][$post_id] as $reply){
				$rdata = array(
					'replies' => $data['replies'],
					'reply' => $reply,
					'post' => $data['post'],
					'person_loggedin' => $data['person_loggedin'],
					'login_url' => $data['login_url'],
					'topic_id' => $data['post']->POST_ID
				);
				$data['reply_view'][] = $this->load->view('post/reply-element', $rdata, TRUE);
			}
		}
		if(isset($_GET['report'])){ 
			$data['report'] = $_GET['report']; 
		}
		$this->load->view('post/view', $data);
	}

	public function create() {
		person_login();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[256]');
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[10]|max_length[2000]');
		$this->form_validation->set_rules('tag', 'Tag', 'required');

		$person_id = $this->session->userdata('person_id');

		date_default_timezone_set('Asia/Bangkok');
		$dt = new DateTime();
		$post_date = date('Y-m-d H:i:s',time());

		if($this->form_validation->run()) {
			$post_data = array(
				'person_id' => $person_id,
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'tag' => $this->input->post('tag'),
				'status' => 1,
				'time' => $post_date
			);

			// echo $post_date;
			$post_id = $this->post_model->create($post_data);
			redirect(base_url('post/view/'.$post_id));
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

	public function vote_up($post_id){
		$this->load->model('vote_model');
		$person_id = get_person_id($this);
		$this->vote_model->vote_up($person_id, $post_id);
		$this->session->set_flashdata('alert', 'Successfully up-voted post ID#'.$post_id);
		redirect($this->input->get('return'));
	}

	public function vote_down($post_id){
		$this->load->model('vote_model');
		$person_id = get_person_id($this);
		$this->vote_model->vote_down($person_id, $post_id);
		$this->session->set_flashdata('alert', 'Successfully down-voted post ID#'.$post_id);
		redirect($this->input->get('return'));
	}

	public function report($post_id){
		$this->load->model('report_model');
		$person_id = get_person_id($this);
		$this->report_model->add_report($person_id, $post_id);
		$this->session->set_flashdata('alert', 'Successfully reported post ID#'.$post_id);
		redirect($this->input->get('return'));
	}
	
	public function reply($topic_id, $reply_id){
		$this->load->model('post_reply_model');
		echo $this->post_reply_model->reply($_POST['content'], $this->session->userdata('person_id'), $topic_id, $reply_id);
		redirect('post/view/'.$topic_id);
	}

	public function edit($post_id) {
		person_login();

		$data['post'] = $this->post_model->get_content($post_id);

		$related_tags= $this->tag_model->get_related_tag_by_topic($post_id);
		foreach($related_tags as $related_tag) {
			$data['related_tags'][] = $related_tag->TAG_ID;
		}
		
		$tags = $this->tag_model->get_tags();
		$data['tags'] = array();
		foreach($tags as $tag) {
			$data['tags'][$tag->TAG_ID] = $tag->NAME;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[256]');
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[10]|max_length[2000]');
		$this->form_validation->set_rules('tag', 'Tag', 'required');

		if($this->form_validation->run()) {
			$post_data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'tag' => $this->input->post('tag'),
				'status' => 1,
				'post_id' => $post_id
			);

			$post_id = $this->post_model->edit($post_data, 0);
			// var_dump($post_data);
			redirect(base_url('post/view/'.$post_id));
		}

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('post/edit_topic', $data);
	}

	public function edit_reply($post_id) {
		person_login();

		$data['reply'] = $this->post_model->get_reply_post($post_id);
		$topic_id = $data['reply']->TOPIC_ID;
		$data['post'] = $this->post_model->get_content($topic_id);
		// var_dump($data['post']);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if($this->form_validation->run()) {
			$post_data = array(
				'content' => $this->input->post('content'),
				'post_id' => $post_id
			);

			$this->post_model->edit($post_data, 1);
			redirect(base_url('post/view/'.$topic_id));
		}

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('post/edit_post', $data);
	}

	function remove($topic_id, $post_id){
		$this->post_model->remove($post_id);
		if($topic_id != $post_id){
			redirect(base_url('post/view/'.$topic_id));
		} else {
			redirect(base_url('post/'));
		}
	}

}
