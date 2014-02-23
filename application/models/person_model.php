<?php
class Person_model extends CI_Model {

	var $attributes = "person_id, display_name, password, avatar, birthdate, twitter, facebook, email, to_char(joined_date,'DY DD-Mon-YYYY HH24:MI')AS joined";

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	
	function test(){
		//$query = $this->db->get('person', 10);
		$query = $this->db->query("SELECT * FROM person");
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
		$query = $this->db->query("SELECT person_id FROM person_admin WHERE person_id = $person_id");
		return $query->num_rows() > 0;
	}

	function is_moderator($person_id,$topic_id){
		$query = $this->db->query("SELECT MOD_TAG.*
									FROM MOD_TAG
									INNER JOIN TOPIC_TAG 
										ON TOPIC_TAG.TAG_ID=MOD_TAG.TAG_ID 
										AND MOD_TAG.MOD_ID =".$person_id." 
										AND TOPIC_TAG.TOPIC_ID = ".$topic_id);
		return $query->num_rows() > 0;
	}

	function get_person_profile($id){
		$query = $this->db->query("SELECT P.PERSON_ID, P.DISPLAY_NAME, P.PASSWORD, 
									CASE WHEN P.AVATAR IS NULL THEN 'DEFAULT' ELSE P.AVATAR END AS AVATAR,
									to_char(P.BIRTHDATE,'DD Month YYYY HH24:MI')AS BIRTHDATE,
									CASE WHEN P.TWITTER IS NULL THEN '' ELSE P.TWITTER END AS TWITTER,
									CASE WHEN P.FACEBOOK IS NULL THEN '' ELSE P.FACEBOOK END AS FACEBOOK,
									P.EMAIL, to_char(P.JOINED_DATE,'DD Mon YYYY HH24:MI')AS JOINED_DATE
									FROM PERSON P WHERE P.PERSON_ID=".$id);
		return $query->first_row();
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

	function remove_person($id){
		$query = $this->db->query("DELETE FROM person WHERE person_id = $id");
	}

}