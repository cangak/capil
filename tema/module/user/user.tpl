{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }} 
  
{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{{ bb.br('user',posisi) }}

<h2>{{posisi |title}} user  </h2>

         {% if posisi=='edit' %}
 {% embed "module/user/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/user/tambah.tpl" %}

 {% endembed %}
                {% else %}
<a href="?{{encu('module=user&act=tambah')}}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Add</a><br /><br />				
<table class="table table-bordered datatable" id="table-1">
<thead>
<tr>
<th>no</th><th>username</th>
<th>password_hash</th>
<th>email</th>
<th>level</th>
<th>status</th>
<th>created_at</th>
<th>updated_at</th>
<th>soft_delete</th>
<th>aksi</th>

</tr></thead>

<tbody>
    {% for k in luser %}
<tr>
<td>{{loop.index}}</td>
<td>{{ k.username }}</td>
<td>{{ k.password_hash }}</td>
<td>{{ k.email }}</td>
<td>{{ k.level }}</td>
<td>{{ k.status }}</td>
<td>{{ k.created_at }}</td>
<td>{{ k.updated_at }}</td>
<td>{{ k.soft_delete }}</td>
<td><a href="?{{encu('module=user&act=edit&id='~k.id)}}" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a></td>


</tr>
 {% endfor %}</tbody>

</table>
{% endif %}

</div>
{% endblock %}
{% block js %}   
<link rel="stylesheet" href="tema/assets/js/datatables/responsive/css/datatables.responsive.css">
	<link rel="stylesheet" href="tema/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="tema/assets/js/select2/select2.css">
<script src="tema/assets/js/jquery.dataTables.min.js"></script>
	<script src="tema/assets/js/datatables/TableTools.min.js"></script>
<!-- Imported scripts on this page -->
	<script src="tema/assets/js/dataTables.bootstrap.js"></script>
	<script src="tema/assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
	<script src="tema/assets/js/datatables/lodash.min.js"></script>
	<script src="tema/assets/js/datatables/responsive/js/datatables.responsive.js"></script>
	<script src="tema/assets/js/select2/select2.min.js"></script>
    	<script src="tema/assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
		var responsiveHelper;
		var breakpointDefinition = {
		    tablet: 1024,
		    phone : 480
		};
		var tableContainer;
		
			jQuery(document).ready(function($)
			{
				tableContainer = $("#table-1");
				
				tableContainer.dataTable({
					"sPaginationType": "bootstrap",
					"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"bStateSave": true,
					
		
				    // Responsive Settings
				    bAutoWidth     : false,
				    fnPreDrawCallback: function () {
				        // Initialize the responsive datatables helper once.
				        if (!responsiveHelper) {
				            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
				        }
				    },
				    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
				        responsiveHelper.createExpandIcon(nRow);
				    },
				    fnDrawCallback : function (oSettings) {
				        responsiveHelper.respond();
				    }
				});
				
				$(".dataTables_wrapper select").select2({
					minimumResultsForSearch: -1
				});
			});
		</script>           
{% endblock %}
