<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/m_dinas.php?{{encu('module=m_dinas&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}
{% for ek in edit %}
{{ forms.hidden("id",ek.ID)}}
{{ forms.input("Nama","form[NM_DINAS]", ek.NM_DINAS, "text","Nama", "harus diisi","required","NM_DINAS") }}
{{ forms.input("Kota","form[KOTA]", ek.KOTA, "text","KOTA", "harus diisi","required","KOTA") }}
{{ forms.input("Nama Kadis","form[NM_KADIS]", ek.NM_KADIS, "text","Nama Kadis", "harus diisi","required","NM_KADIS") }}
{{ forms.input("NIP Kadis","form[NIP_KADIS]", ek.NIP_KADIS, "text","NIP Kadis", "harus diisi","required","NIP_KADIS") }}
{{ forms.input("Jabatan Kadis","form[JABAT_KADIS]", ek.JABAT_KADIS, "text","Jabatan Kadis", "harus diisi","required","JABAT_KADIS") }}
{{ forms.input("Nama Bendahara","form[NM_BENDAHARA]", ek.NM_BENDAHARA, "text","Nama Bendahara", "harus diisi","required","NM_BENDAHARA") }}
{{ forms.input("Nip Bendahara","form[NIP_BENDAHARA]", ek.NIP_BENDAHARA, "text","NIP Bendahara", "harus diisi","required","NIP_BENDAHARA") }}
{{ forms.input("Jabatan Bendahara","form[JABAT_BENDAHARA]", ek.JABAT_BENDAHARA, "text","Jabatan Bendahara", "harus diisi","required","JABAT_BENDAHARA") }}
{{ forms.yesno("Set No. SKS Setelah Bayar","sks","form-control select2", ek.IS_SKS_SETELAH_BYR) }}

{% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
