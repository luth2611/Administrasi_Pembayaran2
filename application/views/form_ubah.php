

    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
        
        <div class="box">
		
	<div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("siswa/ubah/".$siswa->nis); ?>
      <table cellpadding="8" class="table table-bordered table-hover">
        <tr>
          <td>NIS</td>
          <td><input type="text" name="input_nis" value="<?php echo set_value('input_nis', $siswa->nis); ?>" readonly></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="input_nama" value="<?php echo set_value('input_nama', $siswa->nama_lengkap); ?>"></td>
        </tr>
        <tr>
          <td>Tempat Tanggal Lahir</td>
          <td><input class="form-control" type="date" name="input_nama" value="<?php echo set_value('input_nama'); ?>"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="input_jeniskelamin" value="Laki-laki" <?php echo set_radio('jenis_kel', 'Laki-laki', ($siswa->jenis_kel == "Laki-laki")? true : false); ?>> Laki-laki
          <input type="radio" name="input_jeniskelamin" value="Perempuan" <?php echo set_radio('jenis_kel', 'Perempuan', ($siswa->jenis_kel == "Perempuan")? true : false); ?>> Perempuan
          </td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="input_alamat"><?php echo set_value('input_alamat', $siswa->alamat); ?></textarea></td>
        </tr>
        <tr>
          <td>Nama Ayah</td>
          <td><input class="form-control" type="text" name="input_nama" value="<?php echo set_value('input_ayah'); ?>"></td>
        </tr>
        <tr>
          <td>Nama Ibu</td>
          <td><input class="form-control" type="text" name="input_nama" value="<?php echo set_value('input_ibu'); ?>"></td>
        </tr>
        <tr>
          <td>Pekerjaan Ayah</td>
          <td><input class="form-control" type="text" name="input_nama" value="<?php echo set_value('input_pekerjaan_ayah'); ?>"></td>
        </tr>
        <tr>
          <td>Pekerjaan Ibu</td>
          <td><input class="form-control" type="text" name="input_nama" value="<?php echo set_value('input_pekerjaan_ibu'); ?>"></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><input type="text" name="input_telp" value="<?php echo set_value('input_telp', $siswa->no_telp); ?>"></td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Ubah" class="btn btn-info btn-md">
      <a href="<?php echo base_url(); ?>"><input type="button" value="Batal" class="btn btn-info btn-md"></a>
    <?php echo form_close(); ?>
		
      
    </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  