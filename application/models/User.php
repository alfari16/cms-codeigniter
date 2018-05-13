<?php
  class User extends CI_Model{
    public function __construct(){
      $this->load->database();
    }
    public function checkLogin(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $this->db->select("*");
      $this->db->from("user");
      $this->db->where("username='$username' AND pass=md5('$password')");
      $query = $this->db->get();
      return $query->result_array();
    }
    public function checkSignup(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $this->db->select("*");
      $this->db->from("user");
      $this->db->where("username='$username'");
      $query = $this->db->get();
      return $query->result_array();
    }
    public function signup(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $nama = $this->input->post('nama');
      $this->db->insert('user',[
        'username' => $username,
        'pass' => md5($password),
        'nama' => $nama,
      ]);
      $this->db->select("*");
      $this->db->from("user");
      $this->db->where("username='$username' AND pass=md5('$password')");
      $query = $this->db->get();
      $query = $query->result_array();
      $this->session->set_userdata(array(
					'username' => $query[0]['username'],
					'name' => $query[0]['nama'],
					'password' => $query[0]['pass'],
					'id' => $query[0]['id'],
				));
      return TRUE;
    }
  }