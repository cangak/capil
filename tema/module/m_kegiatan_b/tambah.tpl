<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">

						<form action="module/aksi/m_kegiatan_b.php?{{encu('module=m_kegiatan_b&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.drop("Kegiatan","form[ID_KGIAT_A]","form-control select2",groupk,"Pilih Kegiatan","" ) }}
{{ forms.input("Nama Sub Kegiatan","form[NM_KEGIAT_B]", null, "text","Nama Sub Kegiatan", "harus diisi","required","NM_KEGIAT_B") }}
{{ forms.input("Lama Proses","form[LAMA]", null, "text","Lama Proses", "harus diisi","required","LAMA") }}
{{ forms.input("Kode Reg","form[KODE_REG]", null, "text","Kode Reg", "harus diisi","required","KODE_REG") }}



							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
