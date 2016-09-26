<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/pegawai.php?{{encu('module=pegawai&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}
{% for ek in edit %}
{{ forms.hidden("id",ek.USER_ID)}}
{{ forms.input("Nama Pegawai","form[NM_USER]", ek.NM_USER, "text","Nama", "harus diisi","required","NM_USER") }}
{{ forms.input("NIP","form[NIP_USER]", ek.NIP_USER, "text","NIP", "harus diisi","required","NIP_USER") }}
{{ forms.input("Jabatan","form[JABAT_USER]", ek.JABAT_USER, "text","Jabatan", "harus diisi","required","JABAT_USER") }}

                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
