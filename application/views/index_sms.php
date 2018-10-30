<section class="content-header">
  <h1>SMS Terkirim</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-dashboard"></i>Logout</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content"> 
    <!-- Your code -->
  <div class="box box-primary">
    <div class="box-body">
      
      </div>
      <table id="myTable" class="table table-bordered table-hover">
        <thead>
          <tr>
           <th>No</th>
           <th>Tanggal</th>
           <th>Jam</th>
           <th>Nomor Tujuan</th>
           <th>Isi Pesan</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          
          <?php 
            
            foreach($sms as $data){
              echo "<tr>
                    <td>".$data->tanggal."</td>
                    <td>".$data->jam."</td>
                    <td>".$data->no_tujuan."</td>
                    <td>".$data->pesan."</td>
      
        
      
        </tr>";

            }



          ?>

        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->
<input type='hidden' id='base-url' value=<?php echo site_url() ?>>
  