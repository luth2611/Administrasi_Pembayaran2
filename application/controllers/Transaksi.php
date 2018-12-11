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
		if(!empty($this->input->post('bulan_bayar'))){
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

	public function cekBiaya($idBiaya){
		$this->load->model('M_transaksi');
		$biaya = $this->M_transaksi->getData('biaya','status',array('idbiaya'=>$idBiaya))->result_array();
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
		$this->load->library('m_pdf');
		$this->load->model('M_transaksi');
		$data['siswa'] = $this->M_transaksi->getData('siswa','*',array('nis'=>$nis))->result_array();
		$data['trs_insidentil'] = $this->M_transaksi->getTransaksiInsidentil($nis)->result_array();
		$data['biaya_bulanan'] = $this->M_transaksi->getData('biaya','idbiaya,jenis_biaya,jumlah,status',array('status'=>'2'))->result_array();		
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

	public function controlSMS(){
		$this->load->model('M_transaksi');
		$siswa = $this->M_transaksi->getData('siswa','nis,no_telp')->result_array();
		foreach($siswa as $data){
			$this->kelolaSmsTagihanInsidentil($data['nis']);
			$this->kelolaSmsTagihanBulanan($data['nis']);
		}
		redirect(site_url('Transaksi/'));
	}

	public function kelolaSmsTagihanInsidentil($nis){
		$this->load->model('M_transaksi');
		$pesan = '';
		$where ='';
		$idBiaya = [];
		$no = 1;
		$siswa = $this->M_transaksi->getData('siswa','nama_lengkap,no_telp',array('nis'=>$nis))->result_array();
		$trs_insidentil = $this->M_transaksi->getTransaksiInsidentil($nis)->result_array();
		for($i = 0; $i < count($trs_insidentil); $i++){
			if($trs_insidentil[$i]['jumlah'] == $trs_insidentil[$i]['sudah_bayar'] ){
				array_push($idBiaya,$trs_insidentil[$i]['idbiaya']);
			}
		}
		for($j = 0;$j < count($idBiaya);$j++){
			$where .= 'and idbiaya != '.$idBiaya[$j].' ';
		}
		$insidentilBelumBayar = $this->M_transaksi->getTrsInsidentilForSMS($where)->result_array();
		$pesan .= 'Yth. Kepada orang tua '.$siswa[0]['nama_lengkap'].' anda terdata menunggak pembayaran (insidentil) berupa ';
		for($k = 0; $k < count($insidentilBelumBayar);$k++){
			$pesan .=' '.$insidentilBelumBayar[$k]['jenis_biaya'].', ';
		}
		if(!empty($insidentilBelumBayar)){
			$pesan .= 'harap untuk segera dibayarkan, terima kasih';
			$this->sendSMS($pesan,$siswa[0]['no_telp'],'Insidentil');
			echo var_dump($pesan);
		}
		
		
	}

	public function kelolaSmsTagihanBulanan($nis){
		$this->load->model('M_transaksi');
		$pesan = '';
		$listBulan = array(01=>'Januari',02=>'Februari',03=>'Maret',04=>'April',05=>'Mei',06=>'Juni',07=>'Juli',08=>'Agustus',09=>'September',10=>'Oktober',11=>'Nopember',12=>'Desember');
		$belumBayar ='';
		$belumLunas ='';
		$jenisBiaya = [];
		$bulan = [];
		$siswa = $this->M_transaksi->getData('siswa','nama_lengkap,no_telp',array('nis'=>$nis))->result_array();
		$biaya = $this->M_transaksi->getData('biaya','idbiaya,jenis_biaya',array('status'=>'2'))->result_array();
		$trs_perbulan = $this->M_transaksi->getTransaksiPerbulan($nis,date('F'))->result_array();
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

	public function sendSMS($pesan,$noTelp,$tagihan){
		$long_msg;
		$jumlah_pesan = 0;
		// $urutan = 1;
		$urutan_pesan = '01';
		$random_number = '050003D3';	
		if (strlen($pesan) > 160){
			$long_msg = str_split($pesan,100);
			$jumlah_pesan = count($long_msg);
			if($jumlah_pesan < 10){
				$random_number .= '0'.$jumlah_pesan;
			}else{
				$random_number .= $jumlah_pesan;
			}
			$urutan = 0;
			for($i = $jumlah_pesan; $i > 0; $i--){
				// $urutan = $urutan+1;
				$data['DestinationNumber'] = $noTelp;
				$data['TextDecoded'] = $i.'/'.$jumlah_pesan.' ('.$tagihan.') '.$long_msg[$i-1];
				// $data['Class'] = 1;
				$data['CreatorID'] = 'Gammu 1.39.0';
				// $data['UDH'] = $random_number.'01';
				// $data['MultiPart'] = 'true';
				$data['Coding'] = 'Default_No_Compression';
				$id = $this->M_transaksi->sendSMS('outbox',$data);
		
			}
			
			// for($i = 1; $i < $jumlah_pesan;$i++){
			// 	$datas['UDH'] = '';
			// 	if($jumlah_pesan <10){
			// 		$datas['UDH'] = $random_number.'0'.$urutan;
			// 	}
			// 	if($datas['UDH'] == ''){
			// 		$datas['UDH'] = $random_number.$urutan;
			// 	}
			// 	$datas['ID'] = $id;			
			// 	$datas['SequencePosition'] = $urutan;			
			// 	$datas['TextDecoded'] = $long_msg[$i];
			// 	$datas['Class'] = 1;
			// 	$datas['Coding'] = 'Default_No_Compression';


			// 	$this->M_transaksi->sendSMS('outbox_multipart',$datas);
			// }
			// echo var_dump($long_msg);
			

		}else{
			$data['DestinationNumber'] = $noTelp;
			$data['TextDecoded'] = '('.$tagihan.') '.$pesan;
			$data['CreatorID'] = 'Gammu';

			$this->M_transaksi->sendSMS('outbox',$data);
			
		}
	}

}