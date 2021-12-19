<?php
defined('BASEPATH') or exit ("No Access Allowed!");

class bank_models extends CI_Model
{
    public $table = 'bankkata';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_kata($data){
    $query = $this->db->query("SELECT * FROM bankkata WHERE kata = '{$data['kata']}'");
    if($query->num_rows() > 0){
      return false;
    }else{
      return $this->db->insert($this->table, $data);
    }
	}

  public function update_kata($data){
    extract($data);
    $this->db->where('kata', $kata);
    return $this->db->update($this->table, $data);
  }

  public function delete_kata($data){
    extract($data);
    $this->db->where('kata', $kata);
    return $this->db->delete($this->table, $data);
  }

  public function kata_negatif(){
    	return $this->db->query('SELECT * FROM bankkata WHERE sentimen = "negatif"');
	}

  public function kata_positif(){
    	return $this->db->query('SELECT * FROM bankkata WHERE sentimen = "positif"');
	}

  public function kata_netral(){
    	return $this->db->query('SELECT * FROM bankkata WHERE sentimen = "netral"');
	}

  public function get_one_kata($kata){
    return $this->db->query("SELECT * FROM bankkata WHERE kata = '$kata'");
  }

}
