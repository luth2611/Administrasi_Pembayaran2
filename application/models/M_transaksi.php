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
	  	
	  	$this->db->select('id_transaksi,id_siswa,id_biaya,sisa_tagihan,status,nominal');

		return $this->db->get($this->table_name)->result();
	
	}

	public function get_by_id($id)
	{
	  
	  	$this->db->where($this->primary_key,$id); 
	  
	  	return $this->db->get($this->table_name)->row();
	
	}

}