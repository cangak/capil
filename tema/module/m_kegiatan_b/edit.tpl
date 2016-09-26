<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/m_kegiatan_b.php?{{encu('module=m_kegiatan_b&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}
{% for ek in edit %}
{{ forms.hidden("id",ek.ID_KGIAT_B)}}
{{ forms.drop("Kegiatan","form[ID_KGIAT_A]","form-control select2",groupk,"",ek.ID_KGIAT_A ) }}
{{ forms.input("Nama Sub Kegiatan","form[NM_KEGIAT_B]", ek.NM_KEGIAT_B, "text","NM_KEGIAT_B", "harus diisi","required","NM_KEGIAT_B") }}
{{ forms.input("Lama Proses","form[LAMA]", ek.LAMA, "text","Lama Proses", "harus diisi","required","LAMA") }}
{{ forms.input("Kode Reg","form[KODE_REG]", ek.KODE_REG, "text","Kode Reg", "harus diisi","required","KODE_REG") }}

                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
