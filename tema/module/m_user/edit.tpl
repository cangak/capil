<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/m_user.php?{{encu('module=m_user&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

                           {% import "macro/form.tpl" as forms %}
{% for ek in edit.user %}
{{ forms.hidden("username",ek.username)}}
<input type="hidden" name="id" value="{{ek.id}}">
<input type="hidden" name="hlevel" value="{{ek.level}}">
<div class="form-group">
  	<label class="col-sm-3 control-label">Username</label>
<div class="col-sm-5">
    <input style="background-color: white" disabled="disabled" id="NM_USER" type="text" class="form-control" name="form[NM_USER]" value="{{ek.username}}" data-validate="required" data-message-required="harus diisi" placeholder="Nama">
</div>
</div>
<div class="form-group">
  	<label class="col-sm-3 control-label">Password</label>
<div class="col-sm-5">
    {% if level ==1 %}
    <input id="Password" type="password" class="form-control" name="password" value="" placeholder="password">
{% else %}
    <input id="Password" type="password" class="form-control" name="passwordno" value="" placeholder="password">
{% endif %}
    <span id="name-error" class="validate-has-error">Kosongkan jika tidak ingin merubah password</span>
</div>
</div>
{% if level ==1 %}
{{ forms.drop("Level","form[level]","form-control",edit.level,"Level",ek.level,"5") }}
                {% else %}
<div class="form-group">
    <label class="col-sm-3 control-label">Level Akses</label>
<div class="col-sm-5">
    <input style="background-color: white" disabled="disabled" id="level" type="text" class="form-control" name="form[group]" value="{{ek.group}}" placeholder="password">
 
</div>
</div>
{% endif %}
<div class="form-group">
  	<label class="col-sm-3 control-label">Nama</label>
<div class="col-sm-5">
    <input style="background-color: white" disabled="disabled" id="nama" type="text" class="form-control" name="form[nama]" value="{{ek.NM_USER}}" placeholder="Nama">
 
</div>
</div>
<div class="form-group">
  	<label class="col-sm-3 control-label">Nip</label>
<div class="col-sm-5">
    <input style="background-color: white" disabled="disabled" id="nip" type="text" class="form-control" name="form[nip]" value="{{ek.NIP_USER}}" placeholder="NIP">
 
</div>
</div>
{% if level ==1 %}
{{ forms.drop("Pegawai","form[pegawai]","form-control",edit.pegawai,"Pegawai",ek.m_user_id,"5") }}

{{ forms.drop("Satker","form[satker]","form-control",edit.satker,"Satker",ek.sat,"5") }}
{% else %}
<div class="form-group">
    <label class="col-sm-3 control-label">Jabatan</label>
<div class="col-sm-5">
    <input style="background-color: white" disabled="disabled" id="jabatan" type="text" class="form-control" name="form[jabatan]" value="{{ek.JABAT_USER}}" placeholder="jabatan">
  </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Kelompok Kerja</label>
<div class="col-sm-5">
    <input style="background-color: white" disabled="disabled" id="kelompok" type="text" class="form-control" name="form[kelompok]" value="{{ek.satker}}" placeholder="kelompok kerja">
</div>
</div>
{% endif %}


                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
