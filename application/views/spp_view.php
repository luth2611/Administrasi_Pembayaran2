   <section class="content-header">   
    <h1>Transaksi</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-dashboard"></i>Logout</a></li>
      </ol>
   </section>

    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
  	
    <div class="box box-primary">
    <div class="box-body">
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
        <?php echo"
        <button onclick=".'"'."openmodal('#bayar')".'"'." class='btn btn-primary'>Bayar</button>";
        ?>
      </div>
    </div>
    <div class="col-sm-2">
    <input type="text" name="nis" class="form-control" placeholder="NIS" id="nis">
      
      
      
      
    </div>
    <table id="myTable" class="table table-bordered table-hover">
    <thead>
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

      <?php
      if( ! empty($biaya)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        $i=1;
        foreach($biaya as $data){
          echo "<tr>
          <td>".$i."</td>
          <td>".$data->jenis_biaya."</td>
          <td>".$data->jumlah."</td>
        
          
          <td><button onclick=".'"'."openmodal('#bayar','".$data->jumlah."','".$data->jenis_biaya."','".$data->idbiaya."')".'"'." >Ubah</button></td>
          <td><a href='".base_url("index.php/view_transaksi/bayar/".$data->idbiaya)."'>Hapus</a></td>
          </tr>";
        $i++;
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
      </thead>
      
    </table>

    <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Biaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open("biaya/ubah"); ?>
      <table cellpadding="8" class="table table-bordered table-hover">
        <tr>
          <td>NIS</td>
          <td><input id="nis-bayar" type="text" name="nis_bayar"></td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td><input id="jumlah-bayar" type="text" name="jumlah_bayar" ></td>
          
        </tr>
        <tr>
          <td>Bulan</td>
          <td><input id="bulan-bayar" type="text" name="bulan_bayar" ></td>
          
        </tr>
        <tr>
          <td>Tahun Ajaran</td>
          <td><input id="tahun-ajaran-bayar" type="text" name="tahun_ajaran_bayar" ></td>
          
        </tr>
        
        
      </table>
      

      <hr>

      
      
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Bayar</button>
         <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>



    </div>

		
      
    </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  