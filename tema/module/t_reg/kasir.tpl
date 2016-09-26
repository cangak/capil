    <style type="text/css">
    .col-centered{
    float: none;
    margin: 0 auto;
}
</style>

{{ print.TGL_REG }}
 {% for pk in print %}
    <br class="hidden-print">
    <div class="invoice">
     <hr class="margin">
            <div class="row">
             <div class="col-sm-4 invoice-left" style="text-align:center">Pemerintah<br />Kota Pontianak</div>
             <div class="col-sm-4 invoice-right" style="text-align:center"><center>SURAT KETETAPAN SANKSI<br />(SKS)</center></div>
             <div class="col-md-4 invoice-right" style="text-align:center">No Reg :{{ pk.ID_REG }}<br />No Retribusi: </div>
        </div>
        <hr />
          <div class="row">
           <div class="col-sm-12 invoice-left" style="text-align:center">
         MASA : {{ tahun }}<br />
         TAHUN : {{ namabulan(bulan) }}
     </div>
        </div>
         <hr />
          <div class="row">
            <div class="col-sm-6 invoice-left">
              <table><tr><td><strong>Nama</td><td>:</td><td>{{pk.NM_LAPOR}}</td></strong></tr>
                <tr><td><strong>Alamat</td><td>:</td><td>{{pk.ALM_LAPOR}}</strong> </td></tr>
                <tr><td><strong>No. POKOK WAJIB RETRIBUSI</td><td>:</td><td></strong></td></tr></table>
                
            </div>
            
        </div>
        
        
    <div class="row">
    	<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}</style>
<div class="tg-wrap"><table class="tg table table-bordered datatable dataTable no-footer dtr-inline">
  <tr>
    <th class="tg-yw4l">NO</th>
    <th class="tg-yw4l" colspan="10">KODE REKENING</th>
    <th class="tg-yw4l">URAIAN RETRIBUSI</th>
    <th class="tg-yw4l">JUMLAH (RP)</th>
  </tr>
  <tr>
    <td class="tg-yw4l">{{ pk.REK01 }}</td>
    <td class="tg-yw4l">{{ pk.REK02 }}</td>
    <td class="tg-yw4l">{{ pk.REK03 }}</td>
    <td class="tg-yw4l">{{ pk.REK04 }}</td>
    <td class="tg-yw4l">{{ pk.REK05 }}</td>
    <td class="tg-yw4l">{{ pk.REK06 }}</td>
    <td class="tg-yw4l">{{ pk.REK07 }}</td>
    <td class="tg-yw4l">{{ pk.REK08 }}</td>
    <td class="tg-yw4l">{{ pk.REK09 }}</td>
    <td class="tg-yw4l">{{ pk.REK10 }}</td>
    <td class="tg-yw4l">{{ pk.REK11 }}</td>
    <td class="tg-yw4l">{{ pk.NM_RETRI }}</td>
    <td class="tg-yw4l">{{ pk.DEF_RETRI }}</td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="11">Jumlah Ketetapan Retribusi<br />jumlah sanksi : <ol type="A"><li>Bunga</li><li>Sanksi/Denda</li></ol><br />Jumlah Keseluruhan</td>
    <td class="tg-yw4l">tes</td>
  </tr>
  </table>
  {#<p>Dengan Huruf: <br/>#<div id="dlan">
  
  </div> #</p>#}<p><strong><u>PERHATIAN</u></strong></p><p>
  <ol type="1"><li>Penyetoran dilakukan pada bendahara Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak.</li><li>Apabila SKS ini tidak atau kurang di bayar lewat waktu paling lama 30 hari setelah SKS di terima (tanggal Jatuh tempo) dikenakan sanki administrasi berupa bunga sebesar 2% perbulan.</ol>
  </p>

        <div class="margin"></div>
        <div class="row">
          <div class="col-sm-12 invoice-right"><p>Pontianak<br />Dinas Kependudukan Dan Pencatatan Sipil Kota Pontianak</p><br /><br /><hr /></div>
            </div>
            <div class="row">
            <div class="col-sm-8 invoice-left">
              <p><strong>TANDA TERIMA</strong></p>
<Table>
                   <tr><td>NAMA</td><td>&nbsp; :&nbsp; </td><td>{{pk.NM_LAPOR}}</td></tr>
                   <tr><td>ALAMAT</td><td>&nbsp; : &nbsp;</td><td>{{pk.ALM_LAPOR}}</td></tr>
                   <tr><td>NPWR</td><td>&nbsp; :&nbsp; </td><td>0</td></tr>
                 </Table>
            </div>
               <div class="col-sm-4 invoice-right">
               <p><strong>&nbsp;</strong></p>
                 <Table>
                   <tr><td>No Reg</td><td> &nbsp;:&nbsp; </td><td>{{ pk.ID_REG }}</td></tr>
                   <tr><td>No Retribusi</td><td> &nbsp;: &nbsp;</td><td>0</td></tr>
                 </Table>
            </div>
            </div>
        <div class="row">
            <div class="col-sm-6">
               
            </div>
            <div class="col-sm-6 invoice-right">
              <br>
                    <a class="btn btn-primary btn-icon icon-left hidden-print"
                    href="javascript:window.print();">Print Invoice <i class=
                    "entypo-doc-text"></i></a>
                </div>
            </div>

        </div>
   
{% endfor %}