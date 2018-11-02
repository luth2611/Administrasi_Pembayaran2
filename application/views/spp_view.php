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
       
        
        
        
      </div>
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
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
      if( ! empty($biaya)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        $i=1;
        foreach($siswa as $data){
          echo "<tr>
          <td rowspan ='8'>".$data->nis."</td>
          <td rowspan ='8'>".$data->nama_lengkap."</td>";
          foreach ($biaya as $bi) {
            echo "<td style='display: none;'></td>
                  <td>".$bi->jenis_biaya."</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                  
                  <button onclick=".'"'."openmodalBayar('#bayar')".'"'." class='btn btn-primary'>Bayar</button>
                  <a href='".base_url()."index.php/Transaksi/cetak_pembayaran/' class= 'btn btn-primary' >Cetak<Cetak/a>
                  </td>

                </tr>
                ";
          }
        $i++;
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>

      </tbody>
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
          <td>Jenis Biaya</td>
          <td><input id="jenis-biaya-bayar" type="text" name="jenis_biaya_bayar"></td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td><input id="jumlah-bayar" type="text" name="jumlah_bayar" ></td>
          
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
  