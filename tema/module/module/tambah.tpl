<div class="panel panel-primary" data-collapsed="0">
					
					<div class="panel-body">
						
						<form action="module/aksi/module.php?{{encu('module=module&act=tambah')}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">

							<div class="form-group">
								<label for="nama" class="col-sm-3 control-label">Judul Module</label>
								<div class="col-sm-5">
									<input  autocomplete='off' data-message-required="Colom ini wajib diisi." data-validate="required" value="" name="form[judul_module]" type="text" class="form-control" id="judul_module" placeholder="Nama Module">
								</div>
							</div>
							<div class="form-group">
								<label for="nama" class="col-sm-3 control-label">Nama Module</label>
								<div class="col-sm-5">
									<input  autocomplete='off' data-message-required="Colom ini wajib diisi." data-validate="required" value="" name="form[nama_module]" type="text" class="form-control"  id="nama_module" placeholder="Nama Module">
								</div>
							</div>
							<div class="form-group">
								<label for="nama" class="col-sm-3 control-label">Link Inlcude</label>
								<div class="col-sm-5">
									<input  data-message-required="Colom ini wajib diisi." data-validate="required" value="" name="form[link_module]" type="text" class="form-control" readonly='readonly' id="link_module" placeholder="Link Module"  style="background-color:#fff">
								</div>
							</div>
							<div class="form-group">
								<label for="nama" class="col-sm-3 control-label">Nama Table</label>
								<div class="col-sm-5">
								<select name="form[nama_table]"  id="nama_table"  class="form-control select2">
								<option value="">Pilih Table</option>
									 {% for ej in ltable %}
										<option value="{{ ej.Tables_in_fo }}">{{ej.Tables_in_fo }}</option>
									 {% endfor %}
									 </select>
								</div>
							</div>
							


							<div class="form-group">
								<label for="nama" class="col-sm-3 control-label">Primari Key Table</label>
								<div class="col-sm-5">
									<input  autocomplete='off' data-message-required="Colom ini wajib diisi." data-validate="required" name="form[primary_key]" type="text" value="id" class="form-control"  id="primary_key" placeholder="Primari Key Table">
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>
						
					</div>
				
				</div>
