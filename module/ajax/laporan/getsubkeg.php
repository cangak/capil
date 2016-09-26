<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();
    header('location:/login.php');
} else {
//  $db=new DB();
include __DIR__ . "/../../../inc/Db.class.php";
$db = new DB();
$keg = $_GET['keg'];
$subkeg = $db->query("select ID_KGIAT_A as id, NM_KGIAT_A as nama from m_kegiatan_a where ID_KGIAT='$keg'");
echo "<option>Pilih Nama Kegiatan</option>";
  foreach ($subkeg as $k) {
    echo "<option value=\"".$k['id']."\">".$k['nama']."</option>\n";
}

}
?>
