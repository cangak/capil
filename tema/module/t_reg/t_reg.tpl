{% extends "layout/base.tpl" %}
{% block title %}{{ judul }}{% endblock %}
{% block head %}
<style type="text/css">
img.load{
   position:absolute;
   top:50%;
   left:50%;
   margin-top:-25px;
   margin-left:-25px;
}
#loading
{
    position: relative;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.28);
    display:none;
    z-index:100000;
}
.modal-body {
  overflow:auto;
}
.datepicker-inline {
    width: 100% !important;
}
.datepicker table {
    width: 100% !important;
}
</style>
  {{ parent() }} 
  
{% endblock %}
{% block content %}
 <div id="loading">
 <img class="load" src='tema/assets/images/reload.gif'>
    </div>
<div class="col-xs-12 col-left">
{% import "macro/breadcrumb.tpl" as bb %}
{{ bb.br('Register','t_reg',posisi) }}

<h2 id="posisi" class="hidden-print">{{posisi | title}} Register </h2>
 {% if posisi=='edit' or posisi=='update' %}
 {% embed "module/t_reg/edit.tpl" %}
 {% endembed %}
 {% elseif posisi=='tambah' %}
 {% embed "module/t_reg/tambah.tpl" %}

 {% endembed %}
{% elseif posisi=='print' %}
 {% embed "module/t_reg/print.tpl" %}

 {% endembed %}
 {% elseif posisi=='kasir' %}
 {% embed "module/t_reg/kasir.tpl" %}

 {% endembed %}
 {% elseif posisi=='hapus' %}
 {% embed "module/t_reg/hapus.tpl" %}

 {% endembed %}
                {% else %}
        {% if level=="admin" or level=='umum' %}        
	<a href="?{{encu('module=t_reg&act=tambah')}}" class="btn btn-primary btn-sm btn-icon icon-left"><i class="entypo-plus"></i>Tambah Register</a><hr /> 
  {% endif %}
                                                        {% import "macro/form.tpl" as forms %}

<form class="form-horizontal"  role="search">  
                                <div class="form-group">
                                <div class="col-sm-4">
{{ forms.dropalone("gkegiatan","gkegiatan","form-control gkegiatan" ,gkegiatan,"Pilih Group Kegiatan","") }}

  								</div>
                                <div class="col-sm-4">
{{ forms.dropalone("nkegiatan","nkegiatan","form-control nkegiatan","","Pilih Nama Kegiatan","") }}

								</div>
                                <div class="col-sm-4">
{{ forms.dropalone("skegiatan","skegiatan","form-control skegiatan","","Pilih Sub Kegiatan","") }}

        						</div>
                          <!--div class="col-sm-3">
<div class="btn-group  btn-block">
  <button type="button" class="btn  btn-block btn-lg btn-default btn-icon icon-left dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="entypo-plus"></i>
    Filter Data <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li id="stat"><a  class="stat" href="">Status Data</a></li>
    <li id="stat"><a  class="stat" href="1">Proses</a></li>
    <li id="stat"><a  class="stat" href="2">Pending</a></li>
    <li   id="stat"><a class="stat" href="3">Selesai</a></li>
  </ul>
</div>

       </div-->
       </div>
      </form>
<table class="table table-bordered datatable" id="t_reg" width="100%">
<thead>
<tr>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>No Register</th>
<th>Tanggal</th>
<th>Pelapor</th>
<th>Telp. Pelapor</th>
<th>Nama</th>
<th>NIK</th>
<th>aksi</th>

</tr></thead>

<tbody>
</tbody>

</table>
{% endif %}

</div>
<div class="modal fade" id="hasilcari" data-backdrop="static">
<div class="modal-dialog" style="width: 96%">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Data </h4>
        </div>
        
        <div class="modal-body">
        
          Content is loading...
          
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="modal-7" data-backdrop="static">
<div id="dialog" class="modal-dialog" style="width: 96%">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Detail Data Register</h4>
        </div>
        
        <div id="body" style="min-height: 350px;" class="scrollable modal-body">
        
          Content is loading...
          
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
 
 <div class="modal fade" id="confirm" data-backdrop="static">
<div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        
        <div id="konfirmasitombol" class="modal-body">
        
         
          
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <a id="idkofirm" href=""><button type="button" class="btn btn-default" >Ok</button></a>
        </div>
      </div>
    </div>
  </div>
{% endblock %}
{% block js %}   

<!-- Imported scripts on this page -->
	<script src="tema/assets/js/datatables/lodash.min.js"></script>
  <script src="tema/assets/js/jquery.validate.min.js"></script>
  <script src="tema/assets/js/jquery.chained.remote.min.js" type="text/javascript" charset="utf-8"></script>
 
  <script src="tema/module/t_reg/js/table_{{level}}.js" type="text/javascript" charset="utf-8"></script>
 
    <script src="tema/assets/js/jquery.multi-select.js"></script>
    <script src="tema/assets/js/jquery.quicksearch.js"></script>
    	{#<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
    	<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    	<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    	<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    	<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
    	<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>#}
<script>
 jQuery(document).ready(function($) {
      var ape = $('#t_reg').DataTable();

  $('#t_reg tbody').on('click', '#hapus', function(event) {
     event.preventDefault();
      var random_pct = 25 + Math.round(Math.random() * 30);
    show_loading_bar({
                pct: random_pct, // number from 0-100,
                delay: 1.3
             });
     $("#konfirmasitombol").empty();
     $("#idkofirm").attr("href", "");
     $("#idkofirm").removeClass();
     var idn = (jQuery(this).attr("id"));
      var href = $(this).attr('href');
       var random_pct = 100;
              show_loading_bar({
                pct: random_pct, // number from 0-100,
               finish: function()
          {
         $("<span>Data yang di hapus tidak dapat di kembalikan!!</span>").appendTo("#konfirmasitombol");
            $("#idkofirm").attr("href", href);
            $("#idkofirm").addClass('hapusnih');
                jQuery('#confirm').modal('show', {backdrop: 'static',keyboard:'false'});
         }
             });


    });
  $("#confirm .modal-dialog .modal-content .modal-footer").on('click', '.hapusnih', function(event) {
 event.preventDefault();
    var a = $(this).attr('href');
  jQuery.ajax({
             type: "POST",
             data: {
                 'id': $(this).attr('href')
             },
             url: "module/ajax/t_reg/delete.php",
             success: function(response) {
              var fata = JSON.parse(response);
                     if (fata.res == 1) {
                       location.reload();

               //       $("#t_reg #0001.AL.04.16").fadeOut('slow', function() {
                 //         $(this).remove();});
                        

                      }
                   }

   });
   });
 {#konfirm#}

   $('#t_reg tbody').on('click', '#update,#print', function(event) {
     event.preventDefault();
      var random_pct = 25 + Math.round(Math.random() * 30);
    show_loading_bar({
                pct: random_pct, // number from 0-100,
                delay: 1.3
             });
     $("#konfirmasitombol").empty();
     $("#idkofirm").attr("href", "");

      
      var idn = (jQuery(this).attr("id"));
        var href = $(this).attr('href');;
        $("<span>"+idn+" data <b>"+href+"</b>?</span>").appendTo("#konfirmasitombol");
       $.ajax({
         url: 'module/ajax/jstotwig.php',
         type: 'POST',
         data: {id: idn,url:href},
       success: function(data) {
                var random_pct = 100;
              show_loading_bar({
                pct: random_pct, // number from 0-100,
               finish: function()
          {
          $("#idkofirm").attr("href", data);
          jQuery('#confirm').modal('show', {backdrop: 'static',keyboard:'false'});          }
             });
                }
    });

    });
  
  {# cari lapor #}
  $("#cari_data").click(function(event) {
    if ($(".NM_LAPOR").val()=='') {
      alert("ketikan nama pelapor sebelum klik tombol cari");
    } else {
    var random_pct = 25 + Math.round(Math.random() * 30);
    show_loading_bar({
                pct: random_pct, // number from 0-100,
                delay: 1.3
             });
      event.preventDefault();
      var searchKeyword = $(".NM_LAPOR").val();
      if (searchKeyword.length >= 3) {
       // alert(searchKeyword);
       $.ajax({
         url: 'module/ajax/t_reg/oci.php',
         type: 'POST',
         data: {keywords: searchKeyword,golek:'lapor'},
       success: function(data) {
       
          var random_pct = 100;
              show_loading_bar({
                pct: random_pct, // number from 0-100,
               finish: function()
          {
             $('#hasilcari .modal-body').empty()
             $('#hasilcari .modal-body').html(data);
            $('#hasilcari').modal('show');
          }
             });
          // The form data are subbmitted, we can forward the progress to 70%
          //neonLogin.setPercentage(40 + random_pct); },650);
     
         
       }
    });
    }
  } //else 
    });

  {# cari NIK REG #}
$("#cari_nik_reg").click(function(event) {
      event.preventDefault();
      
               var searchKeyword = $(".NIK").val();
           if (searchKeyword.length >= 3) {
            var random_pct = 25 + Math.round(Math.random() * 30);
    show_loading_bar({
                pct: random_pct, // number from 0-100,
                delay: 1.3
             });
       // alert(searchKeyword);
       $.ajax({
         url: 'module/ajax/t_reg/oci.php',
         type: 'POST',
         data: {keywords: searchKeyword,golek:'reg_nik'},
       success: function(data) {
          var random_pct = 100;
              show_loading_bar({
                pct: random_pct, // number from 0-100,
               finish: function()
          {
           $('#hasilcari .modal-body').empty()
             $('#hasilcari .modal-body').html(data);
            $('#hasilcari').modal('show');
          }
        })
       }
     });
     } else {
      alert("Ketikan NIK register sebelum klik tombol mencari");
     }
    });
{# cari KK REG #}
$("#cari_kk_reg").click(function(event) {
      event.preventDefault();
               var searchKeyword = $(".KK").val();
           if (searchKeyword.length >= 3) {
            var random_pct = 25 + Math.round(Math.random() * 30);
    show_loading_bar({
                pct: random_pct, // number from 0-100,
                delay: 1.3
             });
       // alert(searchKeyword);
       $.ajax({
         url: 'module/ajax/t_reg/oci.php',
         type: 'POST',
         data: {keywords: searchKeyword,golek:'reg_kk'},
       success: function(data) {
         var random_pct = 100;
              show_loading_bar({
                pct: random_pct, // number from 0-100,
               finish: function()
          {
           $('#hasilcari .modal-body').empty()
             $('#hasilcari .modal-body').html(data);
            $('#hasilcari').modal('show');
          }
        });
       }
     });
     } else {
      alert("Ketikan KK register sebelum klik tombol mencari");
     }
    });
{# cari nama REG #}
$("#cari_nama_reg").click(function(event) {
      event.preventDefault();
               var searchKeyword = $(".NAMA_REG").val();
           if (searchKeyword.length >= 3) {
            var random_pct = 25 + Math.round(Math.random() * 30);
    show_loading_bar({
                pct: random_pct, // number from 0-100,
                delay: 1.3
             });
       // alert(searchKeyword);
       $.ajax({
         url: 'module/ajax/t_reg/oci.php',
         type: 'POST',
         data: {keywords: searchKeyword,golek:'reg_nama'},
       success: function(data) {
        var random_pct = 100;
              show_loading_bar({
                pct: random_pct, // number from 0-100,
               finish: function()
          {
           $('#hasilcari .modal-body').empty()
             $('#hasilcari .modal-body').html(data);
            $('#hasilcari').modal('show');
}
});
       }
     });
     } else {
      alert("Ketikan nama register sebelum klik tombol mencari");
     }
    });
   
function showAjaxModal($url,$d)
    {
      jQuery('#modal-7').modal('show', {keyboard:'false'});
      
      jQuery.ajax({
        url: "module/ajax/t_reg/"+$url+".php?id="+$d,
        success: function(response)
        {
          jQuery('#modal-7 .modal-body').html(response);
        }
      });
    }   
    $('#t_reg tbody').on('click', '#kasir,#status,#aksi', function(event) {
      var idn = (jQuery(this).attr("id"));
        var o = $(this).attr('href');;
        //console.log(data);
        event.preventDefault();
        if (idn=='aksi') {
          $('#dialog').css('width', '');
          $('#body').css('min-height', '');
          $('#body').removeClass('scrollable');

        showAjaxModal('proses',o); 
        }
         else if(idn=='status') {
           $('#body').css('min-height', '350px');
          $('#body').addClass('scrollable');
          $('#dialog').css('width', '96%');

        showAjaxModal('detail_treg',o);
         }
         else if(idn=='kasir') {
           $('#dialog').css('width', '');
            $('#body').css('min-height', '');
          $('#body').removeClass('scrollable');
        showAjaxModal('kasir',o);
         }
        // alert( 'You clicked on '+o+'\'s row' );
    });
    $(".dataTables_wrapper select").select2({
        minimumResultsForSearch: -1
    });
  {# chain tambah #}
  

    jQuery(".tambahkegiatan").remoteChained({
        parents: ".tambahgkegiatan",
        url: "/module/ajax/filter_treg.php?golek=tambahgkegiatan",
         bootstrap : {  
                        "" : "Pilih Kegiatan", },
       loading: "Pilih Kegiatan",
        clear: true
    });
     jQuery(".tambahskegiatan").remoteChained({
        parents: ".tambahkegiatan",
        url: "/module/ajax/filter_treg.php?golek=tambahskegiatan",
       loading: "Pilih Sub Kegiatan",
        bootstrap : {  
                        "" : "Pilih Sub Kegiatan", },
        clear: true
    });
      jQuery(".tambahkkegiatan").remoteChained({
        parents: ".tambahskegiatan",
        url: "/module/ajax/filter_treg.php?golek=tambahkkegiatan",
          bootstrap : {  
                        "" : "Pilih Kelompok Kegiatan", },
       loading: "Pilih Kelompok Kegiatan",
        clear: true
    });
       jQuery(".tambahretribusi").remoteChained({
        parents: ".tambahkkegiatan",
        url: "/module/ajax/filter_treg.php?golek=tambahretribusi",
         bootstrap : {  
                        "" : "Pilih Retribusi", },
        depends : ".tambahskegiatan",
        loading: "Pilih Retribusi",
        clear: true
    });
/*     jQuery(".tambahskegiatan").change(function() {
      kode=$(".tambahskegiatan").val();
         if ($(".tambashkegiatan").val() != '') {
         $.get( "/module/ajax/t_reg/kode_reg.php?kegiatan="+kode, function( data ) {
          $("#no_reg").val(data);

     });
       }
     });*/
  $( ".tambahretribusi" ).change(function() {
  
          cari=$(".tambahretribusi").val();
         if ($(".tambahretribusi").val() != '') {
         $.get( "/module/ajax/filter_treg.php?golek=harga&idretri="+cari, function( data ) {
var apakaj = jQuery.parseJSON(data);
//console.log(apakaj.retri);
  if (apakaj.retri==0) {
         //alert("ape");
         $("#no_sks").val("");
    
  } else {
         $("#no_sks").val(apakaj.kode);
 }

         $("#sanksi").val(apakaj.retri);
         var tulis = dalamangka(apakaj.retri)+" Rupiah";
         $("#dalamangka").text(tulis);
    
});
            }
});
/*function kode_sks() {
    $.get( "/module/ajax/filter_treg.php?golek=harga&idretri="+cari, function( data ) {
  }
}*/
 jQuery("#checkAll").change(function () {
    $(".docum").prop('checked', $(this).prop("checked"));
});
    jQuery('.tambahskegiatan').on('change', function(){
      var searchKeyword=$(".tambahskegiatan").val();
        $("#no_reg").empty();
      if (searchKeyword != '') {

     // alert(searchKeyword);
      $.ajax({
         url: 'module/ajax/filter_treg.php',
         type: 'GET',
         data: {keywords: searchKeyword,golek:'document'},
       success: function(data) {
        $("#document").empty();
       var lala = JSON.parse(data);
      // console.log(lala.kode);
      if (lala.hasOwnProperty('document')) {
       $.each(lala.document, function(index, element) {
        $('<div  class="checkbox" id="document'+index+'"><label> <input class="docum" name="document[]" value="'+element.id+'" type="checkbox">'+element.nama+'</label> </div>').appendTo('#document'); });
       //alert(lala['kode']);
     }
       $('input[name=no_reg]').val(lala.kode);
       $('input[name=TGL_SELESAI]').val(lala.lama);


        // $("#no_reg").val();
     }
     });
    } else {
       $("#document").empty();
    }
});
  {# query oci #}
$('#cari_oci').click(function(event) {
      var idn = (jQuery(this).attr("id"));
        var o = $(this).attr('href');;
        //console.log(data);
        event.preventDefault();
         jQuery('#modal-7').modal('show', {backdrop: 'static',keyboard:'false'});
      
      jQuery.ajax({
        url: "module/ajax/t_reg/oci.php",
        success: function(response)
        {
          jQuery('#modal-7 .modal-body').html(response);
        }
      });
       
       // alert( 'You clicked on '+idn );
    });

  {# chain tambah abis #}
   
    jQuery(".nkegiatan").remoteChained({
        parents: ".gkegiatan",
        url: "/module/ajax/filter_treg.php?golek=nkegiatan",
         bootstrap : {  
                        "" : "Pilih Nama Kegiatan", },
        loading: "Pilih Nama Kegiatan",
        clear: true
    });
   
    jQuery(".skegiatan").remoteChained({
        parents: " .nkegiatan",
        url: "/module/ajax/filter_treg.php?golek=skegiatan",
 bootstrap : {  
                        "" : "Pilih Sub Kegiatan", },
        
       loading: "Pilih Sub Kegiatan",
        clear: true
    });
/*     jQuery('.dropdown-menu li a.stat').click(function(){
  var selText = jQuery(this).text();
  jQuery(this).parents('.btn-group').find('.dropdown-toggle').html(selText+'<i class="entypo-plus"></i> <span class=caret></span>');
});
*/         $(".stat").click( function(e) { 
     e.preventDefault();
     var h = $(this).attr('href');

     if ( h == '') {
                treg.columns(3).search('').draw();
            } else {
                treg
                    .columns(3).search(h).draw();
            }
     
       });
    var seleca = $(".skegiatan").select2();
    var selecb = $(".nkegiatan").select2();
    var selecc = $(".gkegiatan").select2();
     seleca
        .on("change", function(e) {
            if (e.val == '') {
              treg.columns(2).search('').draw();
            } else {
                treg
                    .columns(2).search(e.val).draw();
            }
        });
      selecb
        .on("change", function(e) {
            if (e.val == '') {
                treg.columns(2).search('').draw();
                treg.columns(1).search('').draw();
            } else {
                treg
                    .columns(1).search(e.val).draw();
            }
        });
    selecc
        .on("change", function(e) {
            if (e.val == '') {
                treg.columns(2).search('').draw();
                treg.columns(1).search('').draw();
                treg.columns(0).search('').draw();
            } else {
                treg
                    .columns(0).search(e.val).draw();
            }
        });

   
});


     </script>
{% endblock %}
