<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model(array('sentimen_models', 'konten_models'));
			if($this->session->userdata('username') == null)
				redirect(base_url().'Login', 'refresh');
	}

	public function index()
	{
		$data['title'] = "Halaman Report";

		$sentimen_data = $this->sentimen_models->get_all_sentimen();
		$sentimen = $this->sentimen_models->get_sentimen_group();

		if($sentimen_data->num_rows() > 0) {
			//data pie chart
			$record = $sentimen->result();

			$data['label'] = array();
			$data['data'] = array();

			foreach($record as $row) {
					$data['label'][] = $row->sentimen;
					$data['data'][] = round(((int) $row->jumlah_sentimen/$sentimen_data->num_rows())*100, 2);
			}

			// data line chart
			//positif
			$sentimen_positif = $this->sentimen_models->get_sentimen_by_tanggal('positif');
			$record = $sentimen_positif->result();
			// $data = [];
			$data['line_label'] = array();
			$data['line_data_positif'] = array();

			foreach($record as $row) {
				$data['line_data_positif'][] = $row->jumlah_sentimen;
				$data['line_label'][] = date('d-m-Y', strtotime($row->tanggalPosting));
			}

			//negatif
			$sentimen_negatif = $this->sentimen_models->get_sentimen_by_tanggal('negatif');
			$record = $sentimen_negatif->result();
			// $data = [];

			$data['line_data_negatif'] = array();

			foreach($record as $row) {
				$data['line_data_negatif'][] = $row->jumlah_sentimen;
			}

			//netral
			$sentimen_netral = $this->sentimen_models->get_sentimen_by_tanggal('netral');
			$record = $sentimen_netral->result();
			// $data = [];
			$data['line_data_netral'] = array();

			foreach($record as $row) {
				$data['line_data_netral'][] = $row->jumlah_sentimen;
			}

			$data['chart_data'] = json_encode($data);
			$data['total_sentimen'] = $this->sentimen_models->get_total_sentimen();
		}

		$data['all_sentimen'] =  $this->sentimen_models->get_all_sentimen()->result();
		$this->load->view('report/index',$data);
	}
}
