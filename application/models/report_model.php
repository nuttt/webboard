<?php


class report_model extends CI_Model {

	function get_report() {
		// P1 is Reporter, P2 is 'Posted by'
		$query = $this->db->query("SELECT * FROM REPORT_VIEW ORDER BY REPORTED_DATE DESC");
		return $query->result();
	}

	function get_reports_by_tag($tag_id){
		$q = "select distinct posted_by_person_id, posted_by, reporter_id, post_id, reported_date, status, root_topic_id, reporter_name, report_title
from report_view 
inner join topic_tag on report_view.root_topic_id = topic_tag.topic_id and tag_id = $tag_id";
		$query = $this->db->query($q);
		return $query->result();

	}

	function get_waiting_report($limit = '') {
		// P1 is Reporter, P2 is 'Posted by'
		if($limit) $limit = 'AND ROWNUM <= '.$limit;
		$query = $this->db->query("SELECT * FROM REPORT_VIEW WHERE STATUS = 'Waiting' $limit ORDER BY REPORTED_DATE DESC");
		return $query->result();
	}

	function handle($person_id, $post_id){
		$q = "UPDATE report SET status='Handled' WHERE person_id=$person_id AND post_id=$post_id"; 
		$query = $this->db->query($q);
	}


	function get_report_topic() {
		// P1 is Reporter, P2 is 'Posted by'
		$query = $this->db->query("SELECT '' as FRONT, POST_TOPIC.POST_ID AS TOPIC_ID, POST_TOPIC.TITLE, to_char(R.REPORTED_DATE,'DD-Mon-YYYY HH24:MI')AS REPORTED_DATE, 
			POST.POST_ID, P1.PERSON_ID as REPORTER_ID, P1.DISPLAY_NAME as REPORTER_NAME, 
			P2.PERSON_ID as POSTEDBY_ID, P2.DISPLAY_NAME as POSTEDBY_NAME 
			FROM REPORT R INNER JOIN PERSON P1 ON R.PERSON_ID = P1.PERSON_ID
			INNER JOIN POST ON R.POST_ID = POST.POST_ID 
			INNER JOIN PERSON P2 ON POST.PERSON_ID = P2.PERSON_ID
			INNER JOIN POST_TOPIC ON POST.POST_ID = POST_TOPIC.POST_ID");
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		return false;
	}

	function add_report($person_id, $post_id){
		$query = $this->db->query("INSERT INTO report values ($person_id, $post_id, systimestamp, 'Waiting')");
	}

}