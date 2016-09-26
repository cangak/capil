<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/pegawai.php?{{encu('module=pegawai&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}
{{ forms.input("Nama Pegawai","form[NM_USER]", null, "text","Nama", "harus diisi","required","NM_USER") }}
{{ forms.input("NIP","form[NIP_USER]", null, "text","NIP", "harus diisi","required","NIP_USER") }}
{{ forms.input("Jabatan","form[JABAT_USER]", null, "text","Jabatan", "harus diisi","required","JABAT_USER") }}



							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
