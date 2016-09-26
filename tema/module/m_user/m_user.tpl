{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}

  {{ parent() }} 
  
{% endblock %}
{% block content %}
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{% import "macro/status.tpl" as aktif %}

{{ bb.br('Data User','m_user',posisi) }}

<h2>{{posisi | title}} Data User </h2>

         {% if posisi=='edit' %}
 {% embed "module/m_user/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/m_user/tambah.tpl" %}

 {% endembed %}
                {% else %}

<a href="?{{encu('module=m_user&act=tambah')}}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Add</a><br /><br />				
<table class="table table-bordered datatable" id="tableku">
<thead>
<tr>
<th>no</th>
<th>ID User</th>
<th>Nama User</th>
<th>Jabatan</th>
<th>NIP</th>
<th>aksi</th>

</tr></thead>

<tbody>
    {% for k in lm_user.user %}
<tr>
<td>{{loop.index}}</td>
<td>{{ k.username }}</td>
<td>{{ k.NM_USER }}</td>
<td>{{ k.JABAT_USER }}</td>
<td>{{ k.NIP_USER }}</td>

<td width="180"><a href="?{{encu('module=m_user&act=edit&id='~k.id)}}" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
                     {% if level=='1' %}
<a href="module/aksi/m_user.php?{{encu('module=m_user&act=hapus&id='~k.id)}}" class="btn btn-danger btn-sm btn-icon icon-left" data-confirm="Apakah anda yakin ingin menghapus??">
              <i class="entypo-trash"></i>
              Delete
            </a> {% endif %}</td>


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
