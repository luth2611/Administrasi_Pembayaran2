
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io"></a>.</strong> All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/AdminLTE/dist/js/demo.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="<?php echo base_url() ?>assets/datatables/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/datatables/js/datatables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript">

  $(document).ready( function () {
    $('#myTable').DataTable({
      'columnDefs':[
        {"className":"dt-body-center"}
      ]
    });
  } );
  
  function openmodalBiaya (target,jumlah,jenis,id){ 
    $('#jumlah').val(jumlah);
    $('#jenis-biaya-ubah').val(jenis);
    $('#id-ubah').val(id);
    $(target).modal('show');
  }

  function openmodalSiswa(target,nis,nama_lengkap,jenis_kel,kelas,alamat,nama_ayah,nama_ibu,pekerjaan_ayah,pekerjaan_ibu,no_telp,tahun_ajaran,ubah_biaya = null){
    $('#nis').val(nis);
    $('#nama-lengkap-ubah').val(nama_lengkap);
    $('#jenis-kel-ubah').val(jenis_kel);
    $('#kelas-ubah').val(kelas);
    $('#alamat-ubah').val(alamat);
    $('#nama-ayah-ubah').val(nama_ayah);
    $('#nama-ibu-ubah').val(nama_ibu);
    $('#pekerjaan-ayah-ubah').val(pekerjaan_ayah);
    $('#pekerjaan-ibu-ubah').val(pekerjaan_ibu);
    $('#no-telp-ubah').val(no_telp);
    $('#tahun-ajaran-ubah').val(tahun_ajaran);
    $(target).modal('show');

  }

  function openmodalBayar(target,nis){

    var baseUrl = $('#base-url').val();
    $('#nis-bayar').val(nis);
    
    $('#tabel-bayar-transaksi').DataTable( {
      "processing": false,
      "destroy":true,
      "serverSide": false,
      "lengthMenu": [5,10,15],
      
      "ajax": {
        "url": baseUrl + 'Transaksi/getTransaksi/'+nis,
        "type": "POST",
        "dataSrc":"trs"
      },
      "columns": [
      {"data":"nis"},
      {"data":"nama_lengkap"},
      {"data":"jenis_biaya"},
      {"data":"sudah_bayar"},
      {"data":"sudah_bayar",
        render:function(data,type,row){
          var i = 0
          i = row['jumlah'] - data;
          return i;
      }},
      {"data":"sudah_bayar",render:function(data,type,row){
        var i = 0
        i = row['jumlah'] - data;
        if(i == 0){
          return '<span class="badge badge-success">Lunas</span>'
        }else{
          return '<span class="badge badge-danger">Belum Lunas</span>'
        }
      }},
      {"data":"id_transaksi",render:function(data,type,row){
        var i = 0
        i = row['jumlah'] - row['sudah_bayar'];
        if(i == 0){
          return "";          
        }else{
          return "<button class='btn btn-primary'>Bayar</button>";          
        }
        
      }}
      ]
    } );


    $(target).modal('show');    
  }


</script>
<script>
  var baseUrl = $('#base-url').val();
  var i = 0;
  $('#jenis-biaya-bayar').on('change',function(){
    var idBiaya =  $('#jenis-biaya-bayar').val();
    if(idBiaya == 12 || idBiaya == 16){
      $('#bulan-bayar').removeAttr('disabled');
    }else{
      $('#bulan-bayar').attr('disabled','disabled');
    }

    $.ajax({url:baseUrl+'Transaksi/getJumlahJenisBiaya/'+idBiaya,success:function(res){
      res = JSON.parse(res);
     $.each(res,function(i,v){
      $('#tanggungan').val(v.jumlah);
     });
    }});
  });
</script>
    </body>
</html>