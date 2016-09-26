 <?php // session_start();
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
    require_once "../class/t_reg.php";
    $db = new DB();
    $session->renew();

    $t_reg = new t_reg();
    switch ($gact) {
    default:
    case "edit":
        $error = false;
        $output = implode(",", array_keys($_POST));
        $required = explode(',', $output);
        $le = "";
        foreach ($required as $field) {
            if (empty($_POST[$field]) || $_POST[$field] == "") {
                $le .= "kolom <b>" . $field . "</b> Harus diisi <br />";
                $error = true;
            }
        }
        if ($error === true) {
            echo $le;
            echo "silahkan kembali";
        } else {

            $t_reg->id = $_POST['id'];
            $t_reg->ID_REG = $_POST['no_reg'];
            $t_reg->KD_SKS = $_POST['no_sks'];
            $t_reg->TGL_REG = $_POST['tanggal_registrasi'];
            $t_reg->NM_LAPOR = $_POST['NM_LAPOR'];
            $t_reg->ALM_LAPOR = $_POST['ALM_LAPOR'];
            $t_reg->TELP_LAPOR = $_POST['TELP_LAPOR'];
            $t_reg->ID_KEC = $_POST['ID_KEC'];
            $t_reg->NIK = $_POST['NIK'];
            $t_reg->KK = $_POST['KK'];
            $t_reg->NM_REG = $_POST['nama'];
            $t_reg->ALM_REG = $_POST['ALM_REG'];
            $t_reg->JK_REG = $_POST['jk'];
            $t_reg->INFO_RUBAH = $_POST['INFO_RUBAH'];
            $t_reg->TGL_PERISTIWA = $_POST['TGL_PERISTIWA'];
            $t_reg->DATA_LAMA = $_POST['DATA_LAMA'];
            $t_reg->DATA_BARU = $_POST['DATA_BARU'];
            $t_reg->NO_AKTA = $_POST['NO_AKTA'];
            $t_reg->TGL_AKTA = $_POST['TGL_AKTA'];
            $t_reg->TGL_PRED_SELESAI = $_POST['TGL_SELESAI'];
            $t_reg->INFO = $_POST['Info'];
            $saved = $t_reg->Save();

            if ($saved) {
                echo '<div class="modal fade" id="modal-1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Memproses data</h4>
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
                echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=t_reg') . '\'" />';
            }
        }

        break;
    case "tambah":
        $t_reg->ID_REG = $_POST['no_reg'];
        $t_reg->TGL_REG = $_POST['tanggal_registrasi'];
        $t_reg->NM_LAPOR = $_POST['NM_LAPOR'];
        $t_reg->ALM_LAPOR = $_POST['ALM_LAPOR'];
        $t_reg->ID_KEC = $_POST['ID_KEC'];
        $t_reg->NM_REG = $_POST['nama'];
        $t_reg->ALM_REG = $_POST['ALM_REG'];
        $t_reg->JK_REG = $_POST['jk'];
        $t_reg->ID_KGIAT = $_POST['tambahgkegiatan'];
        $t_reg->ID_KGIAT_A = $_POST['tambahkegiatan'];
        $t_reg->ID_KGIAT_B = (isset($_POST['tambahskegiatan']) ? $_POST['tambahskegiatan'] : 0);
        $t_reg->ID_KGIAT_C = (isset($_POST['tambahkkegiatan']) ? $_POST['tambahkkegiatan'] : 0);
        $t_reg->ID_RETRI = (isset($_POST['tambahretribusi']) ? $_POST['tambahretribusi'] : 0);
        $t_reg->NO_AKTA = $_POST['NO_AKTA'];
        $t_reg->TGL_AKTA = $_POST['TGL_AKTA'];
        $t_reg->KD_SKS = $_POST['no_sks'];
        $t_reg->INFO_RUBAH = $_POST['INFO_RUBAH'];
        $t_reg->DATA_LAMA = $_POST['DATA_LAMA'];
        $t_reg->DATA_BARU = $_POST['DATA_BARU'];
        $t_reg->INFO = $_POST['Info'];
        $t_reg->N_RETRI = $_POST['sanksi'];
        $t_reg->NIK = $_POST['NIK'];
        $t_reg->KK = $_POST['KK'];
        $t_reg->TGL_PERISTIWA = $_POST['TGL_PERISTIWA'];
        $t_reg->TGL_PRED_SELESAI = $_POST['TGL_SELESAI'];
        $t_reg->TELP_LAPOR = $_POST['TELP_LAPOR'];
        $t_reg->IS_LUNAS = ($_POST['sanksi'] != 0) ? 0 : 1;
        $t_reg->ID_USER = $session->get('username');
        $t_reg->satker = $session->get('satker');
        $saved = $t_reg->Create();

        if ($saved) {
            $pecahkode = explode(".", $_POST['no_reg']);
            $apeke = (ltrim($pecahkode[0], "0")) + 1;
            $kodeke = $pecahkode[1] . "." . $pecahkode[2] . "." . $pecahkode[3];

//        echo "update t1_auto set NOMOR='$apeke' where KODE='$kodeke'";
            $auto = $db->query("update t1_auto set NOMOR='$apeke' where KODE='$kodeke'");
            if ($_POST['sanksi'] != "0") {
                $urek = $db->query("UPDATE t_reg dest, (SELECT * FROM m_retribusi dest where ID_RETRI=$_POST[tambahretribusi]) src
        SET dest.REK01=src.REK01,
        dest.REK02=src.REK02,
        dest.REK03=src.REK03,
        dest.REK04=src.REK04,
        dest.REK05=src.REK05,
        dest.REK06=src.REK06,
        dest.REK07=src.REK07,
        dest.REK08=src.REK08,
        dest.REK09=src.REK09,
        dest.REK10=src.REK10,
        dest.REK11=src.REK11
        where dest.ID_REG='" . $_POST['no_reg'] . "'");
            }
            if (!empty($_POST['document'])) {
                foreach ($_POST['document'] as $key => $value) {
                    $db->query("insert into t_reg_dok (ID_DOKU_B,ID_REG,ID_USER) value ('$value','$_POST[no_reg]','" . $session->get('username') . "')");
                }
            }
            echo '<div class="modal fade" id="modal-1">
        <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Memproses data</h4>
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
            echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=t_reg&act=print&id=' . $_POST['no_reg']) . '\'" />';

        }

        break;
    case "hapus":
        $errors = (isset($gid) and empty($gid)) ? true : false;
        if ($error) {
            echo "silahkan kembali";
        } else {
            $saved = $t_reg->delete($gid);
            $d_bayar = $db->query("delete from t_reg_byr where ID_REG='$gid'");
            $d_dok = $db->query("delete from t_reg_dok where ID_REG='$gid'");
            $d_stat = $db->query("delete from t_reg_stat where ID_REG='$gid'");
            if ($d_stat) {
                echo '<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Memproses data</h4>
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
                echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=t_reg') . '\'" />';
            }
        }
    }

}
