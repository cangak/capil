{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }}

{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{{ bb.br('Pegawai','pegawai',posisi) }}

<h2>{{posisi | title}} Pegawai </h2>

         {% if posisi=='edit' %}
 {% embed "module/pegawai/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/pegawai/tambah.tpl" %}

 {% endembed %}
                {% else %}
<a href="?{{encu('module=pegawai&act=tambah')}}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Add</a><br /><br />
<table class="table table-bordered datatable" id="tableku">
<thead>
<tr>
<th>No</th>
<th>Nama Pegawai</th>
<th>NIP</th>
<th>Jabatan Pegawai</th>
<th width="150">Aksi</th>

</tr></thead>

<tbody>
    {% for k in lpegawai %}
<tr>
<td>{{loop.index}}</td>
<td>{{ k.NM_USER }}</td>
<td>{{ k.NIP_USER }}</td>
<td>{{ k.JABAT_USER }}</td>

<td><a href="?{{encu('module=pegawai&act=edit&id='~k.USER_ID)}}" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
          </a><a href="module/aksi/pegawai.php?{{encu('module=pegawai&act=hapus&id='~k.USER_ID)}}" class="btn btn-danger btn-sm btn-icon icon-left" data-confirm="Apakah anda yakin ingin menghapus??">
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
