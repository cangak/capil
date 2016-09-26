{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }}

{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{% import "macro/status.tpl" as aktif %}
{{ bb.br('Data Kecamatan','m_kec',posisi) }}

<h2>{{posisi | title}} Data Kecamatan </h2>

         {% if posisi=='edit' %}
 {% embed "module/m_kec/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/m_kec/tambah.tpl" %}

 {% endembed %}
                {% else %}
<a href="?{{encu('module=m_kec&act=tambah')}}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Add</a><br /><br />
<table class="table table-bordered datatable" id="tableku">
<thead>
<tr>
<th>no</th>
<th>Kode</th>
<th>Kecamatan</th>
<th>Status Aktif</th>

<th>aksi</th>

</tr></thead>

<tbody>
    {% for k in lm_kec %}
<tr>
<td>{{loop.index}}</td>
<td>{{ k.ID_KEC }}</td>
<td>{{ k.NM_KAB }}</td>
<td>{{ aktif.status(k.IS_AKTIF) }}</td>

<td><a href="?{{encu('module=m_kec&act=edit&id='~k.ID_KEC)}}" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a><a href="module/aksi/m_kec.php?{{encu('module=m_kec&act=hapus&id='~k.ID_KEC)}}" class="btn btn-danger btn-sm btn-icon icon-left" data-confirm="Apakah anda yakin ingin menghapus??">
  							<i class="entypo-trash"></i>
  							Delete
  						</a></td>


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
