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
    require_once "../class/m_user.php";
    $session->renew();

    $db = new DB();
    $m_user = new m_user;
    switch ($gact) {
    default:
    case "edit":
        if ($session->getlevel() == 1) {

            if (empty($_POST['password'])) {
                $m_user->id = $_POST['id'];
                $m_user->username = $_POST['username'];
                $m_user->level = $_POST['form']['level'];
                $m_user->m_user_id = $_POST['form']['pegawai'];
                $m_user->satker = $_POST['form']['satker'];

            } else if (!empty($_POST['password'])) {
                $m_user->id = $_POST['id'];

                $m_user->username = $_POST['username'];
                $m_user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $m_user->level = $_POST['form']['level'];
                $m_user->m_user_id = $_POST['form']['pegawai'];
                $m_user->satker = $_POST['form']['satker'];
            }
        } else {
            if (empty($_POST['passwordno'])) {
                $m_user->id = $_POST['id'];
                $m_user->level = $_POST['hlevel'];
            } else if (!empty($_POST['passwordno'])) {
                $m_user->id = $_POST['id'];
                $m_user->level = $_POST['hlevel'];
                $m_user->password_hash = password_hash($_POST['passwordno'], PASSWORD_DEFAULT);

            }

        }
        $saved = $m_user->Save();
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
            echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=m_user') . '\'" />';
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
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            $m_user->username = $_POST['form']['NM_USER'];
            $m_user->password_hash = password_hash($_POST['form']['PASS'], PASSWORD_DEFAULT);
            $m_user->level = $_POST['form']['level'];
            $m_user->m_user_id = $_POST['form']['pegawai'];
            $saved = $m_user->Create();

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
                echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=m_user') . '\'" />';

            }

        }
        break;
    case "hapus":
        $errors = (isset($gid) and empty($gid)) ? true : false;
        if ($error) {
            echo "silahkan kembali";
        } else {
            $saved = $m_user->delete($gid);
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
                echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=m_user') . '\'" />';
            }
        }
    }

}
