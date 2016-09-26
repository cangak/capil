						<form action="module/aksi/t_reg.php?{{encu('module=t_reg&act=edit')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">
						
						{% import "macro/form.tpl" as forms %}
						
						<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			Kegiatan
		</div>
	</div>
	
	{% for ek in edit %}
	<div class="panel-body">
	<input type="hidden" value="{{ek.id}}" name="id">
{{ forms.input("NO reg","no_reg", ek.ID_REG, "text","Kode REG", "harus diisi","required","no_reg","9","3","readonly") }}
{{ forms.input("No SKS","no_sks", ek.KD_SKS, "text","Kode SKS", "harus diisi","required","no_sks","9","readonly") }}

  <div class="form-group">
  	<label class="col-sm-3 control-label">Tanggal Registrasi</label>
  		<div class="col-sm-9">
  			<div class="input-group">
  				<input value="{{ek.TGL_REG}}" placeholder="Tanggal Akta" readonly="readonly" style="background-color: white;" type="text" name="tanggal_registrasi" class="form-control" data-format="dd/mm/yyyy">
  					<div class="input-group-addon">
  						<a href="#">
  							<i class="entypo-calendar"></i>
  						</a>
  					</div>
  			</div>
  		</div>
  	</div>		
</div>
	
</div>			
		</div>	
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			Pelapor
		</div>
	</div>
	<div class="panel-body">
	<div class="form-group">
  	<label class="col-sm-3 control-label">Nama</label>
  		<div class="col-sm-9">
		<div class="input-group oci">
  				<input value="{{ek.NM_LAPOR}}" placeholder="Nama"  type="text" name="NM_LAPOR" class="form-control NM_LAPOR">
  					<div  id="oci" class="input-group-addon">
  						<a  id="cari_data" href="#">
  							<i class="entypo-search"></i>
  						</a>
  					</div>
  			</div>
  			</div>
  			</div>

{{ forms.textarea("Alamat","ALM_LAPOR", ek.ALM_LAPOR,"", "","","alm_lapor","9") }}
{{ forms.input("Telepon","TELP_LAPOR", ek.TELP_LAPOR, "text","Telepon", "harus diisi","required","TELP_LAPOR","9") }}
{{ forms.drop("Kecamatan","ID_KEC","form-control ID_KEC",kec,"Pilih Kecamatan",ek.ID_KEC,"9") }}


	</div>
	
</div>			
		</div>	
	</div>
</div>


<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title">
			Register
		</div>
	</div>
	<div class="panel-body">
	<div class="form-group">
	  	<label class="col-sm-3 control-label">NIK</label>
		<div class="col-sm-9">
			<div class="input-group oci">
				<input value="{{ek.NIK}}" placeholder="NIK"  type="text" name="NIK" class="form-control NIK">
				<div  id="oci" class="input-group-addon">
					<a  class="NIKE" id="cari_nik_reg" href="#">
						<i class="entypo-search"></i>
					</a>
				</div>
		  	</div>
		</div>
	</div>
	<div class="form-group">
	  	<label class="col-sm-3 control-label">KK</label>
		<div class="col-sm-9">
			<div class="input-group oci">
				<input value="{{ek.KK}}" placeholder="KK"  type="text" name="KK" class="form-control KK">
				<div  id="oci" class="input-group-addon">
					<a  class="KKE" id="cari_kk_reg" href="#">
						<i class="entypo-search"></i>
					</a>
				</div>
		  	</div>
		</div>
	</div>
	<div class="form-group">
	  	<label class="col-sm-3 control-label">Nama</label>
		<div class="col-sm-9">
			<div class="input-group oci">
				<input value="{{ek.NM_REG}}" placeholder="Nama"  type="text" name="nama" class="form-control NAMA_REG">
				<div  id="oci" class="input-group-addon">
					<a class="NAMAE" id="cari_nama_reg" href="#">
						<i class="entypo-search"></i>
					</a>
				</div>
		  	</div>
		</div>
	</div>
  			
{{ forms.textarea("Alamat","ALM_REG", ek.ALM_REG,"", "","","ALM_REG","9") }}
<div class="form-group">
  	<div class="col-sm-3 control-label" style="font-weight: 700;">Nama</div>
	<div class="col-sm-9">
			<div class="radio">
			<label>
				<input type="radio" name="jk" id="LAKI-LAKI" value="L" {{ ek.JK_REG=="L" ? "checked" }}>LAKI-LAKI
			</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="jk" id="PEREMPUAN" value="P" {{ ek.JK_REG=="P" ? "checked" }}>PEREMPUAN
			</label>
		</div>
	</div>
</div>
{{ forms.textarea("Info Perubahan","INFO_RUBAH", ek.INFO_RUBAH,"", "","","INFO_RUBAH","9") }}

<div class="form-group">
  	<label class="col-sm-3 control-label">Tanggal Peristiwa</label>
  		<div class="col-sm-9">
  			<div class="input-group">
  				<input value="{{ek.TGL_PERISTIWA}}" placeholder="Tanggal Peristiwa" readonly="readonly" style="background-color: white;" type="text" name="TGL_PERISTIWA" class="form-control datepicker" data-format="dd/mm/yyyy">
  					<div class="input-group-addon">
  						<a href="#">
  							<i class="entypo-calendar"></i>
  						</a>
  					</div>
  			</div>
  		</div>
  	</div>
{{ forms.input("Data Lama","DATA_LAMA", ek.DATA_LAMA, "text","Data Lama", "","","DATA_LAMA","9") }}
{{ forms.input("Data Baru","DATA_BARU", ek.DATA_BARU, "text","Data Baru", "","","DATA_BARU","9") }}
{{ forms.input("No Akta","NO_AKTA", ek.NO_AKTA, "text","No Akta", "harus diisi","required","NO_AKTA","9") }}
  <div class="form-group">
  	<label class="col-sm-3 control-label">Tanggal Akta</label>
  		<div class="col-sm-9">
  			<div class="input-group">
  				<input value="{{ek.TGL_AKTA}}" placeholder="Tanggal Akta" readonly="readonly" style="background-color: white;" type="text" name="TGL_AKTA" class="form-control datepicker" data-format="dd/mm/yyyy">
  					<div class="input-group-addon">
  						<a href="#">
  							<i class="entypo-calendar"></i>
  						</a>
  					</div>
  			</div>
  		</div>
  	</div>	
 <div class="form-group">
  	<label class="col-sm-3 control-label">Tanggal Selesai</label>
  		<div class="col-sm-9">
  			<div class="input-group">
  				<input value="{{ek.TGL_PRED_SELESAI}}" placeholder="Tanggal Selesai" readonly="readonly" style="background-color: white;" type="text" name="TGL_SELESAI" class="form-control datepicker" data-format="dd/mm/yyyy">
  					<div class="input-group-addon">
  						<a href="#">
  							<i class="entypo-calendar"></i>
  						</a>
  					</div>
  			</div>
  		</div>
  	</div>	
{{ forms.textarea("Catatan","Info", ek.INFO,"", "","","catatan","9") }}

{% endfor %}
	</div>
</div>
</div>
</div>
{#
<div class="row">
	<div class="col-xs-12 col-md-12 col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					Dokumen
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
    <label><input type="checkbox" id="checkAll"/> Check Semua</label>

						<div id="document" class="col-sm-offset-2 col-sm-8">
						{% for d in dok_reg %}
						<div  class="checkbox" id="document{{d.ID_DOK}}">
						<label> <input class="docum" name="document[]" value="{{d.ID_DOKU_B}}" type="checkbox">{{d.NM_DOKU_B}}</label> </div>
						{% endfor %}
						</div>
				</div>	

			</div>
		</div>
	</div>
</div>
#}






							<div class="form-group">
								<div class="col-sm-offset-5 col-sm-7">
								<input class="btn btn-default" type="button" onclick="history.go(-1);" value="Batal" />

									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</div>
						</form>	