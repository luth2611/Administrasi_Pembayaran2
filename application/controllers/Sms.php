<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$this->load->model('M_transaksi');

		$data['transaksi'] = $this->M_transaksi->get();
		$this->load->view('header.php');
		$this->load->view('footer.php');
	}

	

	public function SMS()
	{
		$this->load->model('SmsModel');
		$data["sms"] = $this->SmsModel->get_sms();	
		$this->load->view('header');
		$this->load->view('sms_view.php',$data);
		$this->load->view('footer');
	}

	
	}
