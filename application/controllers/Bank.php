<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
		{
				parent::__construct();
				$this->load->model('b_models');
		}

	public function index()
	{
		$data['title'] = "Halaman Bank Kata";
		$data['negatif'] = $this->b_models->kata_negatif()->result();
		$this->load->view('bank/index',$data);
	}

	public function Tambah()
	{
		$data['title'] = "Tambah Kata Baru";
		$this->load->view('bank/tambah',$data);
	}
}
