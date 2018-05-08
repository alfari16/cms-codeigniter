<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('post');
		$this->load->helper('url_helper');
	}
	public function index(){
		$data['rows'] = $this->post->getPost();
		$data['sidenavData'] = $this->post->getSidenav();
		$data['isIndex'] = TRUE;
		$data['sidenav'] = TRUE;
		$this->load->view('header');
		$this->load->view('content',$data);
		$this->load->view('sidenav',$data);
		$this->load->view('footer');
	}
	public function allPost(){
		$data['rows'] = $this->post->getPost(TRUE);
		$data['isIndex'] = FALSE;
		$this->load->view('header');
		$this->load->view('content',$data);
		$this->load->view('footer');
	}
	public function getPost($id){
		$data['data'] = $this->post->getPostById($id);
		$data['sidenavData'] = $this->post->getSidenav();
		$data['sidenav'] = TRUE;
		if(count($data['data'])<1) $data['notfound'] = true;
		$this->load->view('header');
		$this->load->view('content_detail',$data);
		$this->load->view('sidenav',$data);
		$this->load->view('footer');
	}
	public function deletePost($id){
		$data['data'] = $this->post->getPostById($id);
		$data['sidenavData'] = $this->post->getSidenav();
		$data['sidenav'] = TRUE;
		$data['delete'] = TRUE;
		$data['slug'] = $id;
		if(count($data['data'])<1) $data['notfound'] = true;
		$this->load->view('header');
		$this->load->view('content_detail',$data);
		$this->load->view('sidenav',$data);
		$this->load->view('footer');
	}
	public function doDeletePost($id){
		$this->post->deletePost($id);
		redirect('post');
	}
	public function editPost($id){
		if($this->session->userdata('username'===null)){ redirect('login?auth=true');}
		$this->load->library('form_validation');
		$temp = $this->post->getPostById($id);
		if(count($temp)<1){
			die('Artikel tidak ditemukan');
		}
		$data['result'] = $temp[0];
		$data['edit'] = TRUE;
		$data['slug'] = $id;
		
		$this->load->view('header');
		$this->load->view('create',$data);
		$this->load->view('footer');
	}

	public function doEdit(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul','Username','required');
		$this->form_validation->set_rules('konten','Password','required');
		
		$path = $config['upload_path']          = './assets/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10014;
		$config['max_width']            = 20240;
		$config['max_height']           = 20240;
		$config['file_name'] = 'uploaded'.date('YmdHis');
		$this->load->library('upload', $config);
		$succeed = array();
		
		if(!$this->form_validation->run()===FALSE){
			$data = null;
			if($this->upload->do_upload('input_foto')){
				$data = array(
					'thumbnail' => $this->upload->data()['file_name'],
				);
			}
			$this->post->editPost($data);
			redirect('tambahpost?edit=yeah');
		}else{
			$succeed['error'] = array('error' => $this->upload->display_errors());
			echo "gagal";
		}
		$this->load->view('header');
		$this->load->view('create',$succeed);
		$this->load->view('footer');
	}

	public function create(){
		if($this->session->userdata('username')===null){ 
			redirect('login?auth=true');
		}
		$this->load->library('form_validation');
		$this->load->helper('url');
		
		$this->form_validation->set_rules('judul','Username','required');
		$this->form_validation->set_rules('konten','Password','required');
		
		$path = $config['upload_path']          = './assets/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10014;
		$config['max_width']            = 20240;
		$config['max_height']           = 20240;
		$config['file_name'] = 'uploaded'.date('YmdHis');
		$this->load->library('upload', $config);
		$succeed = array();
		
		if(!$this->form_validation->run()===FALSE){
			if($this->upload->do_upload('input_foto')){
				$this->post->addPost($this->upload->data()['file_name']);
				redirect('tambahpost?sukses=yeah');
			}else{
				$succeed['error'] = array('error' => $this->upload->display_errors());
			};
		}
		$this->load->view('header');
		$this->load->view('create',$succeed);
		$this->load->view('footer');
	}

	public function test(){
		echo date('m');
		echo $this->post->generateMonth();
	}
}
