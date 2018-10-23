<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$this->load->model('M_transaksi');

		$data['transaksi'] = $this->M_transaksi->get();
		$this->load->library('cart');
		$this->load->view('header.php');
		$this->load->view('footer.php');
	}

	

	public function SPP()
	{
		$this->load->model('M_transaksi');
		$data["spp"] = $this->M_transaksi->get_spp();	
		$this->load->view('header');
		$this->load->view('spp_view.php',$data);
		$this->load->view('footer');
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

}