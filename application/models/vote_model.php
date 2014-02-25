<?php
class Vote_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function find_vote($person_id, $post_id){
		$query = $this->db->query("SELECT * FROM vote WHERE person_id = $person_id AND post_id = $post_id");
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	function vote($person_id, $post_id, $value){
		$find_vote = $this->db->query("SELECT count(*) as NUM FROM ban_log WHERE end_date > systimestamp AND ban_log.person_id = $person_id");
		if($find_vote){
			update_vote($person_id, $post_id, $value);
		}
		else{
			add_vote($person_id, $post_id, $value);
		}
	}

	function add_vote($person_id, $post_id, $value){
		$this->db->query("INSERT INTO vote VALUES ($person_id, $post_id, $value)");
	}

	function update_vote($person_id, $post_id, $value){
		$this->db->query("UPDATE vote SET status = $value WHERE person_id = $person_id AND post_id = $post_id");
	}
	
	function vote_up($person_id, $post_id){
		vote($person_id, $post_id, 1);
	}
	
	function vote_down($person_id, $post_id){
		vote($person_id, $post_id, -1);
	}
	
}