<?php


class tag_model extends CI_Model {
	function get_tag($post_id){
		$query = $this->db->query("SELECT TAG.TAG_ID, TAG.NAME FROM TAG INNER JOIN (SELECT TAG_ID FROM TOPIC_TAG WHERE TOPIC_ID=".$post_id.") TT ON TAG.TAG_ID = TT.TAG_ID");
		return $query->result();
	}

	function get_all() {
		$query = $this->db->query("SELECT TAG_ID, NAME FROM TAG");
		return $query->result();
	}

	function get_Name($tag_id) {
		$query = $this->db->query("SELECT TAG_ID, NAME FROM TAG WHERE TAG_ID = ".$tag_id);
		return $query->first_row()->NAME;
	}
}