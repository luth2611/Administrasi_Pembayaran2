<?php

Class User extends CI_Model{

  function login($username, $password){
    $this -> db -> select('username, password, hak_akses');
    $this -> db -> from('user');
    $this -> db -> where('username', $username);
    $this -> db -> where('password', $password);
    $this -> db -> limit(1);

    $query = $this -> db ->get();

    if($query -> num_rows() == 1){
      return $query -> result();
    }else{
      return false;
    }
  }
  public function getData($data,$table,$where = null){
    $this->db->select($data);
    $this->db->from($table);
    if($where != null){
      $this->db->where($where);
    }
    return $this->db->get();
  }

}

 ?>
