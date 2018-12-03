<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$this->load->model('M_transaksi');
		$this->load->model('SiswaModel');
		$this->load->model('BiayaModel');
		$data["siswa"] = $this->SiswaModel->view();
		$data["biaya"] = $this->BiayaModel->view();
		$data["spp"] = $this->M_transaksi->get_spp();
		$this->load->view('header');
		$this->load->view('spp_view.php',$data);
		$this->load->view('footer');
	}

	public function getTransaksiPerbulan($nis){
		$this->load->model('M_transaksi');
		$data['trs'] = $this->M_transaksi->getTransaksiPerbulan($nis)->result();
		echo json_encode($data);
	}
	public function getTransaksiInsidentil($nis){
		$this->load->model('M_transaksi');
		$data['trs'] = $this->M_transaksi->getTransaksiInsidentil($nis)->result();
		echo json_encode($data);
	}

	public function getSisaBayar($nis,$idbiaya){
		$this->load->model('M_transaksi');
		$data = $this->M_transaksi->getSisaBayar($nis,$idbiaya)->result();
		echo json_encode($data);
	}
	public function getSisaBayarPerbulan($nis,$bulan,$idbiaya){
		$this->load->model('M_transaksi');
		$data = $this->M_transaksi->getSisaBayarPerbulan($nis,$bulan,$idbiaya)->result();
		echo json_encode($data);
	}
	public function addTransaksi(){
		$this->load->model('M_transaksi');
		$data['nis'] = $this->input->post('nis_bayar');
		$data['jenis_biaya'] = $this->input->post('jenis_biaya_bayar');
		$data['tanggal_bayar'] = date('Y-m-d');
		if($data['jenis_biaya'] == 12 || $data['jenis_biaya'] == 16){
			$data['bulan'] = $this->input->post('bulan_bayar');
		}
		$data['sudah_bayar'] = $this->input->post('jumlah_bayar');
		$data['tahun_ajaran'] = $this->input->post('tahun_ajaran');

		$this->M_transaksi->addTransaksi('transaksi',$data);
		echo json_encode('1');
		
	}

	public function getJumlahJenisBiaya($idBiaya){
		$this->load->model('M_transaksi');
		$biaya = $this->M_transaksi->getData('biaya','*',array('idbiaya'=>$idBiaya))->result();
		echo json_encode($biaya);
	}

	public function manasik()
	{
		$this->load->model('M_transaksi');
		$data["manasik"] = $this->M_transaksi->get_manasik();	
		$this->load->view('header');
		$this->load->view('manasik_view.php',$data);
		$this->load->view('footer');
	}

	public function seragam()
	{
		$this->load->model('M_transaksi');
		$data["seragam"] = $this->M_transaksi->get_seragam();	
		$this->load->view('header');
		$this->load->view('seragam_view.php',$data);
		$this->load->view('footer');
	}

	public function pesertabaru()
	{
		$this->load->model('M_transaksi');
		$data["pesertabaru"] = $this->M_transaksi->get_pesertabaru();	
		$this->load->view('header');
		$this->load->view('pesertabaru_view.php',$data);
		$this->load->view('footer');
	}

	public function porseni()
	{
		$this->load->model('M_transaksi');
		$data["porseni"] = $this->M_transaksi->get_porseni();	
		$this->load->view('header');
		$this->load->view('porseni_view.php',$data);
		$this->load->view('footer');
	}

	public function raudoh()
	{
		$this->load->model('M_transaksi');
		$data["raudoh"] = $this->M_transaksi->get_raudoh();	
		$this->load->view('header');
		$this->load->view('raudoh_view.php',$data);
		$this->load->view('footer');
		# code...
	}

	public function majalah()
	{
		$this->load->model('M_transaksi');
		$data["majalah"] = $this->M_transaksi->get_majalah();	
		$this->load->view('header');
		$this->load->view('majalah_view.php',$data);
		$this->load->view('footer');
		# code...
	}

	public function fasilitas()
	{
		$this->load->model('M_transaksi');
		$data["fasilitas"] = $this->M_transaksi->get_fasilitas();	
		$this->load->view('header');
		$this->load->view('fasilitas_view.php',$data);
		$this->load->view('footer');
		# code...
	}

	public function bayar_spp(){

		$this->load->model('M_transaksi');
		$nis=$this->input->post('nis_bayar');
		$jumlah=$this->input->post('jumlah_bayar');
		$bulan=$this->input->post('bulan_bayar');
		$tahun_ajaran=$this->input->post('tahun_ajaran_bayar');
		$this->load->model('BiayaModel');
		$biaya = $this->BiayaModel->get_view_by("SPP BULANAN");
		$sisa_bayar = $biaya - $jumlah;
		if($jumlah == 0){
			$keterangan = "LUNAS";
		}else{
			$keterangan = "BELUM LUNAS";
		}
		$tanggal = date("Y-m-d");
		$this->M_transaksi->get_view_by();

	}

	public function cetak_pembayaran($nis){
		$this->load->model('M_transaksi');
		$data['DestinationNumber'] = '+6285720768168';
		$data['TextRecorder'] = 'Anda mendapat informasi spp terkini';
		$data['CreatorID'] = 'Gammu';
		 $this->M_transaksi->sendSMS('outbox',$data);
		// $this->load->view('cetakBayar',$data);
	}

}