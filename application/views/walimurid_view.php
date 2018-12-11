<section class="content-header">
  <h1>INFORMASI TRANSAKSI PEMBAYARAN</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-sign-out"></i>Logout</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content"> 
    <!-- Your code -->
   
  <div class="box box-primary">
    <div class="box-body">
    
      <div class='col-lg-12'>
        <div class="alert alert-info " style='text-align:center'>
        Tagihan Insidentil      
        </div>
        <table class='table table-bordered table-responsive table-condensed table-hover'>
        <thead>
          <tr style='background-color:lightgrey'>
              <th style='text-align:center'>Jenis Biaya</th>
              <th style='text-align:center'>Tahun Ajaran</th>
              <th style='text-align:center'>Sudah Bayar</th>
              <th style='text-align:center'>Sisa Tanggungan</th>
              <th style='text-align:center'>Status</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach($trs_insidentil as $data): ?>
          <tr>
            <td align="center"><?= $data['jenis_biaya'] ?></td>
            <td align="center"> <?= $data['tahun_ajaran'] ?></td>
            <td align="center">Rp. <?= $data['sudah_bayar']?></td>
            <td align="center">Rp. <?= $data['jumlah'] - $data['sudah_bayar']?></td>
            <td align="center"><?= ($data['jumlah'] - $data['sudah_bayar']) == 0?  '<span class="badge btn-success">Lunas</span>': '<span class="badge btn-danger">Belum Lunas</span>';?></td>
          </tr>
          <?php endforeach;?>
        </tbody>
        </table>
        </div>
<?php foreach($biaya_bulanan as $data): ?>
      <div class="col-lg-6">
        <div class="alert alert-success " style='text-align:center'>
        Tagihan Bulanan  <?= $data['jenis_biaya'] ?>     
        </div>
        <table class='table table-bordered'>
        <thead>
          <tr style='background-color:lightgrey'>
            <td align="center"><b>Bulan</b></td>
            <td align="center"><b>Tahun</b></td>
            <td align="center"><b>Jumlah Bayar</b></td>
            <td align="center"><b>Telah Bayar</b></td>
            <td align="center"><b>Sisa Bayar</b></td>
            <td align="center"><b>Status</b></td>
          </tr>
        </thead>
        <tbody>
        <?php foreach($data['trs_perbulan'] as $datas): ?>
          <tr>
            <td align="center"><?= $datas['bulan'] ?></td>
            <td align="center"><?= $datas['tahun_ajaran'] ?></td>
            <td align="center">Rp. <?= $datas['jumlah'] ?></td>
            <td align="center">Rp. <?= $datas['sudah_bayar']?></td>
            <td align="center">Rp. <?= $datas['jumlah'] - $datas['sudah_bayar']?></td>
            <td align="center"><?= ($datas['jumlah'] - $datas['sudah_bayar']) == 0?  '<span class="badge btn-success">Lunas</span>': '<span class="badge btn-danger">Belum Lunas</span>';?></td>
          </tr>
     
      <?php endforeach; ?>
        </tbody>
        </table>
      </div>
<?php endforeach; ?>

    </div>
      <!-- <div class='col-lg-6'>
      <div class="alert alert-warning ">
        Tagihan Bulanan       
        </div>
        <table class='table table-bordered'>
        <thead>
          <tr style='background-color:lightgrey'>
              <th style='text-align:center'>Jenis Biaya</th>
              <th style='text-align:center'>Bulan</th>
              <th style='text-align:center'>Tahun Ajaran</th>
              <th style='text-align:center'>Jumlah Tanggungan</th>
          </tr>
        </thead>
        <tbody>
        
        </tbody>
        </table>

        
      </div> -->
    </div>
  </div>
</section>
<!-- /.content -->


  