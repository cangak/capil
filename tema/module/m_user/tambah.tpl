<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">

						<form action="module/aksi/m_user.php?{{encu('module=m_user&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.input("Username","form[NM_USER]", null, "text","Nama", "harus diisi","required","NM_USER") }}
{{ forms.input("Password","form[PASS]", null, "text","password", "harus diisi","required","PASS") }}
{{ forms.drop("Level","form[level]","form-control",lm_user.level,"Level","","5") }}
{{ forms.drop("Pegawai","form[pegawai]","form-control",lm_user.pegawai,"Pegawai","","5") }}
{{ forms.drop("Satker","form[satker]","form-control",lm_user.satker,"Satker","","5") }}




							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
