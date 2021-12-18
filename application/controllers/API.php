<?php

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class API extends \chriskacerguis\RestServer\RestController
{
  public function __construct($config = 'rest')
  	{
  		parent::__construct($config);
  	}

    public function insert_kata_post(){
      require_once(APPPATH."libraries/lib/PHPInsight/dictionaries/source.negatif.php");
      require_once(APPPATH."libraries/lib/PHPInsight/dictionaries/source.netral.php");
      require_once(APPPATH."libraries/lib/PHPInsight/dictionaries/source.positif.php");
      $data = [];
      $kata = strtolower($this->post('kata'));
      $tingkat_sentimen = $this->post('tingkat_sentimen');
      $data = [
        'kata' => $kata,
        'tingkat_sentimen' => $tingkat_sentimen
      ];
        if(in_array($kata,$neg) || in_array($kata,$neu) || in_array($kata,$pos)){
          $data = [
            'code' => 0,
            'message' => "Kata sudah ada dalam bank data!"
          ];
        } else {
          $data = [
            'code' => 1,
            'message' => "Kata sudah tersimpan di database!"
          ];
        }
      header('Content-type: application/json');
      echo json_encode($data);
    }
}
