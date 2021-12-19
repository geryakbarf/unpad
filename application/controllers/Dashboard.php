<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	  {
	      parent::__construct();
	      include(APPPATH."libraries/autoload.php");
				if($this->session->userdata('username') == null)
					redirect(base_url().'Login', 'refresh');
	  }

	public function index(){
		$data['title'] = "Halaman Dashboard";
		$this->load->view('dashboard/index',$data);
	}

	public function pendidikan(){
		$data['title'] = "Trending #Pendidikan";
		$this->load->view('dashboard/pendidikan',$data);
	}

	public function penelitian(){
		$data['title'] = "Trending #Penelitian";
		$this->load->view('dashboard/penelitian',$data);
	}

	public function mahasiswa(){
		$data['title'] = "Trending #Mahasiswa";
		$this->load->view('dashboard/mahasiswa',$data);
	}

	public function alumni(){
		$data['title'] = "Trending #Alumni";
		$this->load->view('dashboard/alumni',$data);
	}

	public function penerimaan(){
		$data['title'] = "Trending #Penerimaan";
		$this->load->view('dashboard/penerimaan',$data);
	}
}
