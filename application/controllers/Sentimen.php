<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sentimen extends CI_Controller {

	public function __construct()
		{
				parent::__construct();
				$this->load->model('s_models');
				if($this->session->userdata('username') == null)
					redirect(base_url().'Login', 'refresh');
		}

	public function index()
	{
		$data['title'] = "Halaman Sentimen";
		$data['sentimen'] = $this->s_models->get_all_sentimen()->result();
		$this->load->view('sentimen/index',$data);
	}

}
