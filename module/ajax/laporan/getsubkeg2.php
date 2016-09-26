<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();
    header('location:/login.php');
} else {
  include __DIR__ . "/../../../inc/Db.class.php";
  $db = new DB();
$subkeg = $_GET['subkeg'];
$subkeg2 = $db->query("select ID_KGIAT_B as id, NM_KEGIAT_B as nama from m_kegiatan_b where ID_KGIAT_A='$subkeg'");
echo "<option>Pilih Sub Kegiatan</option>";
foreach ($subkeg2 as $k) {
  echo "<option value=\"".$k['id']."\">".$k['nama']."</option>\n";
}

}
?>
