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
	public function add_picture(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = 'a';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('picture')){
			$error = array('error' => $this->upload->display_errors());

			return $error;
		}
		else{
			$data = array('upload_data' => $this->upload->data());

			// $this->load->view('upload_success', $data);
			return $data;
		}
	}
	
}