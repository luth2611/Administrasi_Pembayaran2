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
      <a href='#' data-toggle='modal' data-target='#tambahsiswa' class="btn btn-info btn-md">Tambah Data Siswa</a><br><br>
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
            <th width='17%'>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($siswa as $data): ?>
          <tr>
            <td><?= $data->nis ?></td>
            <td><?= $data->nama_lengkap ?></td>
            <td><?= $data->tgl_lahir ?></td>
            <td><?= $data->jenis_kel=='L'?'Laki - Laki': 'Perempuan' ?></td>
            <td><?= $data->kelas ?></td>
            <td><?= $data->alamat ?></td>
            <td><?= $data->no_telp ?></td>
            <td><?= $data->tahun_ajaran ?></td>
            <td>
                  <button class='btn btn-info btn-sm'  onclick="openmodalSiswa('#ubahsiswa','<?php echo $data->nis?>','<?=$data->nama_lengkap?>','<?=$data->tgl_lahir?>','<?=$data->jenis_kel?>','<?=$data->kelas?>','<?=$data->alamat?>','<?=$data->nama_ayah?>','<?=$data->nama_ibu?>','<?=$data->pekerjaan_ayah?>','<?=$data->pekerjaan_ibu?>','<?=$data->no_telp?>','<?=$data->tahun_ajaran?>')">Ubah</button> <a class='btn btn-danger btn-sm' onclick="return confirm('Apakah anda yakin menghapus data ini ?');" href="<?= site_url('siswa/hapus/'.$data->nis)?>">Hapus</a>
                  <a class='btn btn-default btn-sm' href='<?php base_url('index.php/siswa/'.$data->nis)?>'>detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
         

        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->

<div class="modal fade" id="ubahsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open("siswa/ubah"); ?>
        <table cellpadding="8" class="table table-hover">
          <tr>
            <td>NIS</td>
            <td><input class='form-control' id="nis-ubah" type="text" name="nis" class="form-control" readonly></td>
            <td>Nama Ayah</td>
            <td><input class='form-control' id="nama-ayah-ubah" type="text" name="nama_ayah" ></td>
            
          </tr>
          <tr>
          <td>Nama Lengkap</td>
            <td><input  class='form-control' id="nama-lengkap-ubah" type="text" name="nama_lengkap" ></td>
            <td>Pekerjaan Ayah</td>
            <td><input class='form-control' id="pekerjaan-ayah-ubah" type="text" name="pekerjaan_ayah" ></td>
            
          
          </tr>
          <tr>
          <td>Jenis Kelamin</td>
            <td>
            <select class='form-control' name='jenis_kel' id='jenis-kel-ubah'>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>      
            </select></td>
            <td>No. Telp Wali</td>
            <td><input class='form-control' id="no-telp-ubah" type="text" name="no_telp" ></td>
          
          </tr> 
          <tr>
          <td>Tanggal Lahir</td>
            <td><input class='form-control' id="tgl-lahir-ubah" type="date" name="tgl_lahir" ></td>
            
            <td>Nama Ibu</td>
            <td><input  class='form-control' id="nama-ibu-ubah" type="text" name="nama_ibu" ></td>
            
          </tr>
          <tr>
          <td>Kelas</td>
            <td><input class='form-control' id="kelas-ubah" type="text" name="kelas" ></td> 
            
            <td>Pekerjaan Ibu</td>
            <td><input class='form-control' id="pekerjaan-ibu-ubah" type="text" name="pekerjaan_ibu" ></td>
          </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea class='form-control' id="alamat-ubah" name="alamat" ></textarea></td>
          <td>Tahun Ajaran</td>
          <td><input class='form-control' id="tahun-ajaran-ubah" type="text" name="tahun_ajaran" ></td>
        </tr>
       
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
         <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open("siswa/tambah"); ?>
        <table cellpadding="8" class="table table-hover">
          <tr>
            <td>NIS</td>
            <td><input class='form-control' id="nis-ubah" type="text" name="nis" class="form-control"></td>
            <td>Nama Ayah</td>
            <td><input class='form-control' id="nama-ayah-ubah" type="text" name="nama_ayah" ></td>
            
          </tr>
          <tr>
          <td>Nama Lengkap</td>
            <td><input  class='form-control' id="nama-lengkap-ubah" type="text" name="nama_lengkap" ></td>
            <td>Pekerjaan Ayah</td>
            <td><input class='form-control' id="pekerjaan-ayah-ubah" type="text" name="pekerjaan_ayah" ></td>
            
          
          </tr>
          <tr>
          <td>Jenis Kelamin</td>
            <td>
            <select class='form-control' name='jenis_kel' id='jenis-kel-ubah'>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>      
            </select></td>
            <td>No. Telp Wali</td>
            <td><input class='form-control' id="no-telp-ubah" type="text" name="no_telp" ></td>
          
          </tr> 
          <tr>
          <td>Tanggal Lahir</td>
            <td><input class='form-control' id="tgl-lahir-ubah" type="date" name="tgl_lahir" ></td>
            
            <td>Nama Ibu</td>
            <td><input  class='form-control' id="nama-ibu-ubah" type="text" name="nama_ibu" ></td>
            
          </tr>
          <tr>
          <td>Kelas</td>
            <td><input class='form-control' id="kelas-ubah" type="text" name="kelas" ></td> 
            
            <td>Pekerjaan Ibu</td>
            <td><input class='form-control' id="pekerjaan-ibu-ubah" type="text" name="pekerjaan_ibu" ></td>
          </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea class='form-control' id="alamat-ubah" name="alamat" ></textarea></td>
          <td>Tahun Ajaran</td>
          <td><input class='form-control' id="tahun-ajaran-ubah" type="text" name="tahun_ajaran" ></td>
        </tr>
       
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
         <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

  