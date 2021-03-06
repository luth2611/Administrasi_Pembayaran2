<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class SiswaModel extends CI_Model {
  // Fungsi untuk menampilkan semua data siswa
  public function view(){
    return $this->db->get('siswa')->result();
  }
  
  // Fungsi untuk menampilkan data siswa berdasarkan NIS nya
  public function view_by($nis){
    $this->db->where('nis', $nis);
    return $this->db->get('siswa')->row();
  }
  
  // Fungsi untuk validasi form tambah dan ubah
  public function validation($mode){
    $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    
    // Tambahkan if apakah $mode save atau update
    // Karena ketika update, NIS tidak harus divalidasi
    // Jadi NIS di validasi hanya ketika menambah data siswa saja
    if($mode == "save")
      $this->form_validation->set_rules('input_nis', 'NIS', 'required|numeric|max_length[11]');
    
    $this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
    $this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('input_telp', 'telp', 'required|numeric|max_length[15]');
    $this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
      
    if($this->form_validation->run()) // Jika validasi benar
      return TRUE; // Maka kembalikan hasilnya dengan TRUE
    else // Jika ada data yang tidak sesuai validasi
      return FALSE; // Maka kembalikan hasilnya dengan FALSE
  }
  
  // Fungsi untuk melakukan simpan data ke tabel siswa
  public function save($data){
    $this->db->insert('siswa', $data); // Untuk mengeksekusi perintah insert data
  }

  public function insert($table,$data){
    $this->db->insert($table,$data);
  }
  
  // Fungsi untuk melakukan ubah data siswa berdasarkan NIS siswa
  public function edit($data,$where){
    // $data = array(
    //   "nama_lengkap" => $this->input->post('input_nama'),
    //   "tmpt_lahir" => $this->input->post('input_tgl_lahir'),
    //   "jenis_kel" => $this->input->post('input_jeniskelamin'),
    //   "kelas" => $this->input->post('input_kelas'),
    //   "alamat" => $this->input->post('input_alamat'),
    //   "nama_ayah" => $this->input->post('input_ayah'),
    //   "nama_ibu" => $this->input->post('input_ibu'),
    //   "pekerjaan_ayah" => $this->input->post('input_pekerjaan_ayah'),
    //   "pekerjaan_ibu" => $this->input->post('input_pekerjaan_ibu'),
    //   "no_telp" => $this->input->post('input_telp'),
    //   "tahun_ajaran" => $this->input->post('input_thn')
    // );
    
    $this->db->where($where);
    $this->db->update('siswa', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
  public function delete($nis){
    $this->db->where('nis', $nis);
    $this->db->delete('siswa'); // Untuk mengeksekusi perintah delete data
    return '1';
  }

  public function getSiswa($select,$table,$where = null){
      $this->db->select($select);
      $this->db->from($table);
      if($where != null){
        $this->db->where($where);
      }
      return $this->db->get();

  }
}