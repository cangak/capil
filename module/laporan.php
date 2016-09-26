<?php
if (!defined('pontimin')) {
   header('location:/');
   exit;
}
if ($session->wes_entek()) {
   header('location:/login.php');
} else {
  $session->renew();
    require_once "class/t_reg.php";
      $t_reg = new t_reg();
  switch ($gact) {
  default:
      $l_gkegiatan = $db->query("select ID_KGIAT as id, NM_KGIAT as nama from m_kegiatan where IS_AKTIF='1'");
      $judul = "Register";
      $data = array(
        "posisi" => $gact,
          "judul" => $judul,
          "keg" => $l_gkegiatan
      );

      break;



         }
}
