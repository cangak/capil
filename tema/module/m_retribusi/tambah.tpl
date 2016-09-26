<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">

						<form action="module/aksi/m_retribusi.php?{{encu('module=m_retribusi&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.drop("Sub Kegiatan","form[ID_KGIAT_B]","form-control select2",groupk,"Pilih Sub Kegiatan","" ) }}
{{ forms.input("Info Retribusi","form[NM_RETRI]", null, "text","Info Retribusi", "harus diisi","required","NM_RETRI") }}
{{ forms.input("Nilai","form[DEF_RETRI]", null, "text","Nilai", "harus diisi","required","DEF_RETRI") }}
{{ forms.input("Info Pembayaran","form[INFO_BAYAR]", null, "text","Info Pembayaran", "harus diisi","required","INFO_BAYAR") }}

{{ forms.input("REK 01","form[REK01]", null, "text","REK 01", "harus diisi","required","REK01") }}
{{ forms.input("REK 02","form[REK02]", null, "text","REK 02", "harus diisi","required","REK02") }}
{{ forms.input("REK 03","form[REK03]", null, "text","REK 03", "harus diisi","required","REK03") }}
{{ forms.input("REK 04","form[REK04]", null, "text","REK 04", "harus diisi","required","REK04") }}
{{ forms.input("REK 05","form[REK05]", null, "text","REK 05", "harus diisi","required","REK05") }}
{{ forms.input("REK 06","form[REK06]", null, "text","REK 06", "harus diisi","required","REK06") }}
{{ forms.input("REK 07","form[REK07]", null, "text","REK 07", "harus diisi","required","REK07") }}
{{ forms.input("REK 08","form[REK08]", null, "text","REK 08", "harus diisi","required","REK08") }}
{{ forms.input("REK 09","form[REK09]", null, "text","REK 09", "harus diisi","required","REK09") }}
{{ forms.input("REK 10","form[REK10]", null, "text","REK 10", "harus diisi","required","REK10") }}
{{ forms.input("REK 11","form[REK11]", null, "text","REK 11", "harus diisi","required","REK11") }}




							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
