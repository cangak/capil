<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">
						
						<form action="module/aksi/user.php?{{encu('module=user&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							{% import "macro/form.tpl" as forms %}
{{ forms.input("username","form[username]", null, "text","username", "harus diisi","required","username") }}
{{ forms.input("password_hash","form[password_hash]", null, "text","password_hash", "harus diisi","required","password_hash") }}
{{ forms.input("email","form[email]", null, "text","email", "harus diisi","required","email") }}
{{ forms.input("level","form[level]", null, "text","level", "harus diisi","required","level") }}
{{ forms.input("status","form[status]", null, "text","status", "harus diisi","required","status") }}
{{ forms.input("created_at","form[created_at]", null, "text","created_at", "harus diisi","required","created_at") }}
{{ forms.input("updated_at","form[updated_at]", null, "text","updated_at", "harus diisi","required","updated_at") }}
{{ forms.input("soft_delete","form[soft_delete]", null, "text","soft_delete", "harus diisi","required","soft_delete") }}



							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>
						
					</div>
				
				</div>
