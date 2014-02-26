<?php
class Post_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();

	}

	function get_topics($sort_by = 'date',$tag_filter){
		$sort = "";
		switch ($sort_by) {
			case 'views':
				$sort = 'VISIT DESC';
				break;
			
			case 'votes':
				$sort = 'VOTE DESC';
				break;

			default:
				$sort = 'TIME DESC';
				break;
		}
		
		$filter='';
		if($tag_filter!=NULL){
			$filter = "INNER JOIN TOPIC_TAG ON POST.POST_ID = TOPIC_TAG.TOPIC_ID INNER JOIN TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID AND TAG.NAME = '".$tag_filter."' ";
			
		}
		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
		$q = "SELECT PERSON.PERSON_ID, POST.POST_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI')AS TIME, POST_TOPIC.TITLE, PERSON.DISPLAY_NAME, POST_TOPIC.VISIT FROM POST INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID INNER JOIN PERSON ON PERSON.PERSON_ID = POST.PERSON_ID ".$filter." ORDER BY ".$sort;
		$post_query = $this->db->query($q);
		$this->session->set_flashdata('query', $q);
		$posts = $post_query->result();
		foreach($posts as $post){
			$post->TAGS = $this->tag_model->get_tag($post->POST_ID);
			$post->COUNT_REPLY = $this->post_reply_model->get_count_reply($post->POST_ID);
		}
		
		return $posts;

	}
	// sort_by: 0->time, 1->view, 2->
	function get_topics_with_person($person_id,$sort_by = 'date',$tag_filter){

		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
		$sort = "";
		switch ($sort_by) {
			case 'views':
				$sort = 'VISIT DESC';
				break;
			
			case 'votes':
				$sort = 'VOTE DESC';
				break;

			default:
				$sort = 'TIME DESC';
				break;
		}
		
		$filter='';
		if($tag_filter!=NULL){
			$filter = "INNER JOIN TOPIC_TAG ON POST.POST_ID = TOPIC_TAG.TOPIC_ID INNER JOIN TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID AND TAG.NAME = '".$tag_filter."' ";
			
		}
		$q = "SELECT PERSON.PERSON_ID, POST.POST_ID, 
					to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI')AS TIME, 
					POST_TOPIC.TITLE, PERSON.DISPLAY_NAME, POST_TOPIC.VISIT,
					CASE WHEN sum(VOTES.STATUS) IS NULL THEN 0 ELSE sum(VOTES.STATUS) END 
					AS VOTE
					FROM POST 
					INNER JOIN PERSON ON PERSON.PERSON_ID = POST.PERSON_ID AND PERSON.PERSON_ID = "
					.$person_id.$filter.
					" INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID 
					LEFT  JOIN VOTES ON POST.POST_ID = VOTES.POST_ID
					GROUP BY PERSON.PERSON_ID, POST.POST_ID, 
					to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI'), 
					POST_TOPIC.TITLE, PERSON.DISPLAY_NAME, POST_TOPIC.VISIT
					ORDER BY ".$sort;
		$topic_query = $this->db->query($q);
		$this->sesssion->set_flashdata('query', $q);
		$topics = $topic_query->result();
		foreach($topics as $topic){
			$topic->TAGS = $this->tag_model->get_tag($topic->POST_ID);
			$topic->COUNT_REPLY = $this->post_reply_model->get_count_reply($topic->POST_ID);
		}
		
		return $topics;
	}

	

	function get_topics_with_tag($tag_ID){
		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
		$q = "SELECT PERSON.PERSON_ID, POST.POST_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI')AS TIME, POST_TOPIC.TITLE, PERSON.DISPLAY_NAME " .
			"FROM POST " .
			"INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID " .
			"INNER JOIN PERSON ON PERSON.PERSON_ID = POST.PERSON_ID " .
			"INNER JOIN TOPIC_TAG ON POST.POST_ID = TOPIC_TAG.TOPIC_ID AND TOPIC_TAG.TAG_ID = " . $tag_ID;
		$post_query = $this->db->query($q);
		$this->sesssion->set_flashdata('query', $q);

		$posts = $post_query->result();
		foreach($posts as $post){
			$post->TAGS = $this->tag_model->get_tag($post->POST_ID);
			$post->COUNT_REPLY = $this->post_reply_model->get_count_reply($post->POST_ID);
		}
		
		return $posts;
	}

	function get_content($post_id) {
		// $post_query = $this->db->query("SELECT POST_TOPIC.TITLE, POST.CONTENT " .
			// "FROM POST " .
			// "INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID AND POST.POST_ID = " . $post_id);
		$this->load->model('tag_model');
		$this->load->model('post_reply_model');
		$post_query = $this->db->query("SELECT PERSON.PERSON_ID, POST.POST_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI')AS TIME, POST_TOPIC.TITLE, PERSON.DISPLAY_NAME, PERSON.AVATAR, CASE WHEN sum(VOTES.STATUS) IS NULL THEN 0 ELSE sum(VOTES.STATUS) END 
										AS VOTE, POST.CONTENT  
										FROM POST 
										INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID AND POST.POST_ID = ".$post_id.
										"INNER JOIN PERSON ON PERSON.PERSON_ID = POST.PERSON_ID 
										LEFT  JOIN VOTES ON POST.POST_ID = VOTES.POST_ID
										GROUP BY PERSON.PERSON_ID, POST.POST_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI'), POST_TOPIC.TITLE, PERSON.DISPLAY_NAME, POST.CONTENT, PERSON.AVATAR");
		$post_query->first_row()->TAGS = $this->tag_model->get_tag($post_id);
		$post_query->first_row()->COUNT_REPLY = $this->post_reply_model->get_count_reply($post_id);
		
		return $post_query->first_row();
	}

	function get_topic_num(){
		$query = $this->db->query("SELECT count(*) as num FROM post_topic");
		return $query->row()->NUM;
	}

	function get_post_num(){
		$query = $this->db->query("SELECT count(*) as num FROM post");
		return $query->row()->NUM;

	}

	function create($post_data) {
		$q = "";
		$q_post = "INSERT INTO POST (CONTENT, TIME, STATUS, PERSON_ID) values ('".$post_data['content']."', systimestamp, ".$post_data['status'].", ".$post_data['person_id'].")";
		$q .= $q_post;
		$this->db->query($q_post);
		$query = $this->db->query("SELECT POST_ID FROM POST WHERE ROWNUM = 1 ORDER BY POST_ID DESC");
		$post_id = $query->first_row()->POST_ID;

		$q_post_topic = "INSERT INTO POST_TOPIC (POST_ID, TITLE, VISIT) values ($post_id, '".$post_data['title']."', 0)";
		$this->db->query($q_post_topic);
		$q .= "<br>".$q_post_topic;

		foreach($post_data['tag'] as $tag) {
			$q_topic_tag =  "INSERT INTO TOPIC_TAG (TOPIC_ID, TAG_ID) values ($post_id, ".$tag.")";
			$this->db->query($q_topic_tag);
			$q .= "<br>".$q_topic_tag;
		}

		$this->sesssion->set_flashdata('query2', $q);
		return $post_id;
	}

	// get content of reply by post_id
	function get_reply_post($post_id) {
		$query = $this->db->query("SELECT PR.TOPIC_ID, PT.TITLE, POST.POST_ID, CONTENT, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI'), POST.PERSON_ID
							FROM POST 
							INNER JOIN POST_REPLY PR on POST.POST_ID = PR.POST_ID
							INNER JOIN POST_TOPIC PT on PT.POST_ID = PR.TOPIC_ID
							WHERE POST.POST_ID=$post_id");
		//var_dump($query->result());
		return $query->first_row();
	}

	//type 0:topic 1:reply
	function edit($post_data,$type){
		$q_post = "UPDATE POST 
					SET CONTENT = '".$post_data['content']."'
						WHERE POST_ID = ".$post_data['post_id'];
		$this->db->query($q_post);
		// echo $q_post . '<br>';
		if ($type == 0) {

			$this->db->query("UPDATE POST_TOPIC	SET TITLE = '".$post_data['title']."' WHERE POST_ID=". $post_data['post_id']);
			// echo "UPDATE POST_TOPIC	SET TITLE = '".$post_data['title']."' WHERE POST_ID=". $post_data['post_id'] . '<br>';
			$this->db->query("DELETE FROM TOPIC_TAG WHERE TOPIC_ID = ".$post_data['post_id']);
			// echo "DELETE FROM TOPIC_TAG WHERE TOPIC_ID = ".$post_data['post_id'] . '<br>';
			foreach($post_data['tag'] as $tag) {
				$q_topic_tag =  "INSERT INTO TOPIC_TAG (TOPIC_ID, TAG_ID) values (".$post_data['post_id']. ", $tag)";
				$this->db->query($q_topic_tag);
			}
		}

		return $post_data['post_id'];
	} 

	function incVisit($topic_id){
		$oldTopic=$this->db->query("SELECT VISIT FROM POST_TOPIC WHERE POST_ID = ".$topic_id)->first_row();
		$newVisit = $oldTopic->VISIT+1;
		$this->db->query("UPDATE POST_TOPIC set VISIT = ".$newVisit." WHERE POST_ID = ".$topic_id);
	}

	function remove($post_id){
		$rm_query = "DELETE FROM POST WHERE POST_ID=".$post_id;
		$this->db->query($rm_query);

		$q = $rm_query;

		$cleanup_query = "delete from post
		where post_id not in (select post_id from post_topic)
		and post_id not in (select post_id from post_reply)";
		$this->db->query($rm_query);
		$this->session->set_flashdata('message', 'Your post was deleted.');

		$q .= "<br>".$cleanup_query;

		$this->sesssion->set_flashdata('query2', $q);

	}

}