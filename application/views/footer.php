
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



<script type="text/javascript">

  $(document).ready( function () {
    $('#myTable').DataTable();
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

  function openmodalBayar(target,jenis,jumlah){
    $('#jenis-biaya').val(jenis);
    $('#jumlah').val(jumlah);
    $(target).modal('show');    

  }


</script>
<script>

//     $(document).ready(function() {
//       var baseUrl = $('#base-url').val();
//     $('#tabel-siswa').DataTable( {
//       "processing": false,
//       "serverSide": false,
//       "lengthmenu": [[5,10,15,20],[5,10,15,20]],
      
//       "ajax": {
//         "url": baseUrl + 'Siswa/getSiswa',
//         "type": "POST",
//         "dataSrc":"Siswa"


//       },
//       "columns": [
//       {"data":"nis"},
//       {"data":"nama_lengkap"},
//       {"data":"tmpt_lahir"},
//       {"data":"jenis_kel"},
//       {"data":"kelas"},
//       {"data":"alamat"},
//       {"data":"nama_ayah"},
//       {"data":"nama_ibu"},
//       {"data":"pekerjaan_ayah"},
//       {"data":"pekerjaan_ibu"},
//       {"data":"no_telp"},
//       {"data":"tahun_ajaran"}
      



//       ]
//     } );
// } );


//        </script>
    </body>
</html>