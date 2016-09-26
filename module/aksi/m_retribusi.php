 <?php
// session_start();
echo '	<link rel="stylesheet" href="/tema/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/tema/assets/css/neon-core.css">
	<link rel="stylesheet" href="/tema/assets/css/neon-theme.css">
	<link rel="stylesheet" href="/tema/assets/css/neon-forms.css">
	<link rel="stylesheet" href="/tema/assets/css/custom.css">
	<link rel="stylesheet" href="/tema/assets/css/skins/facebook.css">
<script src="/tema/assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>
<script src="/tema/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="/tema/assets/js/bootstrap.js"></script>
	<script src="/tema/assets/js/joinable.js"></script>
	<script src="/tema/assets/js/resizeable.js"></script>
	<script src="/tema/assets/js/neon-api.js"></script>
<script type="text/javascript">
    jQuery(window).load(function(){
    jQuery(\'#modal-1\').modal(\'show\');
    });
</script>

    ';
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "../../inc/encryption/function.php";
require_once "../../inc/class/Session.php";
require_once "../../inc/explode.php";
$session = new Session();
if ($session->wes_entek()) {
	header('location:/login.php');
} else {
	require_once "../class/m_retribusi.php";
	$session->renew();

	$m_retribusi = new m_retribusi();
	switch ($gact) {
	default:
	case "edit":
		$error = false;
		$output = implode(",", array_keys($_POST['form']));
		$required = explode(',', $output);
		$le = "";
		foreach ($required as $field) {
			if (empty($_POST['form'][$field]) || $_POST['form'][$field] == "") {
				$le .= "kolom <b>" . $field . "</b> Harus diisi <br />";
				$error = true;
			}
		}
		if ($error === true) {
			echo $le;
			echo "silahkan kembali";
		} else {
			$m_retribusi->ID_RETRI = $_POST['id'];
$m_retribusi->ID_KGIAT_B = $_POST['form']['ID_KGIAT_B'];
$m_retribusi->NM_RETRI = $_POST['form']['NM_RETRI'];
$m_retribusi->DEF_RETRI = $_POST['form']['DEF_RETRI'];
$m_retribusi->REK01 = $_POST['form']['REK01'];
$m_retribusi->REK02 = $_POST['form']['REK02'];
$m_retribusi->REK03 = $_POST['form']['REK03'];
$m_retribusi->REK04 = $_POST['form']['REK04'];
$m_retribusi->REK05 = $_POST['form']['REK05'];
$m_retribusi->REK06 = $_POST['form']['REK06'];
$m_retribusi->REK07 = $_POST['form']['REK07'];
$m_retribusi->REK08 = $_POST['form']['REK08'];
$m_retribusi->REK09 = $_POST['form']['REK09'];
$m_retribusi->REK10 = $_POST['form']['REK10'];
$m_retribusi->REK11 = $_POST['form']['REK11'];
$m_retribusi->INFO_BAYAR = $_POST['form']['INFO_BAYAR'];
$saved = $m_retribusi->Save();

			/*$jurusan->nama = $_POST['form']['nama'];
			$jurusan->id = $_POST['id'];
			$saved = $jurusan->Save();*/

			if ($saved) {
				echo '<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Mengupdate data</h4>
				</div>

				<div class="modal-body">
					<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
										<span class="sr-only">100% Complete</span>
									</div>
								</div>
				</div>

			</div>
		</div>
	</div>';
				echo '<meta http-equiv="refresh" content="2;URL=\'/?' . urlc('module=m_retribusi') . '\'" />';
			}
		}

		break;
	case "tambah":
		$error = false;
		$output = implode(",", array_keys($_POST['form']));
		$required = explode(',', $output);
		$le = "";
		foreach ($required as $field) {
			if (empty($_POST['form'][$field]) || $_POST['form'][$field] == "") {
				$le .= "kolom <b>" . $field . "</b> Harus diisi <br />";
				$error = true;
			}
		}
		if ($error === true) {
			echo $le;
			echo "silahkan kembali";
		} else {
			$m_retribusi->ID_RETRI = "";
$m_retribusi->ID_KGIAT_B = $_POST['form']['ID_KGIAT_B'];
$m_retribusi->NM_RETRI = $_POST['form']['NM_RETRI'];
$m_retribusi->DEF_RETRI = $_POST['form']['DEF_RETRI'];
$m_retribusi->REK01 = $_POST['form']['REK01'];
$m_retribusi->REK02 = $_POST['form']['REK02'];
$m_retribusi->REK03 = $_POST['form']['REK03'];
$m_retribusi->REK04 = $_POST['form']['REK04'];
$m_retribusi->REK05 = $_POST['form']['REK05'];
$m_retribusi->REK06 = $_POST['form']['REK06'];
$m_retribusi->REK07 = $_POST['form']['REK07'];
$m_retribusi->REK08 = $_POST['form']['REK08'];
$m_retribusi->REK09 = $_POST['form']['REK09'];
$m_retribusi->REK10 = $_POST['form']['REK10'];
$m_retribusi->REK11 = $_POST['form']['REK11'];
$m_retribusi->INFO_BAYAR = $_POST['form']['INFO_BAYAR'];
$saved = $m_retribusi->Create();

			/*$jurusan->nama = $_POST['form']['nama'];
			$saved = $jurusan->Create();*/
			if ($saved) {
				echo '<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Menambah data</h4>
				</div>

				<div class="modal-body">
					<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
										<span class="sr-only">100% Complete</span>
									</div>
								</div>
				</div>

			</div>
		</div>
	</div>';
				echo '<meta http-equiv="refresh" content="2;URL=\'/?' . urlc('module=m_retribusi') . '\'" />';
			}
		}

		break;
		case "hapus":
		$errors = (isset($gid) and empty($gid)) ? true : false;
		if ($error) {
			echo "silahkan kembali";
		} else {
			$saved = $m_retribusi->delete($gid);
			if ($saved) {
				echo '<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Menghapus data</h4>
				</div>

				<div class="modal-body">
					<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
										<span class="sr-only">100% Complete</span>
									</div>
								</div>
				</div>

			</div>
		</div>
	</div>';
				echo '<meta http-equiv="refresh" content="2;URL=\'/?' . urlc('module=m_retribusi') . '\'" />';
			}
		}
	}

}
