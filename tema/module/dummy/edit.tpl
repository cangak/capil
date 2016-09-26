<div class="panel panel-primary" data-collapsed="0">
					
					<div class="panel-body">
						
						<form action="module/aksi/#class#.php?{{encu('module=#class#&act=edit&id='~id)}}" method="POST" role="form" class="form-horizontal form-groups-bordered" novalidate="novalidate">


                           #form_edit#
                            {% endfor %}

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default">Simpan</button>
								</div>
							</div>
						</form>
						
					</div>
				
				</div>
