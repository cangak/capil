    <style type="text/css">
h5 {
        font-size: 14px;
        font-weight:bold
        margin-top: 0px;
}
.invoice {
    margin: -30px 0;
}
.invoice .margin {
    margin: 5px 0 !important;
}
    .col-centered{
    float: none;
    margin: 0 auto;
}</style>
    <Script>jQuery( "#posisi" ).hide();</Script>
 {% for pk in print %}
    <div class="invoice">
        <div class="row">
            <div class="col-md-12 col-centered">
            	<center><h5>PEMERINTAH KOTA PONTIANAK</h5></STRONG>
                <h5>Bukti Pendaftaran</h5>
                <h5>{{pk.NM_KGIAT}}</h5></center>

            </div>
        </div>
        <hr class="margin">
       

        <div class="row">
            <div class="col-sm-6 invoice-left">
            
               <strong>NO Register:</strong>{{pk.ID_REG}}<br>
                <strong>Kegiatan:</strong> {{pk.NM_KGIAT_A}}<br>
                <strong>Sub Kegiatan:</strong> {{pk.NM_KGIAT_B}}<br>
                <strong>Kelompok Kegiatan:</strong> {{pk.NM_KGIAT_C}}
            </div>
            
            <div class="col-md-6 invoice-right">
            	<u>Info Perubahan</u><br />
            	{{pk.INFO_RUBAH}}
            </div>
        </div>
        <hr class="margin">
          <div class="row">
            <div class="col-sm-6 invoice-left">
              <strong>Kecamatan:</strong>{{pk.NM_KAB}}<br>
                <strong>Tgl Daftar:</strong> {{pk.TGL_REG}}<br>
                <strong>Nama Pelapor:</strong> {{pk.NM_LAPOR}}<br>
                <strong>Alamat Pelapor:</strong> {{pk.ALM_LAPOR}}<br>
                <strong>Telp Pelapor:</strong> {{pk.TELP_LAPOR}}<br>  
                          </div>
            
            <div class="col-md-6 invoice-right">
            	<u>Keterangan</u><br />
            	{{pk.INFO}}
            </div>
        </div>
        <hr class="margin">
          <div class="row">
            <div class="col-sm-6 invoice-left">
               <strong>NIK:</strong>{{pk.NIK}}<br>
                <strong>KK:</strong> {{pk.KK}}<br>
                <strong>Nama:</strong> {{pk.NM_REG }}<br>
                <strong>Alamat:</strong> {{pk.ALM_REG}}<br>
                
            </div>
            
            <div class="col-md-6 invoice-right">
            	<u><h4>Prediksi Selesai</h4></u>
            	<h3>{{pk.TGL_PRED_SELESAI}}</h3>
            </div>
        </div>
        <div class="margin"></div>
          <hr style="border: none;
    height: 2px;
    color: #000;
    background-color: #000;" />
    <div class="row">
    	<table style="width:100%;border:none">
    		<thead>
    			<tr>
    				<td>Petugas Pendafaran</td>
    				<td>Pengambilan Tanggal</td>
    				<td>Petugas Penyerah</td>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td><br /><u>{{pk.ID_USER}}</u> </td>
    				<td><br /><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> </td>
    				<td><br /><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
    			</tr>
    		</tbody>
    	</table>
    	
    </div>

        <div class="row">
            <div class="col-sm-6">
               
            </div>
            <div class="col-sm-6 invoice-right">
              <br>
                    <a class="btn btn-primary btn-icon icon-left hidden-print"
                    href="javascript:window.print();">Print Bukti Pendafaran <i class=
                    "entypo-doc-text"></i></a>
                </div>
            </div>
        </div>
    </div>
{% endfor %}