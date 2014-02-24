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
	
	function get_current_user_bans_num($person_id){
		$query = $this->db->query("SELECT count(*) as NUM FROM ban_log WHERE end_date > systimestamp AND ban_log.person_id = $person_id");
		if($query->num_rows() > 0){
			return (int)$query->row()->NUM;
		}
		return false;
	}
	
	function get_bans(){
		$query = $this->db->query("SELECT ban_log.BAN_LOG_ID, to_char(ban_log.START_DATE,'DY DD-Mon-YYYY HH24:MI')AS START_DATE, to_char(ban_log.END_DATE,'DY DD-Mon-YYYY HH24:MI')AS END_DATE, person.PERSON_ID, person.DISPLAY_NAME, ban_log.ADMIN_ID, admin2.DISPLAY_NAME as ADMIN_NAME FROM ban_log INNER JOIN person ON person.person_id = ban_log.person_id INNER JOIN person admin2 ON admin2.person_id = ban_log.admin_id");
		return $query->result();
	}

	function get_user_bans($person_id){
		$query = $this->db->query("SELECT ban_log.BAN_LOG_ID, to_char(ban_log.START_DATE,'DY DD-Mon-YYYY HH24:MI')AS START_DATE, to_char(ban_log.END_DATE,'DY DD-Mon-YYYY HH24:MI')AS END_DATE, person.PERSON_ID, person.DISPLAY_NAME, ban_log.ADMIN_ID, admin2.DISPLAY_NAME as ADMIN_NAME FROM ban_log INNER JOIN person ON person.person_id = ban_log.person_id INNER JOIN person admin2 ON admin2.person_id = ban_log.admin_id WHERE ban_log.person_id = $person_id ORDER BY BAN_LOG_ID DESC");
		return $query->result();
	}

	function set_user_ban($ban_data){
		// date time: 23-Feb-2014
		$start_date = "to_date('".$ban_data['start_date']."', 'yyyy/mm/dd hh24:mi:ss')";
		$end_date = "to_date('".$ban_data['end_date']."', 'yyyy/mm/dd hh24:mi:ss')";
		$q = "INSERT INTO BAN_LOG (START_DATE, END_DATE, ADMIN_ID, PERSON_ID) VALUES 
				(".$start_date.", ".$end_date.", ".$ban_data['admin_id'].", ".$ban_data['person_id'].")";
		// echo $q;
		$this->db->query($q);
	}

	function get_person_id_from_banlog($ban_log_id) {
		$query = $this->db->query("SELECT PERSON_ID FROM BAN_LOG WHERE BAN_LOG_ID = $ban_log_id");
		$person_id = $query->first_row()->PERSON_ID;
		return $person_id;
	}

	function remove_user_ban($ban_log_id){
		// date time: 23-Feb-2014
		$q = "DELETE FROM BAN_LOG WHERE BAN_LOG_ID = $ban_log_id"; 
		// echo $q;
		$this->db->query($q);
	}

	function update_user_ban($ban_data){
		// date time: 23-Feb-2014
		$start_date = "to_date('".$ban_data['start_date']."', 'yyyy/mm/dd hh24:mi:ss')";
		$end_date = "to_date('".$ban_data['end_date']."', 'yyyy/mm/dd hh24:mi:ss')";
		$q = "UPDATE BAN_LOG SET START_DATE = $start_date, END_DATE = $end_date
				WHERE BAN_LOG_ID = ".$ban_data['ban_log_id'];
				
		// echo $q;
		$this->db->query($q);
	}

	function get_ban($ban_log_id){
		$query = $this->db->query("SELECT ban_log.BAN_LOG_ID, to_char(ban_log.START_DATE,'DY DD-Mon-YYYY HH24:MI')AS START_DATE, to_char(ban_log.END_DATE,'DY DD-Mon-YYYY HH24:MI')AS END_DATE, person.PERSON_ID, person.DISPLAY_NAME, ban_log.ADMIN_ID, admin2.DISPLAY_NAME as ADMIN_NAME FROM ban_log INNER JOIN person ON person.person_id = ban_log.person_id INNER JOIN person admin2 ON admin2.person_id = ban_log.admin_id WHERE ban_log_id = $ban_log_id");
		if($query->num_rows() > 0){
			return $query->row();
		}
		return false;	
	}
}