{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }} 
  
{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{{ bb.br('#nama#','#class#',posisi) }}

<h2>{{posisi | title}} #nama# </h2>

         {% if posisi=='edit' %}
 {% embed "module/#class#/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/#class#/tambah.tpl" %}

 {% endembed %}
                {% else %}
<a href="?{{encu('module=#class#&act=tambah')}}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Add</a><br /><br />				
<table class="table table-bordered datatable" id="tableku">
<thead>
<tr>
#th#
</tr></thead>

<tbody>
    {% for k in l#class# %}
<tr>
#td#

</tr>
 {% endfor %}</tbody>

</table>
{% endif %}

</div>
{% endblock %}
{% block js %}   
	<link rel="stylesheet" href="tema/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="tema/assets/js/select2/select2.css">
<!-- Imported scripts on this page -->
	<script src="tema/assets/js/datatables/lodash.min.js"></script>
	<script src="tema/assets/js/select2/select2.min.js"></script>
    	<script src="tema/assets/js/jquery.validate.min.js"></script>

     
{% endblock %}
