
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
  
  function openmodalBiaya (target,jumlah,jenis,status,id){ 
    $('#jumlah').val(jumlah);
    $('#jenis-biaya-ubah').val(jenis);
    $('#status-ubah').val(status);
    $('#id-ubah').val(id);
    $(target).modal('show');
  }

  function openmodalSiswa(target,nis,nama_lengkap,tgl_lahir,jenis_kel,kelas,alamat,nama_ayah,nama_ibu,pekerjaan_ayah,pekerjaan_ibu,no_telp,tahun_ajaran,ubah_biaya = null){
    $('#nis-ubah').val(nis);
    $('#nama-lengkap-ubah').val(nama_lengkap);
    $('#tgl-lahir-ubah').val(tgl_lahir);
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
    
    $('#tabel-bayar-transaksi-perbulan').DataTable( {
      "processing": false,
      "bLengthChange": false,
      "searching":false,
      "bInfo" : false,
      "paging":false,
      // "pageLength":5,
      "destroy":true,
      "serverSide": false,
      "lengthMenu": [[5,10,15],[5,10,15]],
      "ajax": {
        "url": baseUrl + 'Transaksi/getTransaksiPerbulan/'+nis,
        "type": "POST",
        "dataSrc":"trs"
      },
      "columns": [
      {"data":"nis"},
      {"data":"nama_lengkap"},
      {"data":"jenis_biaya"},
      {"data":"sudah_bayar",render:function(data,type,row){
        var biaya = format_currency(parseInt(data),'Rp.');
        return biaya;
      }},
      {"data":"sudah_bayar",
        render:function(data,type,row){
          var i = 0
          i = row['jumlah'] - data;
          if(i == 0){
            return "Rp.0";
          }else{
            return format_currency(parseInt(i),'Rp.');
          }
      }},
      {"data":"bulan"},
      {"data":"tahun_ajaran"},
      {"data":"sudah_bayar",render:function(data,type,row){
        var i = 0
        i = row['jumlah'] - data;
        if(i == 0){
          return '<span class="badge btn-success">Lunas</span>'
        }else{
          return '<span class="badge btn-danger">Belum Lunas</span>'
        }
      }},
      {"data":"id_transaksi",render:function(data,type,row){
        var temp = 0
        temp = row['jumlah'] - row['sudah_bayar'];
        if(temp == 0){
          return "";          
        }else{
          return "<a href='#jenis-biaya-bayar' onclick='bayarPerbulan("+row['idbiaya']+","+'"'+row['bulan']+'"'+","+row['jumlah']+","+temp+","+'"'+row['tahun_ajaran']+'"'+")'  class='btn btn-primary'>Bayar</a>";          
        }
        
      }}
      ]
    } );

 $('#tabel-bayar-transaksi-insidentil').DataTable( {
      "processing": false,
      "bLengthChange": false,
      "searching":false,
      "bInfo" : false,
      "paging":false,
      
      "destroy":true,
      "serverSide": false,
      "lengthMenu": [10, 25, 50, 75, 100],
      "ajax": {
        "url": baseUrl + 'Transaksi/getTransaksiInsidentil/'+nis,
        "type": "POST",
        "dataSrc":"trs"
      },
      "columns": [
      {"data":"nis"},
      {"data":"nama_lengkap"},
      {"data":"jenis_biaya"},
      {"data":"sudah_bayar",render:function(data,type,row){
            var biaya = format_currency(parseInt(data),'Rp.');
            return biaya;
      }},
      {"data":"sudah_bayar",
        render:function(data,type,row){
          var i = 0
          i = row['jumlah'] - data;
          if(i == 0){
            return "Rp.0";
          }else{
            return format_currency(parseInt(i),'Rp.');
          }
      }},
      {"data":"tahun_ajaran"},
      {"data":"sudah_bayar",render:function(data,type,row){
        var i = 0
        i = row['jumlah'] - data;
        if(i == 0){
          return '<span class="badge btn-success">Lunas</span>'
        }else{
          return '<span class="badge btn-danger">Belum Lunas</span>'
        }
      }},
      {"data":"id_transaksi",render:function(data,type,row){
        var temp = 0
        temp = row['jumlah'] - row['sudah_bayar'];
        if(temp == 0){
          return "";          
        }else{
          return "<a href='#jenis-biaya-bayar' onclick='bayarInsidentil("+row['idbiaya']+","+row['jumlah']+","+temp+","+'"'+row['tahun_ajaran']+'"'+")'  class='btn btn-primary'>Bayar</a>";          
        }
        
      }}
      ]
    } );

    $(target).modal('show');    
  }
</script>
<script>
function bayarPerbulan(idBiaya,bulan,tanggungan,sisaBayar,tahunAjaran){
  $('#jenis-biaya-bayar').val(idBiaya);
  $('#bulan-bayar').val(bulan);
  $('#tanggungan').val(format_currency(parseInt(tanggungan),'Rp.'));
  $('#sisa-bayar').val(format_currency(parseInt(sisaBayar),'Rp.'));
  $('#tahun-ajaran').val(tahunAjaran);
  $('#bulan-bayar').removeAttr('disabled');
  $('#jumlah-bayar').removeAttr('disabled');
  $('#tahun-ajaran').removeAttr('disabled');
  $('#btn-submit').removeAttr('disabled');  
  
 

}
function bayarInsidentil(idBiaya,tanggungan,sisaBayar,tahunAjaran){
  $('#jenis-biaya-bayar').val(idBiaya);
  $('#tanggungan').val(format_currency(parseInt(tanggungan),'Rp.'));
  $('#sisa-bayar').val(format_currency(parseInt(sisaBayar),'Rp.'));
  $('#tahun-ajaran').val(tahunAjaran);
  $('#bulan-bayar').val('');  
  $('#bulan-bayar').attr('disabled','disabled');
  $('#jumlah-bayar').removeAttr('disabled');
  $('#tahun-ajaran').removeAttr('disabled');
  $('#btn-submit').removeAttr('disabled');  
 

}
</script>
<script>
function format_currency(n, currency) {
  return currency + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
}
</script>
<script>
 function formatRupiah(objek){
        separator = "."; 
		a = objek.value; 
		b = a.replace(/[^\d]/g,""); 
		c = ""; 
		panjang = b.length; 
		j = 0; 
		for (i = panjang; i > 0; i--) { 
			j = j + 1;
			if (((j % 3) == 1) && (j != 1)) { 
				c = b.substr(i-1,1) + separator + c; 
			} else { 
				c = b.substr(i-1,1) + c; 
			} 
		} 
	  objek.value = c; 
		
	}
  
  function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return rupiah.split('',rupiah.length-1).reverse().join('');
}

</script>
<script>
  var baseUrl = $('#base-url').val();
  var i = 0;
  // var tanggungan = null;

  $('#jenis-biaya-bayar').on('change',function(){
      var nis = $('#nis-bayar').val();
    var idBiaya =  $('#jenis-biaya-bayar').val();
    var statusBiaya = 0;
    // cek biaya apakah pertahun atau perbulan
    $.ajax({url:baseUrl+'Transaksi/cekBiaya/'+idBiaya,success:function(res){
      res = JSON.parse(res);
      if(res[0]['status'] == 2 ){
        statusBiaya = res[0]['status'];
      $('#bulan-bayar').removeAttr('disabled');
    }else{
      $('#bulan-bayar').attr('disabled','disabled');
      $('#bulan-bayar').val('');
    }
    $.ajax({url:baseUrl+'Transaksi/getJumlahJenisBiaya/'+idBiaya,success:function(res){
      res = JSON.parse(res);
     $.each(res,function(i,v){
      $('#tanggungan').val(format_currency(parseInt(v.jumlah),'Rp.'));
     });
    }});
    $.ajax({url:baseUrl+'Transaksi/getSisaBayar/'+ nis +'/'+idBiaya,success:function(res){
      res = JSON.parse(res);
     $.each(res,function(i,v){
        if(v.sisa_bayar == 0){
          if(statusBiaya == 2){
            $('#sisa-bayar').val(format_currency(parseInt(v.jumlah),'Rp.'));   
            $('#tahun-ajaran').val('');
            $('#jumlah-bayar').removeAttr('disabled');
            $('#tahun-ajaran').removeAttr('disabled');
            $('#btn-submit').removeAttr('disabled');         
          }else{
            $('#sisa-bayar').val('Lunas');
            $('#tahun-ajaran').val('');
            $('#jumlah-bayar').attr('disabled','disabled');
            $('#tahun-ajaran').attr('disabled','disabled');
            $('#btn-submit').attr('disabled','disabled');
          }
        }else if(v.sisa_bayar == null){
          $('#sisa-bayar').val(format_currency(parseInt(v.jumlah),'Rp.'));
          $('#tahun-ajaran').val('');
          $('#jumlah-bayar').removeAttr('disabled');
          $('#tahun-ajaran').removeAttr('disabled');
          $('#btn-submit').removeAttr('disabled');  
        }else{
          if(v.sisa_bayar <= 0){
          $('#sisa-bayar').val(format_currency(parseInt(v.jumlah),'Rp.'));
          }else{
            $('#sisa-bayar').val(format_currency(parseInt(v.sisa_bayar),'Rp.'));
          }
          $('#tahun-ajaran').val('');
          $('#jumlah-bayar').removeAttr('disabled');
          $('#tahun-ajaran').removeAttr('disabled');
          $('#btn-submit').removeAttr('disabled');  
        }
     });
    }});
    }})
  });
</script>
<script>
  $('.form-transaksi').submit(function(e){
    var baseUrl = $('#base-url').val();
    var form = $(this);
    $.ajax({
        type:"POST",
        url:baseUrl+"Transaksi/addTransaksi",
        data: form.serialize(),
        success: function(res){
          alert('Berhasil');
          $('#tanggungan').val('');
          $('#tahun-ajaran').val('');
          $('#jumlah-bayar').val('');
          $('#keterangan-bayar').val('');
          $('#bulan-bayar').val('');
          $('#sisa-bayar').val('');
          $('#jenis-biaya-bayar').val('');
          $('#bulan-bayar').attr('disabled','disabled');
          var perbulan = $('#tabel-bayar-transaksi-perbulan').DataTable();
          var insidentil = $('#tabel-bayar-transaksi-insidentil').DataTable();
          perbulan.ajax.reload();
          insidentil.ajax.reload();
        }
    })
    e.preventDefault();
  })
</script>
<script>
 $('#bulan-bayar').on('change',function(){
    var nis = $('#nis-bayar').val();
    var bulan =  $('#bulan-bayar').val();
    var idbiaya= $('#jenis-biaya-bayar').val();
    $.ajax({url:baseUrl+'Transaksi/getSisaBayarPerbulan/'+nis+'/'+bulan+'/'+idbiaya,success:function(res){
      res = JSON.parse(res);
     $.each(res,function(i,v){
        if(v.sisa_bayar == null){
          $('#sisa-bayar').val(format_currency(parseInt(v.jumlah),'Rp.'));
          $('#jumlah-bayar').removeAttr('disabled');
          $('#tahun-ajaran').removeAttr('disabled');
          $('#btn-submit').removeAttr('disabled');        
        }else if(v.sisa_bayar == 0){
          $('#sisa-bayar').val('Lunas');
          $('#jumlah-bayar').attr('disabled','disabled');
          $('#tahun-ajaran').attr('disabled','disabled');
          $('#btn-submit').attr('disabled','disabled');
        }else{
          $('#sisa-bayar').val(format_currency(parseInt(v.sisa_bayar),'Rp.'));
          $('#jumlah-bayar').removeAttr('disabled');
          $('#tahun-ajaran').removeAttr('disabled');
          $('#btn-submit').removeAttr('disabled');  
        }
     });
    }});
  });

</script>
    </body>
</html>