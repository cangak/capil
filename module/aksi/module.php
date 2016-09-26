<?php
function buat_file($dir, $contents) {
    $parts = explode('/', $dir);
    $file = array_pop($parts);
    $dir = '';
    foreach ($parts as $part) {
        if (!is_dir($dir .= "/$part")) {
            mkdir($dir, 0777, TRUE);
        }
    }

    file_put_contents("$dir/$file", $contents);
}
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
    require_once "../class/module.php";
    $session->renew();
    $module = new module();
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
            $module->nama = $_POST['form']['nama'];
            $module->id = $_POST['id'];
            $saved = $module->Save();

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
                echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=jurusan') . '\'" />';
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
            $cari = array("name" => $_POST['form']['nama_module']);
            $sudahkahada = $module->search($cari);
            if ($sudahkahada) {
                echo "module sudah ada";
                echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=module') . '\'" />';
                exit();
            }

            $kelas = $_POST['form']['nama_module'];
            $namatable = $_POST['form']['nama_table'];
            $get_kolom = $module->kolom($namatable);
            foreach ($get_kolom as $ks) {
                $r[] = $ks['COLUMN_NAME'];
            }
            $primari = $_POST['form']['primary_key'];
            $dirclass = __DIR__ . "/../class/" . $_POST['form']['nama_module'] . ".php";
            $dirmodule = __DIR__ . "/../" . $_POST['form']['nama_module'] . ".php";
            $diraksi = __DIR__ . "/../aksi/" . $_POST['form']['nama_module'] . ".php";
            $temam = __DIR__ . "/../../tema/module/" . $_POST['form']['nama_module'] . "/" . $_POST['form']['nama_module'] . ".tpl";
            $temat = __DIR__ . "/../../tema/module/" . $_POST['form']['nama_module'] . "/tambah.tpl";
            $temae = __DIR__ . "/../../tema/module/" . $_POST['form']['nama_module'] . "/edit.tpl";
            /*menggenerate class */
            $template_class = file_get_contents(__DIR__ . "/../dummy/class.php");
            $template_class = str_replace("#class#", $kelas, $template_class);
            $template_class = str_replace("#table#", $namatable, $template_class);
            $template_class = str_replace("#key#", $primari, $template_class);
            //buat_file($dirclass, $template_class);
            $buat_class = file_put_contents($dirclass, $template_class);
            /*generate class abis*/
            /*generate aksi*/
            $template_aksi = file_get_contents(__DIR__ . "/../dummy/aksi.php");
            $template_aksi = str_replace("#class#", $kelas, $template_aksi);
            $aksi_database_edit = "";
            foreach ($r as $k) {
                if ($k != $_POST['form']['primary_key']) {
                    $aksi_database_edit .= '$' . $kelas . '->' . $k . ' = $_POST[\'form\'][\'' . $k . '\'];' . PHP_EOL;
                } elseif ($k == $_POST['form']['primary_key']) {
                    $aksi_database_edit .= '$' . $kelas . '->' . $_POST['form']['primary_key'] . ' = $_POST[\'id\'];' . PHP_EOL;
                }
            }
            $aksi_database_edit .= '$saved = $' . $kelas . '->Save();' . PHP_EOL;

            $template_aksi = str_replace("#aksi_database_edit#", $aksi_database_edit, $template_aksi);
            $aksi_database_tambah = "";
            foreach ($r as $kt) {
                if ($kt != $_POST['form']['primary_key']) {
                    $aksi_database_tambah .= '$' . $kelas . '->' . $kt . ' = $_POST[\'form\'][\'' . $kt . '\'];' . PHP_EOL;
                } else if ($kt == $_POST['form']['primary_key']) {
                    $aksi_database_tambah .= '$' . $kelas . '->' . $_POST['form']['primary_key'] . ' = "";' . PHP_EOL;
                }
            }
            $aksi_database_tambah .= '$saved = $' . $kelas . '->Create();' . PHP_EOL;

            $template_aksi = str_replace("#aksi_database_tambah#", $aksi_database_tambah, $template_aksi);
            //buat_file($diraksi, $template_aksi);
            $buat_aksi = file_put_contents($diraksi, $template_aksi);
            /*generate aksi abis*/
            /*generate modul*/
            $template_modul = file_get_contents(__DIR__ . "/../dummy/module.php");
            $template_modul = str_replace("#primari#", '"' . $primari . '"', $template_modul);
            $template_modul = str_replace("#class#", $kelas, $template_modul);
            //buat_file($dirmodule, $template_modul);
            $buat_modul = file_put_contents($dirmodule, $template_modul);
            /*generate modul abis*/

            /*generate tema*/
            $tema_modul = file_get_contents(__DIR__ . "/../../tema/module/dummy/module.tpl");
            $tema_modul = str_replace("#class#", $kelas, $tema_modul);
            $tema_modul = str_replace("#nama#", ucwords($_POST['form']['judul_module']), $tema_modul);
            $th = '';
            $td = '';
            $th .= '<th>no</th>';
            $td .= '<td>{{loop.index}}</td>' . PHP_EOL;
            foreach ($r as $k) {
                if ($k != $_POST['form']['primary_key']) {
                    $th .= '<th>' . $k . '</th>' . PHP_EOL;
                    $td .= '<td>{{ k.' . $k . ' }}</td>' . PHP_EOL;
                }
            }
            $th .= '<th>aksi</th>' . PHP_EOL;
            $td .= '<td><a href="?{{encu(\'module=' . $kelas . '&act=edit&id=\'~k.' . $_POST['form']['primary_key'] . ')}}" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a></td>' . PHP_EOL;

            $tema_modul = str_replace("#th#", $th, $tema_modul);
            $tema_modul = str_replace("#td#", $td, $tema_modul);
            //buat_file($temam, $tema_modul);
            $buat_tema_modul = file_put_contents($temam, $tema_modul);
            $tema_tambah = file_get_contents(__DIR__ . "/../../tema/module/dummy/tambah.tpl");
            //$tema_tambah =htmlentities($tema_tambah);
            $tema_tambah = str_replace("#class#", $kelas, $tema_tambah);
            $form_tambah = '';
            $form_tambah .= '{% import "macro/form.tpl" as forms %}' . PHP_EOL;
            foreach ($r as $k) {
                if ($k != $_POST['form']['primary_key']) {
                    $form_tambah .= '{{ forms.input("' . $k . '","form[' . $k . ']", null, "text","' . $k . '", "harus diisi","required","' . $k . '") }}' . PHP_EOL;
                }
            }
            $tema_tambah = str_replace("#form_tambah#", $form_tambah, $tema_tambah);
            // buat_file($temat, $tema_tambah);
            $buat_tema_tambah = file_put_contents($temat, $tema_tambah);
            $tema_edit = file_get_contents(__DIR__ . "/../../tema/module/dummy/edit.tpl");
            $tema_edit = str_replace("#class#", $kelas, $tema_edit);
            $form_edit = '{% import "macro/form.tpl" as forms %}' . PHP_EOL;
            $form_edit .= '{% for ek in edit %}' . PHP_EOL;
            foreach ($r as $k) {
                if ($k == $_POST['form']['primary_key']) {
                    $form_edit .= '{{ forms.hidden("id",ek.' . $k . ')}}' . PHP_EOL;
                } elseif ($k != $_POST['form']['primary_key']) {
                    $form_edit .= '{{ forms.input("' . $k . '","form[' . $k . ']", ek.' . $k . ', "text","' . $k . '", "harus diisi","required","' . $k . '") }}' . PHP_EOL;
                }
            }
            $tema_edit = str_replace("#form_edit#", $form_edit, $tema_edit);
            //echo $tema_edit;
            // buat_file($temae, $tema_edit);
            $buat_tema_edit = file_put_contents($temat, $tema_edit);
            //echo "berhasl";
            /*generate tema abis*/

            /*    if ($buat_modul and $buat_aksi and $buat_class) {*/
            $m = $module->max('orderby');
            $module->title = $_POST['form']['judul_module'];
            $module->name = $_POST['form']['nama_module'];
            $module->link_include = $_POST['form']['link_module'];
            $module->publish = "Yes";
            $module->orderby = $m;
            $saved = $module->Create();
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
                echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=module') . '\'" />';

            }
        }

        break;

        //}

    }}
?>
