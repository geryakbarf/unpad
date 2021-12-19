<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
		{
				parent::__construct();
				$this->load->model('b_models');
				if($this->session->userdata('username') == null)
					redirect(base_url().'Login', 'refresh');
		}

	public function index()
	{
		$data['title'] = "Halaman Bank Kata";
		$data['negatif'] = $this->b_models->kata_negatif()->result();
		$data['positif'] = $this->b_models->kata_positif()->result();
		$data['netral'] = $this->b_models->kata_netral()->result();
		$this->load->view('bank/index',$data);
	}

	public function Tambah()
	{
		$data['title'] = "Tambah Kata Baru";
		$this->load->view('bank/tambah',$data);
	}

	public function edit(){
		$data['title'] = "Edit Kata";
		$kata = $this->input->get('kata');
		$data['kata'] = $this->b_models->get_one_kata($kata)->result();
		$this->load->view('bank/edit',$data);
	}
}
