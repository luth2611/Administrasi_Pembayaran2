     <section class="content-header">
           <h1>Data Biaya</h1>
           <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>verifylogin/logout/"><i class="fa fa-sign-out"></i>Logout</a></li>
           </ol>
     </section>   
    <!-- Main content -->
  <section class="content">  
       <!-- Your code -->
    <div class="box box-primary">
	   <div class="box-body">
        <a href='#' data-toggle='modal' data-target='#tambahBiaya'class="btn btn-info btn-md">Tambah Data Biaya</a><br><br>
      <table id="myTable" class="table table-bordered table-hover" >
        <thead>
           <tr>
            <th width='5%' style='text-align:center'>Nomor</th>
            <th width='20%' style='text-align:center'>Jenis Bayar</th>
            <th width='15%' style='text-align:center'>Jumlah</th>
            <th width='15%' style='text-align:center'>Status Pembayaran</th>
            <th width='15%' style='text-align:center'>Aksi</th>
             </tr>
        </thead>
      </tbody>
      <?php $i = 1; foreach($biaya as $data): ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $data->jenis_biaya ?></td>
            <td>Rp.<?= $data->jumlah ?></td>
            <td><?= $data->status=='1'?'<span class="badge btn-success">Insidentil</span>': '<span class="badge btn-warning">Perbulan</span>' ?></td>
            <td>
                  <button class='btn btn-info btn-sm'  onclick="openmodalBiaya('#ubahbiaya','<?php echo $data->jumlah?>','<?=$data->jenis_biaya?>','<?=$data->status?>','<?=$data->idbiaya?>')">Ubah</button> <a class='btn btn-danger btn-sm' onclick="return confirm('Apakah anda yakin menghapus data ini ?');" href="<?= site_url('biaya/hapus/'.$data->idbiaya)?>">Hapus</a>
            </td>
          </tr>
        <?php $i++;endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>




  <!-- Modal -->
<div class="modal fade" id="ubahbiaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Biaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open("biaya/ubah"); ?>
      <table cellpadding="8" class="table table-hover">
        <tr>
          <td>Jenis Biaya</td>
          <td><input id="jenis-biaya-ubah" class='form-control' type="text" name="jenis_biaya"></td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td><input id="jumlah" class='form-control' type="text" name="jumlah" ></td>
          <td><input id="id-ubah" type="hidden" name="idbiaya" ></td>
        </tr>
        <tr>
          <td>Status Pembayaran</td>
          <td>
            <select name='status' id='status-ubah' class='form-control'>
              <option value='1'>Insidentil</option>
              <option value='2'>Perbulan</option>
          </td>
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
</div>



<div class="modal fade" id="tambahBiaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Biaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open("biaya/tambah"); ?>
      <table cellpadding="8" class="table table-hover">
        <tr>
          <td>Jenis Biaya</td>
          <td><input id="jenis-biaya-ubah" class='form-control'type="text" name="jenis_biaya"></td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td><input id="jumlah" type="text" class='form-control' name="jumlah" ></td>
        </tr>
        <tr>
          <td>Status Pembayaran</td>
          <td>
            <select name='status' class='form-control'>
              <option value='1'>Insidentil</option>
              <option value='2'>Perbulan</option>
          <!-- <input id="jumlah" type="text" class='form-control' name="jumlah" > -->
          </td>
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


