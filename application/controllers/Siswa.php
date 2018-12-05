<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		// Call the CI_Controller constructor
		parent::__construct();


		
		$this->load->model('SiswaModel');
		
		$this->load->helper('url');

	}

	public function index()
	{	
		//$data['siswa'] = $this->get();
		// print_r($data);

		$data['siswa'] = $this->SiswaModel->view();
		$this->load->view('header.php');
		$this->load->view('index_siswa.php',$data);
		$this->load->view('footer.php');
	}
	public function list_siswa(){
		$data['siswa'] = $this->SiswaModel->view();
		$this->load->view('header.php');
		$this->load->view('index_siswa',$data);
		$this->load->view('footer.php');
	}

	public function tambah(){
    // if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      // if($this->SiswaModel->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
         // Panggil fungsi save() yang ada di SiswaModel.php

        $this->SiswaModel->save($this->input->post(null,true));
        redirect('siswa/list_siswa');
  }

  // public function ubah($nis){
  //   if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
  //     if($this->SiswaModel->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
  //       $this->SiswaModel->edit($nis); // Panggil fungsi edit() yang ada di SiswaModel.php
  //       redirect('siswa/list_siswa');
  //     }
  //   }
    
  //   $data['siswa'] = $this->SiswaModel->view_by($nis);
  //   $this->load->view('header.php');
  //   $this->load->view('form_ubah', $data);
  //   $this->load->view('footer.php');
  // }

	public function hapus($nis){
    $query = $this->SiswaModel->delete($nis); // Panggil fungsi delete() yang ada di SiswaModel.php
    redirect('siswa/list_siswa');
  }	

	public function getSiswa(){
		$data['siswa'] = $this->SiswaModel->getSiswa("*","siswa")->result();
		echo json_encode($data);

	}

	public function ubah(){
    // if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      // if($this->BiayaModel->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
      $data['nama_lengkap'] = $this->input->post('nama_lengkap_ubah');
      $data['tgl_lahir'] = $this->input->post('tgl_lahir_ubah');
      $data['jenis_kel'] = $this->input->post('jenis_kel_ubah');
      $data['kelas'] = $this->input->post('kelas_ubah');
      $data['alamat'] = $this->input->post('alamat_ubah');
      $data['nama_ayah'] = $this->input->post('nama_ayah_ubah');
      $data['nama_ibu'] = $this->input->post('nama_ibu_ubah');
      $data['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah_ubah');
      $data['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu_ubah');
      $data['no_telp'] = $this->input->post('no_telp_ubah');
      $data['tahun_ajaran'] = $this->input->post('tahun_ajaran_ubah');
      $nis = $this->input->post('nis');
        $this->SiswaModel->edit($this->input->post(null,true),array('nis'=>$nis)); // Panggil fungsi edit() yang ada di SiswaModel.php
        redirect('siswa/list_siswa');
      // }
    // }
    
  }

  
	
}
