<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
		{
				parent::__construct();
		}

	public function index()
	{
		$data['title'] = "Halaman Bank Kata";
		$this->load->view('bank/index',$data);
	}

	public function Tambah()
	{
		$data['title'] = "Tambah Kata Baru";
		$this->load->view('bank/tambah',$data);
	}
}
