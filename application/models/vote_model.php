<?php
class Vote_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function find_vote($person_id, $post_id){
		$query = $this->db->query("SELECT * FROM votes WHERE person_id = $person_id AND post_id = $post_id");
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	function vote($person_id, $post_id, $value){
		if($this->find_vote($person_id,$post_id)){
			$this->update_vote($person_id, $post_id, $value);
		}
		else{
			$this->add_vote($person_id, $post_id, $value);
		}
	}

	function add_vote($person_id, $post_id, $value){
		$this->db->query("INSERT INTO votes VALUES ($person_id, $value, $post_id)");
	}

	function update_vote($person_id, $post_id, $value){
		$this->db->query("UPDATE votes SET status = $value WHERE person_id = $person_id AND post_id = $post_id");
	}
	
	function vote_up($person_id, $post_id){
		$this->vote($person_id, $post_id, 1);
	}
	
	function vote_down($person_id, $post_id){
		$this->vote($person_id, $post_id, -1);
	}
	
}