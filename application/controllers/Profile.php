<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('post');
		$this->load->helper('url_helper');
  }
  public function index(){
    if(!$this->session->userdata('username')) redirect('login?auth=true');
    $data['rows'] = $this->post->getUser();
    $data['name'] = $this->session->userdata('username');
    $data['userData'] = TRUE;
		$data['isIndex'] = FALSE;
		$this->load->view('header');
    $this->load->view('Profile',$data);
		$this->load->view('content',$data);
		$this->load->view('footer');
  }
}