
    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
  	
    <div class="box">
	<h1>Data siswa</h1>
    <hr>
    <div class="col-sm-6">
  <a href='<?php echo base_url("index.php/siswa/tambah"); ?>'class="btn btn-info btn-md">Tambah Data</a><br><br>
  </div>
    <table id="tabel-siswa" class="table table-bordered table-hover">
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
  <input type='hidden' id='base-url' value=<?php echo site_url() ?>>
  