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
// fungsi untuk mengambil transaksi perbulan
	public function getTransaksiPerbulan($nis){
		$this->load->model('M_transaksi');
		$data['trs'] = $this->M_transaksi->getTransaksiPerbulan($nis)->result();
		echo json_encode($data);
	}
//  fungsi untuk mengambil transaksi pertahun / insidentil 
	public function getTransaksiInsidentil($nis){
		$this->load->model('M_transaksi');
		$data['trs'] = $this->M_transaksi->getTransaksiInsidentil($nis)->result();
		echo json_encode($data);
	}
//  fungsi untuk mengambil sisa bayar dari siswa
	public function getSisaBayar($nis,$idbiaya){
		$this->load->model('M_transaksi');
		$data = $this->M_transaksi->getSisaBayar($nis,$idbiaya)->result();
		echo json_encode($data);
	}
//  fungsi untuk mengambil sisa bayar perbulan
	public function getSisaBayarPerbulan($nis,$bulan,$idbiaya){
		$this->load->model('M_transaksi');
		$data = $this->M_transaksi->getSisaBayarPerbulan($nis,$bulan,$idbiaya)->result();
		echo json_encode($data);
	}	
//  fungsi untuk menambahkan transaksi
	public function addTransaksi(){
		$this->load->model('M_transaksi');
		$data['nis'] = $this->input->post('nis_bayar');
		$data['jenis_biaya'] = $this->input->post('jenis_biaya_bayar');
		$data['tanggal_bayar'] = date('Y-m-d');
//  pengecekan apakah transaksi yang di input itu perbulan / insidentil
//  apabila transaksi perbulan maka field bulan bayar ditambahkan
//  apabila transaksi insidentil maka bulan bayar tiddak ditambahkan 
		if(!empty($this->input->post('bulan_bayar'))){
			$data['bulan'] = $this->input->post('bulan_bayar');
		}
		$data['sudah_bayar'] = $this->input->post('jumlah_bayar');
		$data['tahun_ajaran'] = $this->input->post('tahun_ajaran');

		$this->M_transaksi->addTransaksi('transaksi',$data);
		echo json_encode('1');
		
	}
//  fungsi untuk mengambil data jenis bayar
	public function getJumlahJenisBiaya($idBiaya){
		$this->load->model('M_transaksi');
		$biaya = $this->M_transaksi->getData('biaya','*',array('idbiaya'=>$idBiaya))->result();
		echo json_encode($biaya);
	}

//  fungsi untuk mengambil status apakah biaya tersebut perbulan atau insidentil
	public function cekBiaya($idBiaya){
		$this->load->model('M_transaksi');
		$biaya = $this->M_transaksi->getData('biaya','status',array('idbiaya'=>$idBiaya))->result_array();
		echo json_encode($biaya);
	}
	

	//  fungsi untuk mencetak transaksi pembayaran
	public function cetak_pembayaran($nis){
		// load library mpdf
		$this->load->library('m_pdf');
		$this->load->model('M_transaksi');
		// get data siswa
		$data['siswa'] = $this->M_transaksi->getData('siswa','*',array('nis'=>$nis))->result_array();
		// get data transaksi insidentil 
		$data['trs_insidentil'] = $this->M_transaksi->getTransaksiInsidentil($nis)->result_array();
		//  get biaya bulanan di table master biaya
		$data['biaya_bulanan'] = $this->M_transaksi->getData('biaya','idbiaya,jenis_biaya,jumlah,status',array('status'=>'2'))->result_array();		
		//  menampilkan data biaya bulanan beserta transaksi yang telah dibayarkan
		for($i = 0; $i < count($data['biaya_bulanan']); $i++){
			$trs_perbulan = $this->M_transaksi->getTransaksiPerbulanForLaporan($nis,$data['biaya_bulanan'][$i]['idbiaya'])->result_array();
			$data['biaya_bulanan'][$i]['trs_perbulan'] = $trs_perbulan;
		}
	
		//this data will be passed on to the view
		$data['data']=$this->input->post(null, true);
		//load the view, pass the variable and do not show it but "save" the output into $html variable
		$html=$this->load->view('cetakBayar', $data, true);
		//this the the PDF filename that user will get to download
		$pdfFilePath = "the_pdf_output.pdf";
		//load mPDF library
		$this->load->library('m_pdf');
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$pdf->WriteHTML($html);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "I");
		// echo var_dump($data['biaya_bulanan']);
		$this->load->view('cetakBayar');
	}
//    fungsi untuk mengeksekusi sms, fungsi ini akan mengirimkan sms kepada siswa yang mempunyai tunggakan
//    fungsi ini akan mengecek data apa yang belum dibayarkan oleh orangtua siswa
	public function controlSMS(){
		$this->load->model('M_transaksi');
		// mengambil data siswa 
		$siswa = $this->M_transaksi->getData('siswa','nis,no_telp')->result_array();
		// melakukan pengulangan untuk setiap siswa agar dikirim sms ke setiap siswa yang mempunyai tunggakan
		foreach($siswa as $data){
			// memanggil fungsi kelolaSmsTagihanInsidentil
			$this->kelolaSmsTagihanInsidentil($data['nis']);
			// memanggil fungsi kelolaSmsTagihanBulanan
			$this->kelolaSmsTagihanBulanan($data['nis']);
		}
		redirect(site_url('Transaksi/'));
	}
//    fungsi untuk mengelola konten sms tagihan insidentil yang akan dikirimkan 
	public function kelolaSmsTagihanInsidentil($nis){
		$this->load->model('M_transaksi');
		$pesan = '';
		$where ='';
		$idBiaya = [];
		$no = 1;
//    	ambil data siswa terkait
		$siswa = $this->M_transaksi->getData('siswa','nama_lengkap,no_telp',array('nis'=>$nis))->result_array();
//     	ambil transaksi insidentil
		$trs_insidentil = $this->M_transaksi->getTransaksiInsidentil($nis)->result_array();
// 		memasukan data transaksi yang telah dibayar ke dalam array yang selanjutnya akan dibuat konten sms nya
		for($i = 0; $i < count($trs_insidentil); $i++){
			if($trs_insidentil[$i]['jumlah'] == $trs_insidentil[$i]['sudah_bayar'] ){
				array_push($idBiaya,$trs_insidentil[$i]['idbiaya']);
			}
		}
//      membuat where query ketika mencari data yang belum dibayarkan
		for($j = 0;$j < count($idBiaya);$j++){
			$where .= 'and idbiaya != '.$idBiaya[$j].' ';
		}
//      meng-query data insidentil yang belum dibayarkan
		$insidentilBelumBayar = $this->M_transaksi->getTrsInsidentilForSMS($where)->result_array();
// 		membuat konten sms
		$pesan .= 'Yth. Kepada orang tua '.$siswa[0]['nama_lengkap'].' anda terdata menunggak pembayaran (insidentil) berupa ';
//		memasukan data transaksi yang belum dibayarkan ke dalam konten sms 
		for($k = 0; $k < count($insidentilBelumBayar);$k++){
			$pesan .=' '.$insidentilBelumBayar[$k]['jenis_biaya'].', ';
		}
// 		apabila variable $insidentilBelumBayar tidak kosong maka panggil sendSMS untuk mengirim sms
		if(!empty($insidentilBelumBayar)){
			$pesan .= 'harap untuk segera dibayarkan, terima kasih';
			$this->sendSMS($pesan,$siswa[0]['no_telp'],'Insidentil');
			echo var_dump($pesan);
		}
		
		
	}
//     fungsi untuk mengelola konten sms tagihan bulanan
	public function kelolaSmsTagihanBulanan($nis){
		$this->load->model('M_transaksi');
		$pesan = '';
//		membuat list bulan 
		$listBulan = array(01=>'Januari',02=>'Februari',03=>'Maret',04=>'April',05=>'Mei',06=>'Juni',07=>'Juli',08=>'Agustus',09=>'September',10=>'Oktober',11=>'Nopember',12=>'Desember');
		$belumBayar ='';
		$belumLunas ='';
		$jenisBiaya = [];
		$bulan = [];
		$siswa = $this->M_transaksi->getData('siswa','nama_lengkap,no_telp',array('nis'=>$nis))->result_array();
		$biaya = $this->M_transaksi->getData('biaya','idbiaya,jenis_biaya',array('status'=>'2'))->result_array();
		$trs_perbulan = $this->M_transaksi->getTransaksiPerbulan($nis,date('F'))->result_array();
//		memasukkan data sudah bayar ke dalam array $jenisBiaya dan bulan nya kedalam array $bulan 
		for($i = 0; $i < count($trs_perbulan); $i++){
			if($trs_perbulan[$i]['jumlah'] != $trs_perbulan[$i]['sudah_bayar'] ){
				array_push($jenisBiaya,$trs_perbulan[$i]['jenis_biaya']);
				array_push($bulan,$trs_perbulan[$i]['bulan']);

			}
		} 
		for($j = 0;$j < count($biaya);$j++){
			$perbulanBelumBayar[$j] = $this->M_transaksi->getTrsPerbulanForSMS($nis,$biaya[$j]['idbiaya'],date('F'))->result_array();
			if(empty($perbulanBelumBayar[$j])){
				$belumBayar .= $biaya[$j]['jenis_biaya'].' Bulan '.$listBulan[date('m')].' ';
			}
			for($t = 0; $t < count($perbulanBelumBayar[$j]); $t++){
				if($perbulanBelumBayar[$j][$t]['jumlah'] != $perbulanBelumBayar[$j][$t]['sudah_bayar']){
					$belumLunas .= $perbulanBelumBayar[$j][$t]['jenis_biaya'].' ';
				}
			}
		}
// 		Buat pesannya
		$pesan .= 'Yth. Kepada orang tua '.$siswa[0]['nama_lengkap'].' anda terdata menunggak pembayaran (Bulanan) berupa ';
		for($k = 0; $k < count($jenisBiaya);$k++){
			$pesan .= $jenisBiaya[$k].' Bulan '.$bulan[$k].' ';
		}
		
		$pesan .= $belumBayar.' '.$belumLunas;
		$pesan .= ',harap untuk segera dibayarkan, terima kasih';
		$this->sendSMS($pesan,$siswa[0]['no_telp'],'Bulanan');
		echo var_dump($pesan);
	}
//    fungsi untuk mengirim sms
	public function sendSMS($pesan,$noTelp,$tagihan){
		$long_msg;
		$jumlah_pesan = 0;
//		mengecek apakah pesan yang di sms lebih dari 160 karakter 
		if (strlen($pesan) > 160){
//			membagi pesan menjadi 100 karakter per pesan 
			$long_msg = str_split($pesan,100);
//			menghitung jumlah potongan pesan yang akan dikirimkan 
			$jumlah_pesan = count($long_msg);
//			mengirim setiap potongan sms / menginputkan setiap pesan ke dalam table outbox 
			for($i = $jumlah_pesan; $i > 0; $i--){
				$data['DestinationNumber'] = $noTelp;
				$data['TextDecoded'] = $i.'/'.$jumlah_pesan.' ('.$tagihan.') '.$long_msg[$i-1];
				$data['CreatorID'] = 'Gammu 1.39.0';
				$data['Coding'] = 'Default_No_Compression';
				$id = $this->M_transaksi->sendSMS('outbox',$data);
		
			}
		}else{
//			mengirim setiap potongan sms / menginputkan setiap pesan ke dalam table outbox 
 
			$data['DestinationNumber'] = $noTelp;
			$data['TextDecoded'] = '('.$tagihan.') '.$pesan;
			$data['CreatorID'] = 'Gammu';

			$this->M_transaksi->sendSMS('outbox',$data);
			
		}
	}



	// public function bayar_spp(){
	// 	$this->load->model('M_transaksi');
	// 	$nis=$this->input->post('nis_bayar');
	// 	$jumlah=$this->input->post('jumlah_bayar');
	// 	$bulan=$this->input->post('bulan_bayar');
	// 	$tahun_ajaran=$this->input->post('tahun_ajaran_bayar');
	// 	$this->load->model('BiayaModel');
	// 	$biaya = $this->BiayaModel->get_view_by("SPP BULANAN");
	// 	$sisa_bayar = $biaya - $jumlah;
	// 	if($jumlah == 0){
	// 		$keterangan = "LUNAS";
	// 	}else{
	// 		$keterangan = "BELUM LUNAS";
	// 	}
	// 	$tanggal = date("Y-m-d");
	// 	$this->M_transaksi->get_view_by();

	// }

}