<?php
class Ban_model extends CI_Model {

	var $attributes = "person_id, display_name, password, avatar, birthdate, twitter, facebook, email, to_char(joined_date,'DY DD-Mon-YYYY HH24:MI')AS joined";

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	
	function get_current_bans(){
		$query = $this->db->query("SELECT ban_log.BAN_LOG_ID, to_char(ban_log.START_DATE,'DY DD-Mon-YYYY HH24:MI')AS START_DATE, to_char(ban_log.END_DATE,'DY DD-Mon-YYYY HH24:MI')AS END_DATE, person.PERSON_ID, person.DISPLAY_NAME, ban_log.ADMIN_ID, admin2.DISPLAY_NAME as ADMIN_NAME FROM ban_log INNER JOIN person ON person.person_id = ban_log.person_id INNER JOIN person admin2 ON admin2.person_id = ban_log.admin_id WHERE end_date > systimestamp");
		return $query->result();
	}
	
	function get_bans(){
		$query = $this->db->query("SELECT ban_log.BAN_LOG_ID, to_char(ban_log.START_DATE,'DY DD-Mon-YYYY HH24:MI')AS START_DATE, to_char(ban_log.END_DATE,'DY DD-Mon-YYYY HH24:MI')AS END_DATE, person.PERSON_ID, person.DISPLAY_NAME, ban_log.ADMIN_ID, admin2.DISPLAY_NAME as ADMIN_NAME FROM ban_log INNER JOIN person ON person.person_id = ban_log.person_id INNER JOIN person admin2 ON admin2.person_id = ban_log.admin_id");
		return $query->result();
	}

	function get_user_bans($person_id){
		$query = $this->db->query("SELECT ban_log.BAN_LOG_ID, to_char(ban_log.START_DATE,'DY DD-Mon-YYYY HH24:MI')AS START_DATE, to_char(ban_log.END_DATE,'DY DD-Mon-YYYY HH24:MI')AS END_DATE, person.PERSON_ID, person.DISPLAY_NAME, ban_log.ADMIN_ID, admin2.DISPLAY_NAME as ADMIN_NAME FROM ban_log INNER JOIN person ON person.person_id = ban_log.person_id INNER JOIN person admin2 ON admin2.person_id = ban_log.admin_id WHERE ban_log.person_id = $person_id");
		return $query->result();
	}

	

}