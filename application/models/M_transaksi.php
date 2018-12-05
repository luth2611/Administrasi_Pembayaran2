<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_transaksi extends CI_Model{

	private $primary_key = 'id_transaksi';
	private $table_name	= 'Transaksi';

	public function __construct()
	{
	
		parent::__construct();
	
	}

	public function addTransaksi($table,$data){
		$this->db->insert($table,$data);
		return true;
	}

	public function getTransaksiPerbulan($nis){
		$query = 'SELECT siswa.nis,siswa.nama_lengkap,biaya.idbiaya,biaya.jenis_biaya,biaya.jumlah,transaksi.id_transaksi,sum(transaksi.sudah_bayar) as sudah_bayar,transaksi.tahun_ajaran,transaksi.bulan 
		FROM `siswa`,transaksi,biaya
		where transaksi.nis = siswa.nis
		and transaksi.jenis_biaya = biaya.idbiaya
		and siswa.nis = '.$nis.'
		and biaya.status = 2
		group by transaksi.bulan, biaya.idbiaya';
		return $this->db->query($query);
	}
	public function getTransaksiPerbulanForLaporan($nis,$idbiaya){
		$query = 'SELECT siswa.nis,siswa.nama_lengkap,biaya.idbiaya,biaya.jenis_biaya,biaya.jumlah,transaksi.id_transaksi,sum(transaksi.sudah_bayar) as sudah_bayar,transaksi.tahun_ajaran,transaksi.bulan 
		FROM `siswa`,transaksi,biaya
		where transaksi.nis = siswa.nis
		and transaksi.jenis_biaya = biaya.idbiaya
		and siswa.nis = '.$nis.'
		and biaya.idbiaya = '.$idbiaya.'
		and biaya.status = 2
		group by transaksi.bulan, biaya.idbiaya
		order by transaksi.bulan desc';
		return $this->db->query($query);
	}
	public function getTransaksiInsidentil($nis){
		$query = 'SELECT siswa.nis,siswa.nama_lengkap,biaya.idbiaya,biaya.jenis_biaya,biaya.jumlah,transaksi.id_transaksi,sum(transaksi.sudah_bayar) as sudah_bayar,transaksi.tahun_ajaran 
		FROM `siswa`,transaksi,biaya
		where transaksi.nis = siswa.nis
		and transaksi.jenis_biaya = biaya.idbiaya
		and siswa.nis = '.$nis.'
		and biaya.status = 1
        group by idbiaya ';
		return $this->db->query($query);

	}
	public function getSisaBayar($nis,$idbiaya){
		$query = 'select biaya.jumlah - sum(transaksi.sudah_bayar) as sisa_bayar,biaya.jumlah
		from transaksi,biaya
		where transaksi.jenis_biaya = biaya.idbiaya
		and nis = '.$nis.'
		and transaksi.jenis_biaya = '.$idbiaya;
		return $this->db->query($query);
	}
	public function getSisaBayarPerbulan($nis,$bulan,$idbiaya){
		$query = 'select biaya.jumlah - sum(transaksi.sudah_bayar) as sisa_bayar,biaya.jumlah
		from transaksi,biaya
		where transaksi.jenis_biaya = biaya.idbiaya
		and nis = '.$nis.'
		and bulan ="'.$bulan.'"
		and transaksi.jenis_biaya = '.$idbiaya;
		return $this->db->query($query);
	}
	public function getData($table,$select,$where = null){
		$this->db->select($select);
		$this->db->from($table);
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get();
		
	}

	public function get() 
	{
	  	
	  	$this->db->select('*');

		return $this->db->get($this->table_name)->result();
	
	}

	public function get_raudoh(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.sudah_bayar');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_porseni(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.sudah_bayar');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_majalah(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.sudah_bayar');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_seragam(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar,  transaksi.sudah_bayar');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_spp(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar,  transaksi.sudah_bayar');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_fasilitas(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.sudah_bayar');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_manasik(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar, transaksi.sudah_bayar');
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('biaya', 'transaksi.jenis_biaya = biaya.idbiaya');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_pesertabaru(){
		$this->db->select('siswa.nis, siswa.nama_lengkap, biaya.jenis_biaya, transaksi.tanggal_bayar,transaksi.sudah_bayar');
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

	public function sendSMS($table,$data){
		$this->db->insert($table,$data);
	}

}