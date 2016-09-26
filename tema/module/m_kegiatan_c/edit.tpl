<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/m_kegiatan_c.php?{{encu('module=m_kegiatan_c&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}
{% for ek in edit %}
{{ forms.hidden("id",ek.ID_KGIAT_C)}}
{{ forms.drop("Sub Kegiatan","form[ID_KGIAT_B]","form-control select2",groupk,"",ek.ID_KGIAT_B ) }}
{{ forms.input("Nama Sub Kelompok","form[NM_KEGIAT_C]", ek.NM_KEGIAT_C, "text","Nama Sub Kelompok", "harus diisi","required","NM_KEGIAT_C") }}

                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
