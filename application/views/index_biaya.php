     <section class="content-header">
           <h1>Data Biaya</h1>
           <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-sign-out"></i>Logout</a></li>
           </ol>
     </section>   
    <!-- Main content -->
  <section class="content">  
       <!-- Your code -->
		

    <div class="box box-primary">
	   <div class="box-body">
        <a href='<?php echo base_url("index.php/biaya/tambah"); ?>'class="btn btn-info btn-md">Tambah Data Biaya</a><br><br>
      </div>
      <table id="myTable" class="table table-bordered table-hover" >
        <thead>
           <tr>
            <th>Nomor</th>
            <th>Jenis Bayar</th>
            <th>Jumlah</th>
            <th width="15%">Aksi</th>
             </tr>
        </thead>

      
      </tbody>
       <?php
       if( ! empty($biaya)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        $i=1;
        foreach($biaya as $data){
          echo "<tr>
          <td>".$i."</td>
          <td>".$data->jenis_biaya."</td>
          <td>".$data->jumlah."</td>
        
          

          <td>
          <div class='btn-group'>
          <td><button onclick=".'"'."openmodalBiaya('#ubahbiaya','".$data->jumlah."','".$data->jenis_biaya."','".$data->idbiaya."')".'"'." >Ubah</button></td>
          <td><a href='".base_url("index.php/biaya/hapus/".$data->idbiaya)."'>Hapus</a></td>
          </td>
          </tr>";
        $i++;
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>


        </tbody>
      </table>
    </div>
  </div>
</section>




  <!-- Modal -->
<div class="modal fade" id="ubahbiaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <td><input id="jenis-biaya-ubah" type="text" name="jenis_biaya_ubah"></td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td><input id="jumlah" type="text" name="jumlah_ubah" ></td>
          <td><input id="id-ubah" type="hidden" name="id_ubah" ></td>
        </tr>
        
        
      </table>
      

      <hr>

      
      
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
         <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>


