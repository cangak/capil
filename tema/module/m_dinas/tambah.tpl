<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">
						
						<form action="module/aksi/m_dinas.php?{{encu('module=m_dinas&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.input("NM_DINAS","form[NM_DINAS]", null, "text","NM_DINAS", "harus diisi","required","NM_DINAS") }}
{{ forms.input("KOTA","form[KOTA]", null, "text","KOTA", "harus diisi","required","KOTA") }}
{{ forms.input("NM_KADIS","form[NM_KADIS]", null, "text","NM_KADIS", "harus diisi","required","NM_KADIS") }}
{{ forms.input("NIP_KADIS","form[NIP_KADIS]", null, "text","NIP_KADIS", "harus diisi","required","NIP_KADIS") }}
{{ forms.input("JABAT_KADIS","form[JABAT_KADIS]", null, "text","JABAT_KADIS", "harus diisi","required","JABAT_KADIS") }}
{{ forms.input("NM_BENDAHARA","form[NM_BENDAHARA]", null, "text","NM_BENDAHARA", "harus diisi","required","NM_BENDAHARA") }}
{{ forms.input("NIP_BENDAHARA","form[NIP_BENDAHARA]", null, "text","NIP_BENDAHARA", "harus diisi","required","NIP_BENDAHARA") }}
{{ forms.input("JABAT_BENDAHARA","form[JABAT_BENDAHARA]", null, "text","JABAT_BENDAHARA", "harus diisi","required","JABAT_BENDAHARA") }}
{{ forms.input("UPDATED","form[UPDATED]", null, "text","UPDATED", "harus diisi","required","UPDATED") }}
{{ forms.input("ID_USER","form[ID_USER]", null, "text","ID_USER", "harus diisi","required","ID_USER") }}
{{ forms.input("IS_SKS_SETELAH_BYR","form[IS_SKS_SETELAH_BYR]", null, "text","IS_SKS_SETELAH_BYR", "harus diisi","required","IS_SKS_SETELAH_BYR") }}



							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>
						
					</div>
				
				</div>
