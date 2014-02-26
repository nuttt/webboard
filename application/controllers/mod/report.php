<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {

  var $header;
  var $footer;

  function __construct(){
    parent::__construct();
    moderator_admin_login();
    $this->header = get_header_data();
  }

  public function index(){
    redirect('/');
  }

  public function tag($tag_id){
    if(!$tag_id){
      redirect('/');
    }
    $this->load->model('report_model');
    $this->load->model('tag_model');
    $data['tag_name'] = $this->tag_model->get_name($tag_id);
    $data['reports'] = $this->report_model->get_reports_by_tag($tag_id);
    $data['role'] = 'mod';
    $data['return'] = '?return=mod/report/tag/'.$tag_id;
    $data['header'] = $this->load->view('header', $this->header, TRUE);
    $data['footer'] = $this->load->view('footer', $this->footer, TRUE);
    $this->load->view('mod/report/index', $data);
  }

  public function handle($person_id, $post_id){
    $this->load->model('report_model');
    $this->report_model->handle($person_id, $post_id);
    $this->session->set_flashdata('message', 'Report has been handled!');
    redirect($this->input->get('return'));
  }

}