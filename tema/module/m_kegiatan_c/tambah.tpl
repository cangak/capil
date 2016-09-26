<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">

						<form action="module/aksi/m_kegiatan_c.php?{{encu('module=m_kegiatan_c&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.drop("Sub Kegiatan","form[ID_KGIAT_B]","form-control select2",groupk,"Pilih Sub Kegiatan","" ) }}
{{ forms.input("Nama Sub Kelompok","form[NM_KEGIAT_C]", null, "text","Nama Sub Kelompok", "harus diisi","required","NM_KEGIAT_C") }}



							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
