
 
    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
        
       
		<div class="box">
	<h1>Tambah Data Biaya</h1>
    <hr>
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("biaya/tambah"); ?>
      <table cellpadding="8" class="table table-bordered table-hover">
        <tr>
          <td>Jenis Biaya</td>
          <td><input type="text" name="input_jenis_biaya" value="<?php echo set_value('input_jenis_biaya'); ?>"></td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td><input type="text" name="input_Jumlah" value="<?php echo set_value('input_Jumlah'); ?>"></td>
        </tr>
        
        
      </table>
      </div>
        
      <hr>

      <input type="submit" name="submit" value="Simpan" class="btn btn-info btn-md">
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
  