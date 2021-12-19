<?php
defined('BASEPATH') or exit ("No Access Allowed!");

class user_models extends CI_Model
{
    public $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username,$password){
    $query = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = PASSWORD('$password')");
    if($query->num_rows() > 0){
      return true;
    }else{
      return false;
    }
	}

  public function get_all_user(){
    return $this->db->query("SELECT * FROM user");
  }

  public function get_one_user($username){
    return $this->db->query("SELECT * FROM user WHERE username = '$username'");
  }

  public function insert_pengguna($data){
  $query = $this->db->query("SELECT * FROM user WHERE username = '{$data['username']}'");
  if($query->num_rows() > 0){
    return false;
  }else{
    return $this->db->query("INSERT INTO user VALUES('{$data['username']}', PASSWORD('{$data['password']}'), '{$data['namaAdmin']}')");
  }
}

  public function update_pengguna($data){
    return $this->db->query("UPDATE user SET namaAdmin = '{$data['namaAdmin']}' WHERE username = '{$data['username']}'");
  }

}
