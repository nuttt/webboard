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

	public function verify_person($email, $password){
		$query = $this->db->query("SELECT $this->attributes FROM person WHERE email = '".$email."' AND password = '".sha1($password)."' AND ROWNUM <= 1");
		if($query->num_rows() > 0){
			return $query->row();
		}
		return false;
	}

	public function get_person($id){
		$query = $this->db->query("SELECT $this->attributes FROM person WHERE person_id = '".$id."' AND ROWNUM <= 1");
		if($query->num_rows() > 0){
			return $query->row();
		}
		return false;
	}

	function is_admin($person_id){
		$query = $this->db->query("SELECT person_id FROM person_admin");
		return $query->num_rows() > 0;
	}

	function get_person_profile($id){
		$query = $this->db->query("");
	}

	function get_members(){
		$query = $this->db->query("SELECT $this->attributes FROM person WHERE person_id not in (SELECT person_id FROM person_moderator) and person_id not in (SELECT person_id FROM person_admin)");
		return $query->result();
	}

	function get_moderators(){
		$query = $this->db->query("SELECT $this->attributes FROM person WHERE person_id in (SELECT person_id FROM person_moderator)");
		return $query->result();
	}

	function get_admins(){
		$query = $this->db->query("SELECT $this->attributes FROM person WHERE person_id in (SELECT person_id FROM person_admin)");
		return $query->result();
	}

	function get_person_number(){
		$query = $this->db->query("SELECT count(*) as num FROM person");
		return $query->row()->NUM;
	}

}