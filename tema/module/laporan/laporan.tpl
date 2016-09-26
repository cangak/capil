{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }}

{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{% import "macro/status.tpl" as aktif %}
{{ bb.br('Laporan','laporan',posisi) }}

<h2>{{posisi | title}} Laporan </h2>

         {% if posisi=='edit' %}
 {% embed "module/m_kec/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/m_kec/tambah.tpl" %}

 {% endembed %}
                {% else %}
						<hr />
<div class="panel panel-default" data-collapsed="0">
   <div class="panel-body">
      <form id="laporan-form" action="module/aksi/laporan.php?{{encu('module=laporan&act=view&id='~id)}}" method="POST" role="form" target="_blank" class="form-horizontal form-groups-bordered" novalidate="novalidate">
         <div class="form-group">
            <label class="control-label col-sm-3">Jenis Laporan</label>
            <div class="col-sm-5">
               <select name="jenis" class="form-control select" data-allow-clear="true" data-placeholder="Pilih Jenis Laporan">
                  <option value="daftar">Pendaftaran</option>
                  <option value="rekap">Register Perkecamatan</option>
                  <option value="kasir">Kasir</option>
                  <option value="retri">Retribusi</option>
               </select>
            </div>
            
         </div>
         <div class="form-group">
            <label class="control-label col-sm-3">Group Kegiatan</label>
            <div class="col-sm-5">
               <select name="keg" id="keg" class="form-control select" data-allow-clear="true" data-placeholder="Pilih Jenis Laporan">
                  <option>Pilih Group Kegiatan</option>
                  {% for k in keg %}
                  <option value="{{ k.id }}" {% if selected==k.id %} selected {% endif %}> {{ k.nama }}</option>
                  {% endfor %}
               </select>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-3">Nama Kegiatan</label>
            <div class="col-sm-5">
               <select name="subkeg" id="subkeg" class="form-control select"  data-allow-clear="true">
                  <option>Pilih dulu Group Kegiatan</option>
               </select>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-3">Sub Kegiatan</label>
            <div class="col-sm-5">
               <select name="subkeg2" id="subkeg2" class="form-control select" data-allow-clear="true" data-placeholder="Pilih Jenis Laporan">
                  <option>Pilih dulu Nama Kegiatan</option>
               </select>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-3">Dari Tanggal</label>
            <div class="col-sm-5">
               <div class="input-group">
                  <input placeholder="Pilih Tanggal" readonly="readonly" style="background-color: white;" type="text" name="tgl_dari" class="form-control datepicker" data-format="yyyy-mm-dd">
                  <div class="input-group-addon">
                     <a href="#">
                     <i class="entypo-calendar"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-3">Sampai Tanggal</label>
            <div class="col-sm-5">
               <div class="input-group">
                  <input placeholder="Pilih Tanggal" readonly="readonly" style="background-color: white;" type="text" name="tgl_sampai" class="form-control datepicker" data-format="yyyy-mm-dd">
                  <div class="input-group-addon">
                     <a href="#">
                     <i class="entypo-calendar"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-sm-offset-4 col-sm-5">
               <button type="submit" class="btn btn-warning"><i class="entypo-print"></i> Cetak</button>
               <button  id="topdf" class="btn btn-info"><i class="entypo-download"></i> Cetak</button>
            </div>
         </div>
      </form>
   </div>
</div>
<div class="modal fade" id="pdf-pop" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   				<h4 class="modal-title">Rekap </h4> 
   			</div> 
   			<div style="height: 200px" class="modal-body">
   			<div class="form-group">
            <label class="control-label col-sm-3">Jenis Laporan</label>
            <div class="col-sm-8">
               <select id="jenis-rekap" name="jenis-rekap" class="form-control select" data-allow-clear="true" data-placeholder="Pilih Jenis Laporan">
                  <option>Pilih Rekap</option>
                  <option value="daftar">Pendaftaran</option>
                  <option value="rekap">Register Perkecamatan</option>
                  <option value="kasir">Kasir</option>
                  <option value="retri">Retribusi</option>
               </select>
            </div>

         </div><br />
         <div style="margin-top: 25px;" class="form-group">
            <label class="control-label col-sm-3">Jangka Laporan</label>
            <div class="col-sm-8">
               <select id="jangka" name="jangka" class="form-control select" data-allow-clear="true" data-placeholder="Pilih Jenis Laporan">
                  <option>Pilih Jangka Laporan</option>
                  <option value="1">Bulanan</option>
                  <option value="3">TriWulan</option>
                  <option value="6">Semester</option>
                  <option value="12">Tahunan</option>
               </select>
            </div>
            
         </div>
        <div style="margin-top: 25px;" class="col-sm-offset-4 col-sm-5" id="debug"></div>
         </div>
			<div class="modal-footer">
             
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div> 
		</div>
	</div>
</div>

{% endif %}

</div>
{% endblock %}
{% block js %}
	<link rel="stylesheet" href="tema/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="tema/assets/js/select2/select2.css">
<!-- Imported scripts on this page -->
	<script src="tema/assets/js/datatables/lodash.min.js"></script>
	<script src="tema/assets/js/select2/select2.min.js"></script>
    	<script src="tema/assets/js/jquery.validate.min.js"></script>
			<script type="text/javascript">
			var htmlobjek;
			$(document).ready(function() {
				$("#jangka").change(function() {
					$("#debug").empty();
		    	$.ajax({
				type: "POST",
				url 	: "/module/ajax/laporan/excell.php",
				data : { jenis:$("#jenis-rekap").val(), jangka:$("#jangka").val()},
				cache : false,
				success : function(msg) {
					var js = jQuery.parseJSON(msg);
	  			$("#debug").empty().html('<img src="/tema/assets/images/loader-2.gif" /> export data ke excell ...');
	  				if (js.status=='done') {
	  					function download() {
	  						$("#debug").empty().html('<a href="/module/ajax/laporan/laporan/'+js.name+'.xlsx"><button type="button" class="btn btn-info">Download '+js.name+'</button></a>');
	  					}
	  					setTimeout(download, 2000);

					}	
				}
				});
			
		    	});


		$("#topdf").click(function(event) {
    event.preventDefault();

    					jQuery('#pdf-pop').modal('show');
		});
		//apabila terjadi event onchange terhadap object <select id=kel>
		$("#keg").change(function() {
			var keg = $("#keg").val();
			$.ajax({
				url : "/module/ajax/laporan/getsubkeg.php",
				data : "keg=" + keg,
				cache : false,
				success : function(msg) {
					//jika data sukses diambil dari server kita tampilkan
					//di <select id=subkel>
					$("#subkeg").html(msg);
				}
			});
		});
		$("#subkeg").change(function() {
			var subkeg = $("#subkeg").val();
			$.ajax({
				url : "/module/ajax/laporan/getsubkeg2.php",
				data : "subkeg=" + subkeg,
				cache : false,
				success : function(msg) {
					$("#subkeg2").html(msg);
				}
			});
		});

	});

			</script>

{% endblock %}
