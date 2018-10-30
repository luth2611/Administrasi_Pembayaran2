    <section class="content-header">
      <h1>Data Siswa</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-dashboard"></i>Logout</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
  	
    <div class="box box-primary">
      <div class="box-body">
        <a href='<?php echo base_url("index.php/siswa/tambah"); ?>'class="btn btn-info btn-md">Tambah Data</a><br><br>
        <table id="myTable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NIS</th>
              <th>Nama Lengkap</th>
              <th>Tempat Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Tahun Ajaran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
            <?php 
              
              foreach($siswa as $data){
                echo "<tr>
                      <td>".$data->nis."</td>
                      <td>".$data->nama_lengkap."</td>
                      <td>".$data->tmpt_lahir."</td>
                      <td>".$data->jenis_kel."</td>
                      <td>".$data->kelas."</td>
                      <td>".$data->alamat."</td>
                      <td>".$data->no_telp."</td>
                      <td>".$data->tahun_ajaran."</td>
        
          
          <td><button class='btn' onclick=".'"'."openmodal('#ubahsiswa','".$data->nis."','".$data->nama_lengkap."','".$data->tmpt_lahir."','".$data->jenis_kel."','".$data->kelas."','".$data->alamat."','".$data->nama_ayah."','".$data->nama_ibu."','".$data->pekerjaan_ayah."','".$data->pekerjaan_ibu."','".$data->no_telp."','".$data->tahun_ajaran."')".'"'." >Ubah</button> <a href='".base_url("index.php/siswa/hapus/".$data->nis)."'>Hapus</a></td>
          </tr>";

              }



            ?>

          </tbody>
        </table>
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
  <input type='hidden' id='base-url' value=<?php echo site_url() ?>>
  