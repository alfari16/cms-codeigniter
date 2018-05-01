<?php
  class post extends CI_Model{
    public function __construct(){
      $this->load->database();
    }

    public function getPost($all = FALSE){
      $this->db->select("*");
      $this->db->from("post, user");
      $this->db->where("post.id_author=user.id");
      $this->db->order_by("post.id",'desc');
      if(!$all) $this->db->limit(9);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function getPostById($id){
      $this->db->select('*');
      $this->db->from('post,user');
      $this->db->where("post.slug='$id' AND post.id_author=user.id");
      $query = $this->db->get();
      return $query->result_array();
    }

    public function addPost($name){
      $this->load->helper('url');
      $judul = $this->input->post('judul');
      $konten = $this->input->post('konten');
      $slug = url_title($judul, 'dash', TRUE);
      $tanggal = date('d').' '.$this->generateMonth().' '.date('Y');
      $query = $this->db->insert('post', array(
        'judul' => $judul,
        'konten' => $konten,
        'id_author' => $this->session->userdata('id'),
        'thumbnail' => $name,
        'slug' => substr($slug,0,20),
        'tanggal' => $tanggal
      ));
      return $query;
    }

    public function deletePost($id){
      $this->db->where('slug', $id);
      $this->db->delete('post');
    }

    public function editPost($data){
      $id = $this->input->post('slug');
      $slug = url_title($this->input->post('judul'), 'dash', TRUE);
      $tanggal = date('d').' '.$this->generateMonth().' '.date('Y');
      $change = array(
        'judul' => $this->input->post('judul'),
        'konten' => $this->input->post('konten'),
        'slug' => substr($slug,0,20),
        'tanggal' => $tanggal
      );
      if($data['thumbnail']!==null) $change['thumbnail'] = $data['thumbnail'];
      $this->db->where('slug', $id);
      $this->db->update('post',$change);
    }

    public function generateMonth(){
      $date = date('m');
      switch ($date) {
        case '01':
          return 'Januari';
        case '02':
          return 'Februari';
        case '03':
          return 'Maret';
        case '04':
          return 'April';
        case '05':
          return 'Mei';
        case '06':
          return 'Juni';
        case '07':
          return 'Juli';
        case '08':
          return 'Agustus';
        case '09':
          return 'September';
        case '10':
          return 'Oktober';
        case '11':
          return 'November';
        case '12':
          return 'Desember';
        default:
          # code...
          break;
      }
    }
  }