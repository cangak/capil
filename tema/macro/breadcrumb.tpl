{% macro br(nama,md, posisi) %}
<ol class="breadcrumb bc-3 hidden-print">
	<li><a href="/"><i class="entypo-home"></i>Dashboard</a></li>
        {% if posisi=='tambah' %}
        	<li><a href="?{{encu('module='~md)}}">{{ nama|title }}</a></li>
            <li class="active">Tambah {{ nama|title }}</li>
        {% elseif posisi=='edit' %}
            <li><a href="?{{encu('module='~md)}}">{{ nama|title }}</a></li>
            <li class="active">Ubah {{ nama|title }}</li>
        {% elseif posisi=='delete' %}
            <li><a href="?{{encu('module='~md)}}">{{ nama|title }}</a></li>
                <li class="active">Delete {{ nama|title }}</li>
        {% else %}
            <li class='active'>{{ nama|title }}</li>
        {% endif %}
</ol>

{% endmacro %}
