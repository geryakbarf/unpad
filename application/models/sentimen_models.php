<?php
defined('BASEPATH') or exit ("No Access Allowed!");

class sentimen_models extends CI_Model
{
    public $table = 'sentimen';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_sentimen($data){
    $query = $this->db->query("SELECT * FROM sentimen WHERE idKonten = '{$data['idKonten']}'");
    if($query->num_rows() > 0){
      return;
    }else{
      return $this->db->insert($this->table, $data);
    }
	}

  public function get_all_sentimen(){
    	return $this->db->query('SELECT isiKonten, sentimenPositif, sentimenNegatif, sentimenNetral, sentimen FROM sentimen JOIN kontensosmed ON sentimen.idKonten = kontensosmed.idKonten');
	}

}
