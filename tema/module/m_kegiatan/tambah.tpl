<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">

						<form action="module/aksi/m_kegiatan.php?{{encu('module=m_kegiatan&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.input("Nama Group Kegiatan","form[NM_KGIAT]", null, "text","Nama Group Kegiatan", "harus diisi","required","NM_KGIAT") }}
{{ forms.yesno("Set Aktif","IS_AKTIF","form-control select2" ) }}




							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
