<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	  {
	      parent::__construct();
				if($this->session->userdata('username') == null)
					redirect(base_url().'Login', 'refresh');
				$this->load->model('u_models');
	  }

	public function index()
	{
		$data['title'] = "Halaman Pengguna";
		$data['user'] = $this->u_models->get_all_user()->result();
		$this->load->view('pengguna/index',$data);
	}

	public function Tambah()
	{
		$data['title'] = "Tambah Pengguna";
		$this->load->view('pengguna/tambah',$data);
	}

	public function edit(){
		$data['title'] = "Edit Pengguna";
		$username = $this->input->get('username');
		$data['user'] = $this->u_models->get_one_user($username)->result();
		$this->load->view('pengguna/edit',$data);
	}
}
