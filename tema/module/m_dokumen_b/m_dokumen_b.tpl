{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }}

{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{{ bb.br('Dokumen Sub Kegiatan','m_dokumen_b',posisi) }}

<h2>{{posisi | title}} Dokumen Sub Kegiatan </h2>

         {% if posisi=='edit' %}
 {% embed "module/m_dokumen_b/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/m_dokumen_b/tambah.tpl" %}

 {% endembed %}
                {% else %}
<a href="?{{encu('module=m_dokumen_b&act=tambah')}}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Add</a><br /><br />
<table class="table table-bordered datatable" id="tableku">
<thead>
<tr>
<th>no</th>
<th>Dokumen / Kelengkapan</th>
<th>Sub Kegiatan</th>
<th>Kegiatan</th>
<th>aksi</th>

</tr></thead>

<tbody>
    {% for k in lm_dokumen_b %}
<tr>
<td>{{loop.index}}</td>
<td>{{ k.NM_DOKU_B }}</td>
<td>{{ k.NM_KEGIAT_B }}</td>
<td>{{ k.NM_KGIAT_A }}</td>
<td width="150"><a href="?{{encu('module=m_dokumen_b&act=edit&id='~k.ID_DOKU_B)}}" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a><a href="module/aksi/m_dokumen_b.php?{{encu('module=m_dokumen_b&act=hapus&id='~k.ID_DOKU_B)}}" class="btn btn-danger btn-sm btn-icon icon-left" data-confirm="Apakah anda yakin ingin menghapus??">
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
