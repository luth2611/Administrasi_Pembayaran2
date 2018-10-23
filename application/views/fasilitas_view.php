


    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
    
    <div class="box">
  <h1>Transaksi</h1>
    <hr>
    <div class="col-sm-10">
      <div class="row">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-right: 5px;">Jenis Bayar</button>
          <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/transaksi/spp">SPP</a></li>
          <li><a href="<?php echo base_url();?>index.php/transaksi/raudoh">Raudoh</a></li>
          <li><a href="<?php echo base_url();?>index.php/transaksi/majalah">Majalah</a></li>
          <li><a href="<?php echo base_url();?>index.php/transaksi/seragam">Seragam</a></li>
          <li><a href="<?php echo base_url();?>index.php/transaksi/fasilitas">Fasilitas Sekolah</a></li>
          <li><a href="<?php echo base_url();?>index.php/transaksi/manasik">Manasik</a></li>
          <li><a href="<?php echo base_url();?>index.php/transaksi/pesertabaru">Pesertabaru</a></li>
          <li><a href="<?php echo base_url();?>index.php/transaksi/porseni">Porseni</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-right: 5px;">Kelas</button>
          <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/transaksi/spp">A</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-right: 5px;">Tahun Ajaran</button>
          <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/transaksi/spp">2017/2018</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-right: 5px;">Bulan</button>
          <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/transaksi/spp">Januari</a></li>
          </ul>
        </div>
        <input type="submit" class="btn btn-primary" value="Cetak">
      </div>
    </div>
    <div class="col-sm-2">
    <input type="text" name="nis" class="form-control" placeholder="NIS" id="nis">
      
      
      
      
    </div>
    <table id="example2" class="table table-bordered table-hover" style="margin-top: 80px;">
      <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Bayar</th>
        <th>Tanggal Bayar</th>
        <th>Jumlah</th>
        <th>Sudah Bayar</th>
        <th>Sisa Bayar</th>
        <th>Keterangan</th>
        <th colspan="2">Aksi</th>
      </tr>
      
    </table>
    </div>

    
      
    </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  