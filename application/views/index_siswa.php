<section class="content-header">
  <h1>Data Siswa</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-sign-out"></i>Logout</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content"> 
    <!-- Your code -->
  <div class="box box-primary">
    <div class="box-body">
      <a href='<?php echo base_url("index.php/siswa/tambah"); ?>'class="btn btn-info btn-md">Tambah Data Siswa</a><br><br>
      </div>
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
            <th width="15%">Aksi</th>
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
      
        
        <td>
        <div class='btn-group'>
        <button class='btn btn-info' onclick=".'"'."openmodalSiswa('#ubahsiswa','".$data->nis."','".$data->nama_lengkap."','".$data->tmpt_lahir."','".$data->jenis_kel."','".$data->kelas."','".$data->alamat."','".$data->nama_ayah."','".$data->nama_ibu."','".$data->pekerjaan_ayah."','".$data->pekerjaan_ibu."','".$data->no_telp."','".$data->tahun_ajaran."')".'"'." >Ubah</button> <a class='btn btn-danger' href='".base_url("index.php/siswa/hapus/".$data->nis)."'>Hapus</a></div>
        <a class='btn btn-default' href='".base_url("index.php/siswa/".$data->nis)."'>detail</a></div>
        </td>
        </tr>";

          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->

<div class="modal fade" id="ubahsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open("siswa/ubah"); ?>
      <table cellpadding="8" class="table table-bordered table-hover">
        <tr>
          <td>NIS</td>
          <td><input id="nis-ubah" type="text" name="nis_ubah" class="form-control"></td>
          <td><input id="id-ubah" type="hidden" name="id_ubah" ></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input id="nama-lengkap-ubah" type="text" name="nama_lengkap_ubah" ></td>
          
        </tr>
        <tr>
          <td>Tempat Lahir</td>
          <td><input id="tmpt-lahir-ubah" type="text" name="tmpt_lahir_ubah" ></td>
          
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td><input id="jenis-kel-ubah" type="text" name="jenis_kel_ubah" ></td>
          
        </tr>
        <tr>
          <td>Kelas</td>
          <td><input id="kelas-ubah" type="text" name="kelas_ubah" ></td>
          
        </tr>
        <tr>
          <td>Alamat</td>
          <td><input id="alamat-ubah" type="text" name="alamat_ubah" ></td>
          
        </tr>
        <tr>
          <td>Nama Ayah</td>
          <td><input id="nama-ayah-ubah" type="text" name="nama_ayah_ubah" ></td>
          
        </tr>
        <tr>
          <td>Nama Ibu</td>
          <td><input id="nama-ibu-ubah" type="text" name="nama_ibu_ubah" ></td>
          
        </tr>
        <tr>
          <td>Pekerjaan Ayah</td>
          <td><input id="pekerjaan-ayah-ubah" type="text" name="pekerjaan_ayah_ubah" ></td>
          
        </tr>
        <tr>
          <td>Pekerjaan Ibu</td>
          <td><input id="pekerjaan=ibu-ubah" type="text" name="pekerjaan_ibu_ubah" ></td>
          
        </tr>
        <tr>
          <td>Nomor Telepon</td>
          <td><input id="no-telp-ubah" type="text" name="no_telp_ubah" ></td>
          
        </tr>
        <tr>
          <td>Tahun Ajaran</td>
          <td><input id="tahun-ajaran-ubah" type="text" name="tahun_ajaran_ubah" ></td>
          
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

  