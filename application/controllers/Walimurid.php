<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walimurid extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('M_transaksi');
  }

  public function index()
	{
    $nis = $this->session->userdata('nis');
    $data['trs_insidentil'] = $this->M_transaksi->getTransaksiInsidentil($nis)->result_array();
		$data['biaya_bulanan'] = $this->M_transaksi->getData('biaya','idbiaya,jenis_biaya,jumlah,status',array('status'=>'2'))->result_array();		
		for($i = 0; $i < count($data['biaya_bulanan']); $i++){
			$trs_perbulan = $this->M_transaksi->getTransaksiPerbulanForLaporan($nis,$data['biaya_bulanan'][$i]['idbiaya'])->result_array();
			$data['biaya_bulanan'][$i]['trs_perbulan'] = $trs_perbulan;
		}
    $this->load->view('header');
		$this->load->view('walimurid_view',$data);
		$this->load->view('footer');
    // $this->load->view('walimurid_view');
	}

}
 ?>
