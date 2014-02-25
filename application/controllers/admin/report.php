<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		admin_login();
		$this->header = get_header_data();
	}

	public function index(){
		$this->load->model('report_model');
		$data['reports'] = $this->report_model->get_report();

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/report/index', $data);
	}

	public function handle($person_id, $post_id){
		$this->load->model('report_model');
		$this->report_model->handle($person_id, $post_id);
		$this->session->set_flashdata('message', 'Report has been handled!');
		redirect(base_url().'admin/report/index');
	}

}