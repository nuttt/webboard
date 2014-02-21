<?php


class tag_model extends CI_Model {
	function get_tag($post_id){
		$query = $this->db->query("SELECT TAG.TAG_ID, TAG.NAME FROM TAG INNER JOIN (SELECT TAG_ID FROM TOPIC_TAG WHERE TOPIC_ID=".$post_id.") TT ON TAG.TAG_ID = TT.TAG_ID");
		return $query->result();
	}

	function get_name($tag_id) {
		$query = $this->db->query("SELECT TAG_ID, NAME FROM TAG WHERE TAG_ID = ".$tag_id);
		return $query->first_row()->NAME;

	function get_tags(){
		$query = $this->db->query("SELECT * FROM TAG");
		return $query->result();
	}

	function get_tags_with_topic_num(){
		$query = $this->db->query("SELECT TAG.TAG_ID, TAG.NAME, count(*) as NUM FROM TAG INNER JOIN TOPIC_TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID GROUP BY TAG.TAG_ID, TAG.NAME");
		return $query->result();
	}
}