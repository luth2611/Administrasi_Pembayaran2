
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
		
    
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("siswa/tambah"); ?>
      <table cellpadding="8" class="table table-bordered table-hover" >
        <tr>
          <td>NIS</td>
          <td><input class="form-control" type="text" name="input_nis" ></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input class="form-control" type="text" name="input_nama" ></td>
        </tr>
        <tr>
          <td>Tempat Tanggal Lahir</td>
          <td><input class="form-control" type="date" name="input_tmpt" ></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <select class='form-control' name='input_jeniskelamin'>
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>      
          </select>
          <!-- <input  class='form-control' type="radio" name="input_jeniskelamin" value="Laki-laki" >  -->
          <!-- <input class='form-control'  type="radio" name="input_jeniskelamin" value="Perempuan" >  -->
          </td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td><input class="form-control" type="text" name="input_kelas" ></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea class="form-control" name="input_alamat"><?php echo set_value('input_alamat'); ?></textarea></td>
        </tr>
        <tr>
          <td>Nama Ayah</td>
          <td><input class="form-control" type="text" name="input_ayah" ></td>
        </tr>
        <tr>
          <td>Nama Ibu</td>
          <td><input class="form-control" type="text" name="input_ibu" ></td>
        </tr>
        <tr>
          <td>Pekerjaan Ayah</td>
          <td><input class="form-control" type="text" name="input_pekerjaan_ayah" ></td>
        </tr>
        <tr>
          <td>Pekerjaan Ibu</td>
          <td><input class="form-control" type="text" name="input_pekerjaan_ibu" ></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><input class="form-control" type="text" name="input_telp" ></td>
        </tr>
        <tr>
          <td>Tahun Ajaran</td>
          <td><textarea class="form-control" name="input_thn"><?php echo set_value('input_thn'); ?></textarea></td>
        </tr>
        
      </table>
      </div>
      </div>  
      

    
      <input type="submit" name="submit" value="Simpan"class="btn btn-info btn-md">
      <a href="<?php echo base_url(); ?>"><input type="button" value="Batal" class="btn btn-info btn-md"></a>
    <?php echo form_close(); ?>
   

		</center>
      
    </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  