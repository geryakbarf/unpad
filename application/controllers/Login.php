<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username') != null)
			redirect(base_url().'Dashboard', 'refresh');
		$data['title'] = "Halaman Login";
		$this->load->view('login/index',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'Login', 'refresh');
	}

}
