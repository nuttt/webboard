<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

  var $header;
  var $footer;

  function __construct(){
    parent::__construct();
    admin_login();
    $this->header = get_header_data();
    $this->load->model('person_model');
    $this->load->model('post_model');
    $this->load->model('ban_model');
  }

  public function index(){
    $data['stats']['member_num'] = $this->person_model->get_person_number();
    $data['stats']['topic_num'] = $this->post_model->get_topic_num();
    $data['stats']['reply_num'] = $this->post_model->get_post_num() - $data['stats']['topic_num'];
    $data['bans'] = $this->ban_model->get_current_bans();

    $data['header'] = $this->load->view('header', $this->header, TRUE);
    $data['footer'] = $this->load->view('footer', $this->footer, TRUE);
    $this->load->view('admin/dashboard/index', $data);
  }

}