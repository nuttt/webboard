<?php
class Person_model extends CI_Model {

	var $title   = '';
	var $content = '';
	var $date    = '';

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
		$query = $this->db->query("SELECT * FROM person WHERE email = '".$email."' AND password = '".sha1($password)."'");
		return $query->num_rows() > 0;
	}

	// function insert_entry()
	// {
	// 	$this->title   = $_POST['title']; // please read the below note
	// 	$this->content = $_POST['content'];
	// 	$this->date    = time();

	// 	$this->db->insert('entries', $this);
	// }

	// function update_entry()
	// {
	// 	$this->title   = $_POST['title'];
	// 	$this->content = $_POST['content'];
	// 	$this->date    = time();

	// 	$this->db->update('entries', $this, array('id' => $_POST['id']));
	// }

}