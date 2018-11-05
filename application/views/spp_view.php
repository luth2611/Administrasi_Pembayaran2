   <section class="content-header">   
    <h1>Transaksi</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-dashboard"></i>Logout</a></li>
      </ol>
   </section>
    <section class="content">
    <div class="box box-primary">
      <div class="box-body">
      <div class="col-sm-10">
      <div class="row">
      </div>
      </div>
    
    <table id="myTable" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
      if( ! empty($biaya)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        $i=1;
        foreach($siswa as $data){
          echo "<tr>
          <td>".$data->nis."</td>
          <td>".$data->nama_lengkap."</td>
          <td>".$data->kelas."</td>
          <td>".$data->alamat."</td>
                  <td>
                  <button onclick=".'"'."openmodalBayar('#bayar','".$data->nis."')".'"'." class='btn btn-info'>Bayar</button>
                  <a href='".base_url()."index.php/Transaksi/cetak_pembayaran/' class= 'btn btn-default' >Cetak<Cetak/a>
                  </td>

                </tr>
                ";
          // }
        $i++;
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
      </tbody>
    </table>

    <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          <form class='form-transaksi'action='#' method='post'>
          <table cellpadding="8" class="table table-hover">
            <tr>
              <td>Jenis Biaya</td>
              <td><select class="form-control"  name="jenis_biaya_bayar" id="jenis-biaya-bayar">
                    <option>Pilih Jenis Biaya</option>
                    <?php
                      foreach($biaya as $data){
                        echo "<option value='".$data->idbiaya."'>".$data->jenis_biaya."</option>";
                      }
                    ?>
              </select>
              </td>
              <td>Bulan</td>
              <td><select class="col-lg-4 form-control" name="jenis_biaya_bayar" id="bulan-bayar" disabled>
                      <option>Pilih Bulan</option>
                    <?php $bulan = array('Januari','Pebruari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'); 
                      foreach($bulan as $data){
                        echo "<option value=".$data.">".$data."</option>";
                      }
                    
                    ?>
                                      
              </select></td>
            </tr>
            <tr>
              <td>Tanggungan</td>
              <td><input class="form-control" placeholder="Jumlah yang harus dibayar"  id="tanggungan" type="number" readonly></td>
              <td>Tahun Ajaran</td>
              <td><input type='text' name='tahun_ajaran' class='form-control'></td>            
            </tr> 
            <tr>
              <td>Jumlah Bayar</td>
              <td colspan='3'><input class="form-control" placeholder="Jumlah yang akan dibayar" id="jumlah-bayar" type="number" name="jumlah_bayar" ></td>
              <td></td>
              <td></td>            
            </tr>   
          </table>
          <input type="hidden" id='nis-bayar'>
          <div class="col-md-offset-11" style="margin-bottom:15px;margin-top:-15px">
            <button type="submit" class="btn btn-success">Bayar</button>
          </div>
          </form>
          <table id="tabel-bayar-transaksi" class="table table-bordered table-hover table-responsives">
        <thead>
          <tr>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Jenis Biaya</th>
            <th>Sudah Bayar</th>
            <th>Sisa Bayar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>
        </table>
          
          </div>
         
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
</div>
    <!-- </div> -->
    </section>
        <!-- right col -->
      <!-- </div> -->
    <!-- </section> -->
    <!-- /.content -->
  <!-- </div> -->
  <!-- /.content-wrapper -->
  <input type="hidden" id="base-url" value="<?php echo base_url()?>">