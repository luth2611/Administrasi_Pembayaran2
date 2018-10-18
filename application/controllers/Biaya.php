<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya extends CI_Controller {

	public function __construct(){
		// Call the CI_Controller constructor
		parent::__construct();

		$this->load->model('BiayaModel');
		$this->load->helper('url');


	}

	public function index()
	{	
		//$data['siswa'] = $this->get();
		// print_r($data);
		$this->load->view('header.php');
		$this->load->view('halaman_utama');
		$this->load->view('footer.php');
	}
	public function list_biaya(){
		$data['biaya'] = $this->BiayaModel->view();
		$this->load->view('header.php');
		$this->load->view('index_biaya',$data);
		$this->load->view('footer.php');
	}

	public function tambah(){
    if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      if($this->BiayaModel->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
        $this->BiayaModel->save(); // Panggil fungsi save() yang ada di SiswaModel.php
        redirect('biaya/list_biaya');
      }
    }
    $this->load->view('header.php');
    $this->load->view('add_biaya');
    $this->load->view('footer.php');
  }

  public function ubah(){
    // if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
      // if($this->BiayaModel->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
      $data['jumlah'] = $this->input->post('jumlah_ubah');
      $data['jenis_biaya'] = $this->input->post('jenis_biaya_ubah');
      $id = $this->input->post('id_ubah');
        $this->BiayaModel->edit($data,array('idbiaya'=>$id)); // Panggil fungsi edit() yang ada di SiswaModel.php
        redirect('biaya/list_biaya');
      // }
    // }
    
  }

	public function hapus($jenis_bayar){
    $this->BiayaModel->delete($jenis_bayar); // Panggil fungsi delete() yang ada di SiswaModel.php
    redirect('biaya/list_biaya');
  }	

	
	
}
