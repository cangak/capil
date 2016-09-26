<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="tema/assets/images/favico.ico" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Siakad Poltesa" />
	<meta name="author" content="" />

            <title>{% block title %}{% endblock %}</title>


	<link rel="stylesheet" href="tema/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="tema/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="tema/assets/css/font-icons/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="tema/assets/css/css.css">
    <link rel="stylesheet" href="tema/assets/css/bootstrap.css">
	<link rel="stylesheet" href="tema/assets/css/neon-core.css">
	<link rel="stylesheet" href="tema/assets/css/neon-theme.css">
	<link rel="stylesheet" href="tema/assets/css/neon-forms.css">
	<link rel="stylesheet" href="tema/assets/css/custom.css">
    	<link rel="stylesheet" href="tema/assets/css/skins/facebook.css">
    	    	<link rel="stylesheet" href="tema/assets/js/select2/select2-bootstrap.css">

	<link rel="stylesheet" href="tema/assets/js/select2/select2.css">
<link rel="stylesheet" type="text/css" href="tema/assets/css/datatableresponsive.css"/>
{% block head %}

{% endblock %}
	<script src="tema/assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>
 <script src="tema/assets/js/dalamkata.js" type="text/javascript" charset="utf-8"></script>
	<!--[if lt IE 9]><script src="tema/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body  page-fade" data-url="">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">

			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="/">
					<img src="tema/assets/images/sinfo.png" width="120" alt="" />
				</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse" style="padding-top:5px;">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>


				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs" style="padding-top:5px;">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>







			<!-- main menu -->
					{% embed 'menu.tpl' %}
		    {% endembed %}





		</div></div>

<div class="modal fade" id="modal-1" style="display: none;"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> <h4 class="modal-title">Session Timeout</h4> </div> <div class="modal-body">
Sesi Login Anda Sudah Berakir!
</div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div> </div> </div> </div>
	<div class="main-content">

		<div class="row">

             {% block content %}{% endblock %}

		</div>



			<br class="clear">
		<!-- Footer -->
		<footer class="hidden-print main">

			<center>&copy; {{ "now"|date("Y") }} <strong>Disdukcapil, Kota Pontianak</strong></center>

		</footer>
	</div>

	<!-- Bottom scripts (common) -->

	<script src="tema/assets/js/gsap/main-gsap.js"></script>
	<script src="tema/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="tema/assets/js/bootstrap.js"></script>
	<script src="tema/assets/js/joinable.js"></script>
<script type="text/javascript" src="tema/assets/js/datatables.min.js"></script>
<script src="tema/assets/js/select2/select2.min.js"></script>
	<script src="tema/assets/js/resizeable.js"></script>
	<script src="tema/assets/js/bootstrap-datepicker.js"></script>

	{% block js %}
		 {% endblock %}
		 <script type="text/javascript">
		 $('a[data-confirm]').click(function(ev) {
			 var href = $(this).attr('href');
			 if (!$('#dataConfirmModal').length) {
				 $('body').append('<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="dataConfirmLabel"><i class="fa fa-times fa-lg fa-fw"></i> Hapus Data !</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button><a class="btn btn-danger" id="dataConfirmOK">Ya</a></div></div></div></div>');
			 }
			 $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
			 $('#dataConfirmOK').attr('href', href);
			 $('#dataConfirmModal').modal({show:true});
			 return false;
		 });

		jQuery('#tableku').DataTable( {
    responsive: true,
				"bStateSave": true,
 "aoColumnDefs": [
      { "bSortable": false, "aTargets": [ 0 ] }
    ]
     } );

(function CheckForSession() {
  $.ajax({
   url: "ajax/ceck_session.php",
    success: function(data) {
     if(data == "1") {
					jQuery('#modal-1').modal('show');
					}
    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(CheckForSession, 60000);
    }
  });
})();
jQuery("#modal-1").on('hidden.bs.modal', function (e) {

window.location = '/ajax/logout.php';

});
		</script>

         <script src="tema/assets/js/neon-api.js"></script>
         <script src="tema/assets/js/neon-custom.js"></script>

</body>
</html>
