<!doctype html>
<html>
    <head>
        <title></title>
        <style>
        span{
            font-weight: bold;
        }

        p{
            font-family: serif;
           font-size: 12px;
           color: black;
        }
        .kop{
            text-align: center;
            font-family: serif;
            /*font-weight: bold;*/
            padding-top: -32px;
        }

        .batas{
            border-bottom: 2px solid black;
            padding-top: -35px;
        }
        .TTD{
            text-align: right;
            padding-right: 25px;

        }
        .under{
           text-decoration: underline;
        }
        .kiri{
            float: left;
            width: 120px;
            height: 75px;
            padding-top: 10px;


        }
        .kanan{
            float: right;
            width: 78px;
            height: 75px;
            padding-top: 10px;
        }

        #header{
            text-align: center;
          padding-top: 25px;
        }
        .img{
            padding-top: -178px;

        }
        .atas{
            font-size: 12px;
            padding-top: -60px;
            font-family: times;
            font-weight: bold;
        }

        .tengah{
            font-size: 14px;
            padding-top: -16px;
            font-family: times;
            font-weight: bold;
        }

        .test{
            color: red;
        }
        .lebar{
            width: 30%;
            /*border :1px solid black;*/
        }
        .lebar1{
            width: 10%;
        }
        .lebar3{
            width: 20%;
        }
        .lebar4{
            width: 25%;
        }
        .lebar5{
            width: 20%;
        }
        th{
            border: 1px  solid #999;
            /*width: 50%;*/
        }
        .tot{
            /*width: 35%;*/
            border-left-style: white;
        }
        .hilang td{
            border-right-style: white;
            border-left-style: white;
        }

        .table-ket, .table-ket th, .table-ket td {
            border: 1px solid #999;
            border-collapse: collapse;
        }
        .table-ket td {
            padding: 4px;
        }
        .kepada{
          line-height: 140%;
        }
        .hormat{
          line-height: 120%;
          /*text-align: right;*/
          /*text-align: center;*/
          /*float: right;*/
          /*margin-right: 1px;*/
          position: absolute;
          right: 60px;
          bottom: 80px;
          text-align: center;
        }

        .hormat-kiri{
          line-height: 120%;
          position: absolute;
          bottom: 80px;
          text-align: center;
        }

        .table-kanan{
          position: absolute;
          right: 0;
          border: 1px solid #999;
          border-collapse: collapse;
        }

        .table-kiri{
          position: absolute;
          left: 25px;
          border: 1px solid #999;
          border-collapse: collapse;
        }

        </style>
    </head>
    <body>
        <div id="header">
        <p class="atas">
          KABUPATEN BANDUNG <br>
          DINAS PENDIDIKAN          
        </p>
        <p class="tengah"> SEKOLAH TAMAN KANAK KANAK AN - NAUROH <br></p>
        <br><br><br><br>
    </div>
    <br>
        <div class="img">
         <img class="kiri" src="<?php echo base_url() ;?>assets/image/pgri_bugis.jpg" "login-bg">
         <img class="kanan" src="<?php echo base_url() ;?>assets/image/lam_indramayu.PNG" "login-bg">
         </div>
    <p class="kop">Jl. Bojongwaru 04/11 <br> Kec. Pameungpeuk Kab. Bandung Jawa Barat
    </p>
    <br>
    <p class="batas"></p>
  <div class="kepada">
  <p style="font-weight: underline; text-align: center; padding-top: -20px;"><u>Laporan Bukti Pembayaran </u></p><br/>

  
      <table style="font-style: 12px; padding-top: -20px; float: left;">
        <tr>
          <td width="150px" ><p>Nama Peserta Didik</p></td>
          <td> <p>:</p> </td>
          <td> <p><?= ucwords($siswa[0]['nama_lengkap']) ?></p> </td>
          <td width="150px"></td>

          <td width="150px"><p>Kelas</p></td>
          <td> <p> : </p></td>
          <td> <p><?= $siswa[0]['kelas']?></p> </td>
        </tr>
        <tr>
          <td width="150px"><p>NIS</p></td>
          <td> <p>:</p> </td>
          <td> <p><?= $siswa[0]['nis'] ?></p> </td>

          <td width="150px"></td>

          <td width="150px"><p>Tahun Pelajaran</p></td>
          <td><p> : </p></td>
          <td> <p><?= $siswa[0]['tahun_ajaran'] ?></p> </td>
        </tr>
      </table>
</div><br>
<p>Biaya Insidentil</p>
<table style="width:100%; font-size: 12px; padding-top: -50px;" class="table-ket" >
  <thead>
    <tr>
      <td align="center"><b>No.</b></td>
      <td align="center" width='20%'><b>Jenis Biaya</b></td>
      <td align="center"><b>Jumlah Bayar</b></td>
      <td align="center"><b>Telah Bayar</b></td>
      <td align="center"><b>Sisa Bayar</b></td>
      <td align="center"><b>Status</b></td>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;foreach($trs_insidentil as $data): ?>
    <tr>
      <td align="center"><?= $i ?></td>
      <td align="center"><?= $data['jenis_biaya'] ?></td>
      <td align="center">Rp. <?= $data['jumlah'] ?></td>
      <td align="center">Rp. <?= $data['sudah_bayar']?></td>
      <td align="center">Rp. <?= $data['jumlah'] - $data['sudah_bayar']?></td>
      <td align="center"><?= ($data['jumlah'] - $data['sudah_bayar']) == 0?  'Lunas': '<b>Belum Lunas</b>';?></td>
    </tr>
    <?php $i++;endforeach; ?>
  </tbody>
</table>
<?php foreach($biaya_bulanan as $data): ?>
  <p>Biaya Bulanan <?= $data['jenis_biaya'] ?></p>
  <table style="width:100%; font-size: 12px; padding-top: -50px;" class="table-ket" >
    <thead>
      <tr>
        <td align="center"><b>No.</b></td>
        <td align="center"><b>Bulan</b></td>
        <td align="center"><b>Tahun</b></td>
        <td align="center"><b>Jumlah Bayar</b></td>
        <td align="center"><b>Telah Bayar</b></td>
        <td align="center"><b>Sisa Bayar</b></td>
        <td align="center"><b>Status</b></td>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;foreach($data['trs_perbulan'] as $datas): ?>
      <tr>
        <td align="center"><?= $i ?></td>
        <td align="center"><?= $datas['bulan'] ?></td>
        <td align="center"><?= $datas['tahun_ajaran'] ?></td>
        <td align="center">Rp. <?= $datas['jumlah'] ?></td>
        <td align="center">Rp. <?= $datas['sudah_bayar']?></td>
        <td align="center">Rp. <?= $datas['jumlah'] - $datas['sudah_bayar']?></td>
        <td align="center"><?= ($datas['jumlah'] - $datas['sudah_bayar']) == 0?  'Lunas': '<b>Belum Lunas</b>';?></td>
    </tr>
      </tr>
      <?php $i++;endforeach; ?>
    </tbody>
  </table>
<?php endforeach; ?>


<!-- <p style="font-size: 12px;"> Kegiatan Pengembangan Diri </p>
<table  style="width:100%; padding-top: -15px; font-size: 12px;" class="table-ket">
<head>
  <tr>
    <td colspan="3" align="center"> Jenis Pengembangan Diri </td>
    <td align="center"> Nilai </td>
    <td colspan="2" align="center"> Keterangan</td>
  </tr>
</head>
<tr>
  <td colspan="3">&nbsp;</td>
  <td align="center"><b></b></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="3">&nbsp;</td>
  <td align="center"><b></b></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="3">&nbsp;</td>
  <td align="center"><b></b></td>
  <td colspan="2">&nbsp;</td>
</tr>
</table> <br>
<table>
  <tr>
    <td style="width: 100%">
<table  style="width:100%; font-size: 12px;" class="table-kiri">
<head>
  <tr>
    <th colspan="4" align="center"> Akhlak dan Keperibadian </th>
  </tr>
</head>
<tr>
  <td width="3px">1.</td>
  <td width="50px">Akhlak</td>
  <td width="3">:</td>
  <td></td>
</tr>
<tr>
  <td width="3px">2.</td>
  <td width="50px">Kepribadian</td>
  <td width="3">:</td>
  <td></td>
</tr><br>
<tr>
  <td></td>
  <td width="50px"></td>
  <td></td>
  <td></td>
</tr>
</table><br>
    </td>

    <td style="width: 10%;"></td>

    <td style="width: 100%;">
      <table  style="width:100%; font-size: 12px;" class="table-kanan">
<head>
  <tr>
    <th colspan="5" align="center"> Ketidak Hadiran </th>
  </tr>
</head>
<tr>
  <td width="3px">1.</td>
  <td width="120px">Sakit</td>
  <td width="3">:</td>
  <td></td>
  <td>Hari</td>
</tr>
<tr>
  <td width="3px">2.</td>
  <td width="120px">Izin</td>
  <td width="3">:</td>
  <td></td>
  <td>Hari</td>
</tr>
<tr>
  <td width="3px">3.</td>
  <td width="120px">Tanpa Keterangan</td>
  <td width="3">:</td>
  <td></td>
  <td>Hari</td>
</tr>
</table>
    </td>
  </tr>
</table> -->
<br>
<div class="hormat">
  <p><u>Bandung, <?php echo date('d-M-Y'); ?></u><br/>
  <i>Hormat Kami,</i><br/>
  <br/><br/>
  <br/><br/>
  <i>(___________________________)</i><br/><br/>
  </p>
</div>

</body>
</html>
