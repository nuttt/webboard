<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tag extends CI_Controller {

	var $header;
	var $footer;

	function __construct(){
		parent::__construct();
		$this->header = get_header_data();
	}

	public function index(){

		$this->load->model('tag_model');
		$data['tags'] = $this->tag_model->get_tags();

		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/tag/index', $data);
	}

	function edit($tag_id){
		$this->load->library('form_validation');
		$this->load->model('tag_model');
		$this->form_validation->set_rules('name', 'Tag name', 'required');
		if($this->form_validation->run()){
			$this->tag_model->update_tag($tag_id, $this->input->post('name'));
			redirect('admin/tag');
		}
		$data['tag_name'] = $this->tag_model->get_name($tag_id);
		if(!$data['tag_name']){
			redirect('admin/tag');
		}
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/tag/edit', $data);
	}

	function create(){
		$this->load->library('form_validation');
		$this->load->model('tag_model');
		$this->form_validation->set_rules('name', 'Tag name', 'required');
		if($this->form_validation->run()){
			$this->tag_model->add_tag($this->input->post('name'));
			redirect('admin/tag');
		}
		$data['header'] = $this->load->view('header', $this->header, TRUE);
		$data['footer'] = $this->load->view('footer', $this->footer, TRUE);
		$this->load->view('admin/tag/create', $data);
	}

	function delete(){
		redirect('admin/tag');
	}

}