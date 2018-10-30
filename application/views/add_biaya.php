    <section class="content-header">
      <h1>Data Biaya</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-dashboard"></i>Logout</a></li>
      </ol>
    </section>  
 
    <!-- Main content -->
    <section class="content">
       
       <!-- Your code -->
        
       
		<div class="box box-primary">
    <div class="box-body">
    
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
      </div>
        
      

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
  