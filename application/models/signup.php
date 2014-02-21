<?php 
class Signup extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function add_person($person){

		// $this->db->trans_start();
		// $this->db->insert('PERSON',$person);

		$query = '(';
		$column = '(';

		$date = new DateTime($person['BIRTHDATE']);
		//echo $date->format('d-M-y');



		$person['BIRTHDATE'] = strtoupper($date->format('d-M-y'));
		foreach ($person as $key => $value) {
			# code...
			if($column == '(') $column = $column.$key;
			else $column = $column.",".$key;
			if($query == '(')$query = $query."'".$value."'";
			else$query = $query.",'".$value."'";
		}
		$all = 'INSERT INTO PERSON '.$column.') values '.$query.')';
		$this->db->query($all);
		$co = $this->db->count_all('PERSON');
		$this->db->trans_complete();
		
		return  $co;
	}
}