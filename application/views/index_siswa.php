


    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
  	
    <div class="box">
	<h1>Data siswa</h1>
    <hr>
    <div class="col-sm-6">
  <a href='<?php echo base_url("index.php/siswa/tambah"); ?>'class="btn btn-info btn-md">Tambah Data</a><br><br>
  </div>
    <table id="example2" class="table table-bordered table-hover">
      <tr>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Pekerjaan Ayah</th>
        <th>Pekerjaan Ibu</th>
        <th>Telepon</th>
        <th>Tahun Ajaran</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($siswa)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
        foreach($siswa as $data){
          echo "<tr>
          <td>".$data->nis."</td>
          <td>".$data->nama_lengkap."</td>
          <td>".$data->tmpt_lahir."</td>
          <td>".$data->jenis_kel."</td>
          <td>".$data->kelas."</td>
          <td>".$data->alamat."</td>
          <td>".$data->nama_ayah."</td>
          <td>".$data->nama_ibu."</td>
          <td>".$data->pekerjaan_ayah."</td>
          <td>".$data->pekerjaan_ibu."</td>
          <td>".$data->no_telp."</td>
          <td>".$data->tahun_ajaran."</td>
          
          <td><a href='".base_url("index.php/siswa/ubah/".$data->nis)."'>Ubah</a></td>
          <td><a href='".base_url("index.php/siswa/hapus/".$data->nis)."'>Hapus</a></td>
          </tr>";
        }
      }else{ // Jika data siswa kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
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
  