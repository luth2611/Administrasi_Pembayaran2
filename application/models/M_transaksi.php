<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_transaksi extends CI_Model{

	private $primary_key = 'id_transaksi';
	private $table_name	= 'Transaksi';

	public function __construct()
	{
	
		parent::__construct();
	
	}

	public function get() 
	{
	  	
	  	$this->db->select('*');

		return $this->db->get($this->table_name)->result();
	
	}

	public function get_raudoh(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_porseni(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_majalah(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_seragam(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_spp(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_fasilitas(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_manasik(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_pesertabaru(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.jumlah, transaksi.sudah_bayar, transaksi.sisa_tagihan, transaksi.keterangan');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
	  
	  	$this->db->where($this->primary_key,$id); 
	  
	  	return $this->db->get($this->table_name)->row();
	
	}

}