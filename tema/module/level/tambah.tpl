<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">
						
						<form action="module/aksi/level.php?{{encu('module=level&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.input("level","form[level]", null, "text","level", "harus diisi","required","level") }}
{{ forms.input("keterangan","form[keterangan]", null, "text","keterangan", "harus diisi","required","keterangan") }}



							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>
						
					</div>
				
				</div>
