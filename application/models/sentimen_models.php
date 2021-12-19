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
    	return $this->db->query('SELECT DATE_FORMAT(tanggalPosting, "%d-%m-%Y") AS tanggalPosting, isiKonten, sentimenPositif, sentimenNegatif, sentimenNetral, sentimen FROM sentimen JOIN kontensosmed ON sentimen.idKonten = kontensosmed.idKonten ORDER BY tanggalPosting DESC');
	}

	public function get_sentimen_group() {
			return $this->db->query("SELECT sentimen, count(sentimen) jumlah_sentimen FROM `sentimen` GROUP BY sentimen ORDER BY sentimen DESC");
	}

	public function get_sentimen_by_tanggal($sentimen='positif') {
			$sql = 'SELECT DISTINCT
								kontensosmed.tanggalPosting, coalesce(sentimen.jumlah_sentimen,0) jumlah_sentimen
							FROM
								kontensosmed
							LEFT JOIN (SELECT
								count(sentimen) jumlah_sentimen,
								kontensosmed.tanggalPosting
							FROM
								sentimen
								LEFT JOIN kontensosmed ON kontensosmed.idKonten = sentimen.idKonten
							WHERE
								sentimen = \''.$sentimen.'\'
							GROUP BY
								tanggalPosting) sentimen on sentimen.tanggalPosting = kontensosmed.tanggalPosting
							WHERE
								kontensosmed.tanggalPosting BETWEEN CURDATE( ) - INTERVAL 2 WEEK
								AND CURDATE( )';

			return $this->db->query($sql);
	}

	public function get_total_sentimen() {
		$sql = 'SELECT
							sentimen,
							count( sentimen ) jumlah_sentimen,
							sum(jumlahLike) jumlah_like
						FROM
							kontensosmed
							LEFT JOIN sentimen ON sentimen.idKonten = kontensosmed.idKonten
						WHERE kontensosmed.tanggalPosting BETWEEN CURDATE( ) - INTERVAL 2 WEEK
							AND CURDATE( )
						GROUP BY
							sentimen';

		return $this->db->query($sql);
	}
}
