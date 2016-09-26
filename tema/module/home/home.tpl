{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}
<style>

.shortcuts {
	text-align: center;
}

.shortcuts .shortcut {
	width: 10%;
	display: inline-block;
	padding: 25px 0;
	margin: 0 .9% 1em;
	vertical-align: top;

	text-decoration: none;

	background: #f9f6f1;

	border-radius: 5px;
}

.shortcuts .shortcut .shortcut-icon {
	margin-top: .25em;
	margin-bottom: .25em;

	font-size: 32px;
	color: #3B5998;
}

.shortcuts .shortcut:hover {
	background: #3b5998;
}

.shortcuts .shortcut:hover span{
	color: #fff;
}

.shortcuts .shortcut:hover .shortcut-icon {
	color: #fff;
}

.shortcuts .shortcut-label {
	display: block;

	font-weight: 400;
	color: #545454;
}
</style>
  {{ parent() }}

{% endblock %}
{% block content %}


<div class="col-sm-3 col-xs-12">
    <div class="tile-stats tile-white-blue">
        <div class="icon">
            <i class="entypo-archive"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ jumlah_all }}" data-postfix="" data-duration="1500" data-delay="0">{{ jumlah_all}}
        </div>
        <h3>User Terdaftar</h3>
        <p>Rekap Semua Data.</p>
    </div>
</div>
<div class="col-sm-3 col-xs-12">
    <div class="tile-stats tile-white-blue">
        <div class="icon">
            <i class="entypo-folder"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ jumlah_bulan_ini }}" data-postfix="" data-duration="1500" data-delay="0">{{ jumlah_bulan_ini}}
        </div>
        <h3>User Terdaftar</h3>
        <p>Bulan {{bulan}}.</p>
    </div>
</div>


<div class="col-sm-6 col-xs-12">
    <div class="tile-stats tile-white-blue">
        <div class="icon"><i class="entypo-attention"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ jumlah_selesai_hari_ini }}" data-postfix="" data-duration="1500" data-delay="0">{{ jumlah_selesai_hari_ini}}</div>
        <h3>User Terdaftar</h3>
        <p>Perkiraan Selesai Hari ini.</p>
    </div>
</div>

<div class="col-sm-6 col-xs-6">
    <div class="tile-stats tile-white-blue">
        <div class="icon"><i class="entypo-cc-nc"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ blunas }}" data-postfix="" data-duration="1500" data-delay="0">{{ blunas }}</div>
        <h3>User Restribusi</h3>
        <p>Belum Lunas.</p>
    </div>
</div>

<div class="col-sm-6 col-xs-6">
    <div class="tile-stats tile-white-blue">
        <div class="icon"><i class="entypo-cc"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ lunas }}" data-postfix="" data-duration="1500" data-delay="0">{{ lunas }}</div>
        <h3>User Restribusi</h3>
        <p>Sudah Lunas.</p>
    </div>
</div>

<div class="col-sm-4 col-xs-12">
    <div class="tile-stats tile-white-blue">
        <div class="icon"><i class="entypo-flow-line"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ proses }}" data-postfix="" data-duration="1500" data-delay="0">{{ proses}}</div>
        <h3>User Status</h3>
        <p>Diproses.</p>
    </div>
</div>

<div class="col-sm-4 col-xs-12">
    <div class="tile-stats tile-white-blue">
        <div class="icon"><i class="entypo-flow-branch"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ pending }}" data-postfix="" data-duration="1500" data-delay="0">{{ pending }}</div>
        <h3>User Status</h3>
        <p>Pending.</p>
    </div>
</div>

<div class="col-sm-4 col-xs-12">
    <div class="tile-stats tile-white-blue">
        <div class="icon"><i class="entypo-flow-tree"></i>
        </div>
        <div class="num" data-start="0" data-end="{{ selesai }}" data-postfix="" data-duration="1500" data-delay="0">{{ selesai}}</div>
        <h3>User Status</h3>
        <p>Selesai Di proses.</p>
    </div>
</div>


{% endblock %}
{% block js %}
{% endblock %}
