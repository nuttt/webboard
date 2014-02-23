<?php


class tag_model extends CI_Model {
	function get_tag($post_id){
		$query = $this->db->query("SELECT TAG.TAG_ID, TAG.NAME FROM TAG INNER JOIN (SELECT TAG_ID FROM TOPIC_TAG WHERE TOPIC_ID=".$post_id.") TT ON TAG.TAG_ID = TT.TAG_ID");
		return $query->result();
	}

	function get_name($tag_id) {
		$query = $this->db->query("SELECT TAG_ID, NAME FROM TAG WHERE TAG_ID = ".$tag_id);
		if($query->num_rows() > 0){
			return $query->first_row()->NAME;
		}
		return false;
	}

	function get_tags($order_by = null){
		if($order_by){
			$query = $this->db->query("SELECT * FROM TAG ORDER BY $order_by");
		}
		else{
			$query = $this->db->query("SELECT * FROM TAG");
		}
		return $query->result();
	}

	function get_tags_with_topic_num(){
		$query = $this->db->query("SELECT TAG.TAG_ID, TAG.NAME, count(*) as NUM FROM TAG INNER JOIN TOPIC_TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID GROUP BY TAG.TAG_ID, TAG.NAME");
		return $query->result();
	}

	function update_tag($tag_id, $new_name){
		$query = $this->db->query("UPDATE TAG SET NAME = '".$new_name."' WHERE TAG_ID = ".$tag_id);
	}

	function add_tag($name){
		$query = $this->db->query("INSERT INTO TAG (NAME) VALUES ('$name')");
	}

	function remove_tag($tag_id){
		$query = $this->db->query("DELETE FROM TAG WHERE TAG_ID = ".$tag_id);
	}
}