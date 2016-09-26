<div class="panel panel-primary" data-collapsed="0">
					
					<div class="panel-body">
						
						<form action="module/aksi/user.php?{{encu('module=user&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">
                           {% import "macro/form.tpl" as forms %}
{{ forms.hidden("id",id)}}
{{ forms.input("username","form[username]", ek.username, "text","username", "harus diisi","required","username") }}
{{ forms.input("password_hash","form[password_hash]", ek.password_hash, "text","password_hash", "harus diisi","required","password_hash") }}
{{ forms.input("email","form[email]", ek.email, "text","email", "harus diisi","required","email") }}
{{ forms.input("level","form[level]", ek.level, "text","level", "harus diisi","required","level") }}
{{ forms.input("status","form[status]", ek.status, "text","status", "harus diisi","required","status") }}
{{ forms.input("created_at","form[created_at]", ek.created_at, "text","created_at", "harus diisi","required","created_at") }}
{{ forms.input("updated_at","form[updated_at]", ek.updated_at, "text","updated_at", "harus diisi","required","updated_at") }}
{{ forms.input("soft_delete","form[soft_delete]", ek.soft_delete, "text","soft_delete", "harus diisi","required","soft_delete") }}


							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
                            {% endfor %}
						</form>
						
					</div>
				
				</div>
