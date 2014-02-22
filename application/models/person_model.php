<?php
class Person_model extends CI_Model {

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
		$query = $this->db->query("SELECT * FROM person WHERE email = '".$email."' AND password = '".sha1($password)."' AND ROWNUM <= 1");
		if($query->num_rows() > 0){
			return $query->row();
		}
		return false;
	}

	public function get_person($id){
		$query = $this->db->query("SELECT * FROM person WHERE person_id = '".$id."' AND ROWNUM <= 1");
		if($query->num_rows() > 0){
			return $query->row();
		}
		return false;
	}

	function is_admin($person_id){
		$query = $this->db->query("SELECT 1 FROM person_admin");
		return $query->num_rows() > 0;
	}

	function get_person_profile($id){
		$query = $this->db->query("");
	}

}