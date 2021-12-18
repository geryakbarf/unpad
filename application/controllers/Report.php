<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
		$data['title'] = "Halaman Report";
		$this->load->view('report/index',$data);
	}
}
