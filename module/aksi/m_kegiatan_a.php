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
	require_once "../class/m_kegiatan_a.php";
	$session->renew();

	$m_kegiatan_a = new m_kegiatan_a();
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
			$m_kegiatan_a->ID_KGIAT_A = $_POST['id'];
$m_kegiatan_a->ID_KGIAT = $_POST['form']['ID_KGIAT'];
$m_kegiatan_a->NM_KGIAT_A = $_POST['form']['NM_KGIAT_A'];
$m_kegiatan_a->KASI_NIP = $_POST['form']['KASI_NIP'];
$m_kegiatan_a->KASI_NAMA = $_POST['form']['KASI_NAMA'];
$m_kegiatan_a->KASI_PANGKAT = $_POST['form']['KASI_PANGKAT'];
$m_kegiatan_a->KASI_JABATAN = $_POST['form']['KASI_JABATAN'];
$saved = $m_kegiatan_a->Save();

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
				echo '<meta http-equiv="refresh" content="2;URL=\'/?' . urlc('module=m_kegiatan_a') . '\'" />';
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
			$m_kegiatan_a->ID_KGIAT_A = "";
$m_kegiatan_a->ID_KGIAT = $_POST['form']['ID_KGIAT'];
$m_kegiatan_a->NM_KGIAT_A = $_POST['form']['NM_KGIAT_A'];
$m_kegiatan_a->KASI_NIP = $_POST['form']['KASI_NIP'];
$m_kegiatan_a->KASI_NAMA = $_POST['form']['KASI_NAMA'];
$m_kegiatan_a->KASI_PANGKAT = $_POST['form']['KASI_PANGKAT'];
$m_kegiatan_a->KASI_JABATAN = $_POST['form']['KASI_JABATAN'];
$saved = $m_kegiatan_a->Create();

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
				echo '<meta http-equiv="refresh" content="2;URL=\'/?' . urlc('module=m_kegiatan_a') . '\'" />';
			}
		}

		break;
		case "hapus":
		$errors = (isset($gid) and empty($gid)) ? true : false;
		if ($error) {
			echo "silahkan kembali";
		} else {
			$saved = $m_kegiatan_a->delete($gid);
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
				echo '<meta http-equiv="refresh" content="2;URL=\'/?' . urlc('module=m_kegiatan_a') . '\'" />';
			}
		}
	}

}
