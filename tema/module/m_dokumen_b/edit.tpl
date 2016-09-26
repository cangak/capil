<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/m_dokumen_b.php?{{encu('module=m_dokumen_b&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}
{% for ek in edit %}
{{ forms.hidden("id",ek.ID_DOKU_B)}}
{{ forms.drop("Sub Kegiatan","form[ID_KGIAT_B]","form-control select2",groupk,"",ek.ID_KGIAT_B ) }}
{{ forms.input("Nama Dokumen Kegiatan / Kelengkapan","form[NM_DOKU_B]", ek.NM_DOKU_B, "text","Nama Dokumen Kegiatan / Kelengkapan", "harus diisi","required","NM_DOKU_B") }}

                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
