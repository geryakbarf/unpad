<?php
defined('BASEPATH') or exit ("No Access Allowed!");

class bank_models extends CI_Model
{
    public $table = 'bankkata';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_kata($data)
	{
    $query = $this->db->query("SELECT * FROM bankkata WHERE kata = '{$data['kata']}'");
    if($query->num_rows() > 0){
      return false;
    }else{
      return $this->db->insert($this->table, $data);
    }
	}

  public function kata_negatif(){
    	return $this->db->query('SELECT * FROM bankkata WHERE sentimen = "negatif"');
	}

}
