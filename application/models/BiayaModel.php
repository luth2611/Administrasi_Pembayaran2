<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class BiayaModel extends CI_Model {
  // Fungsi untuk menampilkan semua data siswa
  public function view(){
    return $this->db->get('biaya')->result();
  }
  
  // Fungsi untuk menampilkan data siswa berdasarkan NIS nya
  public function view_by($jenis_bayar){
    $this->db->where('jenis_biaya', $jenis_bayar);
    return $this->db->get('biaya')->row();
  }
  
  // Fungsi untuk validasi form tambah dan ubah
  public function validation($mode){
    $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    
    // Tambahkan if apakah $mode save atau update
    // Karena ketika update, NIS tidak harus divalidasi
    // Jadi NIS di validasi hanya ketika menambah data siswa saja
    if($mode == "save")
      $this->form_validation->set_rules('input_jenis_biaya', 'jenis_biaya', 'required|max_length[11]');
      $this->form_validation->set_rules('input_Jumlah', 'Jumlah', 'required|max_length[50]');
    
      
    if($this->form_validation->run()) // Jika validasi benar
      return TRUE; // Maka kembalikan hasilnya dengan TRUE
    else // Jika ada data yang tidak sesuai validasi
      return FALSE; // Maka kembalikan hasilnya dengan FALSE
  }
  
  // Fungsi untuk melakukan simpan data ke tabel siswa
  public function save(){
    $data = array(
      "jenis_biaya" => $this->input->post('input_jenis_biaya'),
      "jumlah" => $this->input->post('input_Jumlah')
    
    );
    
    $this->db->insert('biaya', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data siswa berdasarkan NIS siswa
  public function edit($data,$where){
    $this->db->where($where);
    $this->db->update('biaya', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
  public function delete($jenis_biaya){
    $this->db->where('idbiaya', $jenis_biaya);
    $this->db->delete('biaya'); // Untuk mengeksekusi perintah delete data
  }
}