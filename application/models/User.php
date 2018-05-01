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
  }