{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }}

{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{{ bb.br('Retribusi Sub Kegiatan','m_retribusi',posisi) }}

<h2>{{posisi | title}} Retribusi Sub Kegiatan </h2>

         {% if posisi=='edit' %}
 {% embed "module/m_retribusi/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/m_retribusi/tambah.tpl" %}

 {% endembed %}
                {% else %}
<a href="?{{encu('module=m_retribusi&act=tambah')}}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Add</a><br /><br />
<table class="table table-bordered datatable" id="tableku">
<thead>
<tr>
<th rowspan="2">no</th>
<th rowspan="2">Info Retribusi</th>
<th rowspan="2">Info Pada Pembayaran</th>
<th rowspan="2">Nilai</th>
<th rowspan="2">Kegiatan</th>
<th rowspan="2">Sub Kegiatan</th>
<th colspan="11" class="text-center">REK</th>
<th rowspan="2">aksi</th>
</tr>
<tr>
<th>01</th>
<th>02</th>
<th>03</th>
<th>04</th>
<th>05</th>
<th>06</th>
<th>07</th>
<th>08</th>
<th>09</th>
<th>10</th>
<th>11</th>
</tr>
</thead>

<tbody>
    {% for k in lm_retribusi %}
<tr>
<td>{{loop.index}}</td>
<td>{{ k.NM_RETRI }}</td>
<td>{{ k.INFO_BAYAR }}</td>
<td>{{ k.DEF_RETRI }}</td>
<td>{{ k.NM_KGIAT_A }}</td>
<td>{{ k.NM_KEGIAT_B }}</td>
<td>{{ k.REK01 }}</td>
<td>{{ k.REK02 }}</td>
<td>{{ k.REK03 }}</td>
<td>{{ k.REK04 }}</td>
<td>{{ k.REK05 }}</td>
<td>{{ k.REK06 }}</td>
<td>{{ k.REK07 }}</td>
<td>{{ k.REK08 }}</td>
<td>{{ k.REK09 }}</td>
<td>{{ k.REK10 }}</td>
<td>{{ k.REK11 }}</td>
<td><a href="?{{encu('module=m_retribusi&act=edit&id='~k.ID_RETRI)}}" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a><a href="module/aksi/m_retribusi.php?{{encu('module=m_retribusi&act=hapus&id='~k.ID_RETRI)}}" class="btn btn-danger btn-sm btn-icon icon-left" data-confirm="Apakah anda yakin ingin menghapus??">
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
