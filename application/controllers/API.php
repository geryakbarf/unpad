<?php
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class API extends \chriskacerguis\RestServer\RestController
{
  public function __construct($config = 'rest')
  	{
  		parent::__construct($config);
      $this->load->model('b_models');
      $this->load->model('u_models');
  	}

    public function aksi_login_post(){
      $username = $this->post('username');
      $password = $this->post('password');
      $data = [];
      $is_valid = $this->u_models->login($username,$password);
      if($is_valid == false){
        $data = [
          'code' => 0,
          'message' => "Username atau password salah!"
        ];
      } else {
        $data = [
          'code' => 1,
          'message' => "Selamat datang! Anda berhasil login. Mohon tunggu, anda sedang diarahkan ke halaman Dashboard"
        ];
        $data_session = array (
          'username' => 'admin',
          'status' => 'login'
        );
        $this->session->set_userdata($data_session);
      }
      header('Content-type: application/json');
      echo json_encode($data);
    }

    public function insert_pengguna_post(){
      $data = [
        'username' => $this->post('username'),
        'password' => $this->post('password'),
        'namaAdmin' => $this->post('namaAdmin')
      ];
      $query = $this->u_models->insert_pengguna($data);
      if($query == true){
        $data = [
          'code' => 1,
          'message' => "Berhasil memasukkan data admin baru!"
        ];
      } else {
        $data = [
          'code' => 0,
          'message' => "Terjadi kesalahan! Harap periksa apakah username sudah terpakai?"
        ];
      }
      header('Content-type: application/json');
      echo json_encode($data);
    }

    public function update_pengguna_post(){
      $data = [
        'username' => $this->post('username'),
        'namaAdmin' => $this->post('namaAdmin')
      ];
      $query = $this->u_models->update_pengguna($data);
      if($query == true){
        $data = [
          'code' => 1,
          'message' => "Berhasil memperbarui data admin!"
        ];
      } else {
        $data = [
          'code' => 0,
          'message' => "Terjadi kesalahan! Harap hubungi sysadmin!"
        ];
      }
      header('Content-type: application/json');
      echo json_encode($data);
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
        'sentimen' => $tingkat_sentimen
      ];
        if(in_array($kata,$neg) || in_array($kata,$neu) || in_array($kata,$pos)){
          $data = [
            'code' => 0,
            'message' => "Kata sudah ada dalam bank data!"
          ];
        } else {
          $query = $this->b_models->insert_kata($data);
          if($query == false){
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
        }
      header('Content-type: application/json');
      echo json_encode($data);
    }

    public function update_kata_post(){
      require_once(APPPATH."libraries/lib/PHPInsight/dictionaries/source.negatif.php");
      require_once(APPPATH."libraries/lib/PHPInsight/dictionaries/source.netral.php");
      require_once(APPPATH."libraries/lib/PHPInsight/dictionaries/source.positif.php");
      $data = [];
      $kata = strtolower($this->post('kata'));
      $tingkat_sentimen = $this->post('tingkat_sentimen');
      $data = [
        'kata' => $kata,
        'sentimen' => $tingkat_sentimen
      ];
        if(in_array($kata,$neg) || in_array($kata,$neu) || in_array($kata,$pos)){
          $data = [
            'code' => 0,
            'message' => "Kata sudah ada dalam bank data!"
          ];
        } else {
          $query = $this->b_models->update_kata($data);
          if($query == false){
            $data = [
              'code' => 0,
              'message' => "Terjadi kesalahan! Mohon hubungi sysadmin!"
            ];
          } else {
            $data = [
              'code' => 1,
              'message' => "Kata sudah diperbarui!"
            ];
          }
        }
      header('Content-type: application/json');
      echo json_encode($data);
    }

    public function delete_kata_post(){
      $data = [];
      $kata = strtolower($this->post('kata'));
      $tingkat_sentimen = $this->post('tingkat_sentimen');
      $data = [
        'kata' => $kata,
        'sentimen' => $tingkat_sentimen
      ];
      $query = $this->b_models->delete_kata($data);
      if($query == false){
            $data = [
              'code' => 0,
              'message' => "Terjadi kesalahan! Mohon hubungi sysadmin!"
            ];
          } else {
            $data = [
              'code' => 1,
              'message' => "Kata sudah berhasil dihapus!"
            ];
          }
      header('Content-type: application/json');
      echo json_encode($data);
    }
}
