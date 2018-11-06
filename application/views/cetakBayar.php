<!DOCTYPE html>
<html>
<head>
	<title>SEKOLAH TAMAN KANAK_KANAK </title>



	<style>
#cetak_bayar {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#cetak_bayar td, #cetak_bayar th {
    border: 1px solid black;
    padding: 8px;
}

#cetak_bayar tr:nth-child(even){background-color: #f2f2f2;}

#cetak_bayar tr:hover {background-color: #ddd;}

#cetak_bayar th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: black;
}
</style>
</head>
<body>
 
	<center>
		<h2>SEKOLAH TAMAN KANAK KANAK AN - NAUROH</h2>
		<h4>Jalan. Bojongwaru 04/11 Kecamatan Pameungpeuk Kabupaten Bandung</h4>
		<hr style="border: 0.5px solid black;"></hr>

		<h3 class ="text-align:center" >Bukti Pembayaran</h3>
		<h3 class ="text-align:center" >SPP Tahun Ajaran 2018/2019</h3>
		<hr style="border: 0.5px solid black;"></hr>
	</center>
 
	<br/>
 
	<table id="cetak_bayar">
  <tr>
    <th>No</th>
    <th>Bulan</th>
    <th>Tanggal Bayar</th>
    <th>Keterangan</th>
  </tr>
  <?php  
      foreach($trs as $value){

      }
  ?>
  <tr>
    <td>1</td>
    <td>133040287</td>
    <td>LUTHFI</td>
    <td>A</td>
    <td>JANUARI</td>
    <td>26-01-2019</td>
    <td>BELUM LUNAS</td>
  </tr>
  <tr>
  	<td>2</td>
  	<td>133040987</td>
  	<td>JONI</td>
  	<td>B</td>
    <td>FEBRUARI</td>
    <td>11-02-2019</td>
    <td>LUNAS</td>
  </tr>
  <tr>
    <td>3</td>
    <td>133040234</td>
    <td>ASEP</td>
    <td>C</td>
    <td>MARET</td>
    <td>10-03-2019</td>
    <td>BELUM LUNAS</td>
  </tr>
  <tr>
    <td>4</td>
    <td>133040678</td>
    <td>PUTRI</td>
    <td>D</td>
    <td>APRIL</td>
    <td>09-04-2019</td>
    <td>LUNAS</td>
  </tr>
  <tr>
  	<td>5</td>
  	<td>133040918</td>
  	<td>NABILA</td>
  	<td>E</td>
    <td>MEI</td>
    <td>26-05-2019</td>
    <td>BELUM LUNAS</td>
  </tr>
</table>  

<style>
div.relative {
    position: relative;
    text-align: right;
    margin-top: 30px;
} 

div.absolute {
	text-align: center;
    position: absolute;
    right: 0;
    width: 200px;
    height: 100px;
}
</style>
<div class="relative">Pameungpeuk, 20 Januari 2019
  <div class="absolute">
  	Bendahara
  	<p style="text-align: center; margin-top: 50px;">Yuli</p>
  </div>
  
</div>

 
	<script>
		window.print();
	</script>
	
</body>
</html>