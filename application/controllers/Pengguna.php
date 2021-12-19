<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	  {
	      parent::__construct();
				if($this->session->userdata('username') == null)
					redirect(base_url().'Login', 'refresh');
	  }

	public function index()
	{
		$data['title'] = "Halaman Pengguna";
		$this->load->view('pengguna/index',$data);
	}
}
