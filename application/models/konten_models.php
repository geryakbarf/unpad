<?php
defined('BASEPATH') or exit ("No Access Allowed!");

class konten_models extends CI_Model
{
    public $table = 'kontensosmed';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_konten($data)
	{
    $query = $this->db->query("SELECT * FROM kontensosmed WHERE idKonten = '{$data['idKonten']}'");
    if($query->num_rows() > 0){
      return;
    }else{
      return $this->db->insert($this->table, $data);
    }
	}

}
