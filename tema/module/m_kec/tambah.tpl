<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">

						<form action="module/aksi/m_kec.php?{{encu('module=m_kec&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.input("Nama Kecamatan","form[NM_KAB]", null, "text","Nama Kecamatan", "harus diisi","required","NM_KAB") }}
{{ forms.yesno("Set Aktif","IS_AKTIF","form-control select2" ) }}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
