{% macro aksi(md,id) %}
<a href="?{{encu('module='~md~'&act=edit&id='~id)}}" class="btn btn-info btn-sm btn-icon icon-left">
    <i class="entypo-pencil"></i>Edit</a>
<a href="?{{encu('module='~md~'&act=delete-confirm&id='~id)}}" class="btn btn-danger btn-sm btn-icon icon-left">
    <i class="entypo-cancel"></i>Delete</a>
<a href="?{{encu('module='~md~'&act=simpan&aksi=aktif&id='~id)}}" class="btn btn-blue btn-sm btn-icon icon-left">
    <i class="entypo-cancel"></i>Aktif</a>
{% endmacro %}
