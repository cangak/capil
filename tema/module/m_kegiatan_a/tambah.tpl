<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">

						<form action="module/aksi/m_kegiatan_a.php?{{encu('module=m_kegiatan_a&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}



{{ forms.drop("ID Group Kegiatan","form[ID_KGIAT]","form-control select2",groupk,"Pilih Group Kegiatan","" ) }}
{{ forms.input("Nama kegiatan","form[NM_KGIAT_A]", null, "text","Nama Kegiatan", "harus diisi","required","NM_KGIAT_A") }}
{{ forms.input("Nama Kasi","form[KASI_NAMA]", null, "text","Nama Kasi", "harus diisi","required","KASI_NAMA") }}
{{ forms.input("NIP Kasi","form[KASI_NIP]", null, "text","NIP Kasi", "harus diisi","required","KASI_NIP") }}
{{ forms.input("Pangkat Kasi","form[KASI_PANGKAT]", null, "text","Pangkat Kasi", "harus diisi","required","KASI_PANGKAT") }}
{{ forms.input("Jabatan Kasi","form[KASI_JABATAN]", null, "text","Jabatan Kasi", "harus diisi","required","KASI_JABATAN") }}


							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>

					</div>

				</div>
