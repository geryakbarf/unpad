<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	  {
	      parent::__construct();
	      include(APPPATH."libraries/autoload.php");
	  }

	public function index()
	{
		$data['title'] = "Halaman Dashboard";
		$this->load->view('dashboard/index',$data);
	}
}
