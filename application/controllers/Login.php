<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
		$this->load->helper('form');
		$this->load->helper('url_helper');
	}
	public function index(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
		if($this->session->userdata('username')!==null) redirect('/');
	}
	public function checkLogin(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$error = array();
		if(!$this->form_validation->run() == FALSE){
			if(count($this->User->checkLogin())>0){
				$data = $this->User->checkLogin()[0];
				$this->session->set_userdata(array(
					'username' => $data['username'],
					'password' => $data['pass'],
					'id' => $data['id'],
				));
				redirect('/');
			}else{
				$error['notfound'] = TRUE;
			}
		}
		$this->load->view('header');
		$this->load->view('login',$error);
		$this->load->view('footer');
	
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
