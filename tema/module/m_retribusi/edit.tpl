<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/m_retribusi.php?{{encu('module=m_retribusi&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}
{% for ek in edit %}
{{ forms.hidden("id",ek.ID_RETRI)}}
{{ forms.drop("Sub Kegiatan","form[ID_KGIAT_B]","form-control select2",groupk,"",ek.ID_KGIAT_B ) }}
{{ forms.input("Info Retribusi","form[NM_RETRI]", ek.NM_RETRI, "text","Info Retribusi", "harus diisi","required","NM_RETRI") }}
{{ forms.input("Nilai","form[DEF_RETRI]", ek.DEF_RETRI, "text","Nilai", "harus diisi","required","DEF_RETRI") }}
{{ forms.input("Info Pembayaran","form[INFO_BAYAR]", ek.INFO_BAYAR, "text","Info Pembayaran", "harus diisi","required","INFO_BAYAR") }}
{{ forms.input("REK01","form[REK01]", ek.REK01, "text","REK01", "harus diisi","required","REK01") }}
{{ forms.input("REK02","form[REK02]", ek.REK02, "text","REK02", "harus diisi","required","REK02") }}
{{ forms.input("REK03","form[REK03]", ek.REK03, "text","REK03", "harus diisi","required","REK03") }}
{{ forms.input("REK04","form[REK04]", ek.REK04, "text","REK04", "harus diisi","required","REK04") }}
{{ forms.input("REK05","form[REK05]", ek.REK05, "text","REK05", "harus diisi","required","REK05") }}
{{ forms.input("REK06","form[REK06]", ek.REK06, "text","REK06", "harus diisi","required","REK06") }}
{{ forms.input("REK07","form[REK07]", ek.REK07, "text","REK07", "harus diisi","required","REK07") }}
{{ forms.input("REK08","form[REK08]", ek.REK08, "text","REK08", "harus diisi","required","REK08") }}
{{ forms.input("REK09","form[REK09]", ek.REK09, "text","REK09", "harus diisi","required","REK09") }}
{{ forms.input("REK10","form[REK10]", ek.REK10, "text","REK10", "harus diisi","required","REK10") }}
{{ forms.input("REK11","form[REK11]", ek.REK11, "text","REK11", "harus diisi","required","REK11") }}

                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
