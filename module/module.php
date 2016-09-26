 <?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!defined('pontimin')) {
    die('You have no access');
}
if ($session->wes_entek()) {
    header('location:/login.php');
} else {
    require_once "class/module.php";
    $session->renew();

    $module = new module();
    switch ($gact) {
    default:
        $lmodule = $module->all();
        $judul = "Module";
        $data = array(
            "posisi" => $gact,
            "judul" => $judul,
            "lmodule" => $lmodule,
        );

        break;
    case "tambah":
        $table = $db->query("SHOW TABLES FROM fo");

        $judul = "Tambah  Module";
        $data = array(
            "posisi" => $gact,
            "judul" => $judul,
            "ltable" => $table,
        );
    case "hapus":
        $hapus = $module->delete($gid);
        if ($hapus) {
            echo '<meta http-equiv="refresh" content="3;URL=\'/?' . urlc('module=module') . '\'" />';
        }

    }

}
