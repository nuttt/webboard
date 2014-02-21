<?php


class Post_reply_model extends CI_Model {
	function get_count_reply($post_id){
		$query = $this->db->query("select num from reply_count where REPLY_TO = " . $post_id);
		return $query->first_row()->NUM;
	}
}