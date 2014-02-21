<?php
class Post_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();

	}

	function get_topics(){
		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
		$post_query = $this->db->query("SELECT PERSON.PERSON_ID, POST.POST_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI')AS TIME, POST_TOPIC.TITLE, PERSON.DISPLAY_NAME FROM POST INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID INNER JOIN PERSON ON PERSON.PERSON_ID = POST.PERSON_ID");
		$posts = $post_query->result();
		foreach($posts as $post){
			$post->TAGS = $this->tag_model->get_tag($post->POST_ID);
			$post->COUNT_REPLY = $this->post_reply_model->get_count_reply($post->POST_ID);
		}
		
		return $posts;

	}

	function get_topics_with_tag($tag_ID){
		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
		$post_query = $this->db->query("SELECT PERSON.PERSON_ID, POST.POST_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI')AS TIME, POST_TOPIC.TITLE, PERSON.DISPLAY_NAME " .
			"FROM POST " .
			"INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID " .
			"INNER JOIN PERSON ON PERSON.PERSON_ID = POST.PERSON_ID " .
			"INNER JOIN TOPIC_TAG ON POST.POST_ID = TOPIC_TAG.TOPIC_ID AND TOPIC_TAG.TAG_ID = " . $tag_ID);

		$posts = $post_query->result();
		foreach($posts as $post){
			$post->TAGS = $this->tag_model->get_tag($post->POST_ID);
			$post->COUNT_REPLY = $this->post_reply_model->get_count_reply($post->POST_ID);
		}
		
		return $posts;
	}

	function get_content($post_id) {
		$post_query = $this->db->query("SELECT POST_TOPIC.TITLE, POST.CONTENT " .
			"FROM POST " .
			"INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID AND POST.POST_ID = " . $post_id);

		return $post_query->result();
	}
}