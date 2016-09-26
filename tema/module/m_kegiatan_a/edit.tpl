<div class="panel panel-primary" data-collapsed="0">

					<div class="panel-body">

						<form action="module/aksi/m_kegiatan_a.php?{{encu('module=m_kegiatan_a&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           {% import "macro/form.tpl" as forms %}

{% for ek in edit %}
{{ forms.hidden("id",ek.ID_KGIAT_A)}}
{{ forms.drop("ID Group Kegiatan","form[ID_KGIAT]","form-control select2",groupk,"",ek.ID_KGIAT ) }}
{{ forms.input("Nama Kegiatan","form[NM_KGIAT_A]", ek.NM_KGIAT_A, "text","NM_KGIAT_A", "harus diisi","required","NM_KGIAT_A") }}
{{ forms.input("Nama Kasi","form[KASI_NAMA]", ek.KASI_NAMA, "text","Nama Kasi", "harus diisi","required","KASI_NAMA") }}
{{ forms.input("NIP Kasi","form[KASI_NIP]", ek.KASI_NIP, "text","NIP Kasi", "harus diisi","required","KASI_NIP") }}
{{ forms.input("Pangkat Kasi","form[KASI_PANGKAT]", ek.KASI_PANGKAT, "text","Pangkat Kasi", "harus diisi","required","KASI_PANGKAT") }}
{{ forms.input("Jabatan Kasi","form[KASI_JABATAN]", ek.KASI_JABATAN, "text","Jabatan Kasi", "harus diisi","required","KASI_JABATAN") }}

                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
