<?php


class Post_reply_model extends CI_Model {
	function get_count_reply($post_id){
		$query = $this->db->query("SELECT NUM from reply_count where REPLY_TO = " . $post_id);
		if($query->num_rows()>0){	
			return $query->first_row()->NUM;
		}
		else return 0;
	}

	function get_post_reply($post_id){
		$query = $this->db->query("SELECT POST_REPLY.POST_ID, PERSON.PERSON_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI')AS TIME, PERSON.DISPLAY_NAME, PERSON.AVATAR, CASE WHEN sum(VOTES.STATUS) IS NULL THEN 0 ELSE sum(VOTES.STATUS) END  AS VOTE, POST.CONTENT
								From POST_REPLY
								INNER JOIN POST ON POST_REPLY.POST_ID = POST.POST_ID AND POST_REPLY.REPLY_TO =".$post_id.
								" INNER JOIN PERSON ON POST.PERSON_ID = PERSON.PERSON_ID 
								LEFT JOIN VOTES ON VOTES.POST_ID = POST.POST_ID  
								GROUP BY POST_REPLY.POST_ID, PERSON.PERSON_ID, to_char(POST.TIME,'DY DD-Mon-YYYY HH24:MI'), PERSON.DISPLAY_NAME, POST.CONTENT,PERSON.AVATAR");
		//var_dump($query->result());
		return $query->result();
	}

	function get_latest_reply($tag_id = "0",$person_id=-1) {
		if($tag_id == 0) {
			$q_tag = "";
		}
		else {
			$q_tag = " INNER JOIN TOPIC_TAG TT on PT.POST_ID = TT.TOPIC_ID and TT.TAG_ID = $tag_id ";
		}
		$person_sql = "";
		if($person_id!=-1){
			$person_sql=" AND POST.PERSON_ID = ".$person_id;
		}
		$query = $this->db->query("select * from (select PT.POST_ID, PT.TITLE, POST.CONTENT, POST.TIME
			FROM POST_REPLY PR
			INNER JOIN POST on PR.POST_ID = POST.POST_ID".$person_sql."
			INNER JOIN POST_TOPIC PT on PT.POST_ID = PR.TOPIC_ID
      		$q_tag
			ORDER BY POST.TIME DESC)
			WHERE ROWNUM <= 5");
		return $query->result();
	}
}