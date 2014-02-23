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

	function get_related_tag_by_topic($topic_id){
		$query = $this->db->query("SELECT *
									FROM (SELECT RELATED.TAG_ID,RELATED.NAME,ALLCOUNT.NUM
							        FROM (SELECT DISTINCT TAG.TAG_ID, TAG.NAME
							          FROM POST_TOPIC
							          INNER JOIN TOPIC_TAG ON TOPIC_TAG.TOPIC_ID = POST_TOPIC.POST_ID AND POST_TOPIC.POST_ID = ".$topic_id." 
							          INNER JOIN TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID) RELATED
							        INNER JOIN (
							          SELECT TAG.TAG_ID, count(*) as NUM 
							          FROM TAG INNER JOIN TOPIC_TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID 
							          GROUP BY TAG.TAG_ID
							        ) ALLCOUNT ON RELATED.TAG_ID = ALLCOUNT.TAG_ID
							      	ORDER BY ALLCOUNT.NUM DESC)
									WHERE ROWNUM <= 5");
		return $query->result();
	}


	function get_top_tag_used($person_id){
		$query = $this->db->query("SELECT *
									FROM (SELECT RELATED.TAG_ID,RELATED.NAME,ALLCOUNT.NUM
							        FROM (SELECT DISTINCT TAG.TAG_ID, TAG.NAME
							          FROM POST_TOPIC
							          INNER JOIN POST ON POST_TOPIC.POST_ID = POST.POST_ID AND POST.PERSON_ID = ".$person_id.
							          " INNER JOIN TOPIC_TAG ON TOPIC_TAG.TOPIC_ID = POST_TOPIC.POST_ID 
							          INNER JOIN TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID) RELATED
							        INNER JOIN (
							          SELECT TAG.TAG_ID, count(*) as NUM 
							          FROM TAG INNER JOIN TOPIC_TAG ON TAG.TAG_ID = TOPIC_TAG.TAG_ID 
							          GROUP BY TAG.TAG_ID
							        ) ALLCOUNT ON RELATED.TAG_ID = ALLCOUNT.TAG_ID
							      	ORDER BY ALLCOUNT.NUM DESC)
									WHERE ROWNUM <= 5");
		return $query->result();
	}

	function remove_tag($tag_id){
		$query = $this->db->query("DELETE FROM TAG WHERE TAG_ID = ".$tag_id);

	}
}