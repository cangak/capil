{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }}

{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{{ bb.br('Data Dinas','m_dinas',posisi) }}

<h2>{{posisi | title}} Data Dinas </h2>

         {% if posisi=='edit' %}
 {% embed "module/m_dinas/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/m_dinas/tambah.tpl" %}

 {% endembed %}
                {% else %}

<table class="table table-bordered datatable" id="tableku">
<thead>
<tr>
<th>no</th>
<th>Dinas</th>
<th>Kota</th>
<th>Nama Kadis</th>
<th>NIP Kadis</th>
<th>Jabatan</th>
<th>Nama Bendahara</th>
<th>NIP Bendahara</th>
<th>Jabatan</th>
<th>aksi</th>

</tr></thead>

<tbody>
    {% for k in lm_dinas %}
<tr>
<td>{{loop.index}}</td>
<td>{{ k.NM_DINAS }}</td>
<td>{{ k.KOTA }}</td>
<td>{{ k.NM_KADIS }}</td>
<td>{{ k.NIP_KADIS }}</td>
<td>{{ k.JABAT_KADIS }}</td>
<td>{{ k.NM_BENDAHARA }}</td>
<td>{{ k.NIP_BENDAHARA }}</td>
<td>{{ k.JABAT_BENDAHARA }}</td>
<td><a href="?{{encu('module=m_dinas&act=edit&id='~k.ID)}}" class="btn btn-default btn-sm btn-icon icon-left">
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

<!-- Imported scripts on this page -->
	<script src="tema/assets/js/datatables/lodash.min.js"></script>

    	<script src="tema/assets/js/jquery.validate.min.js"></script>


{% endblock %}
