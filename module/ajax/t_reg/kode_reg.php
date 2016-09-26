<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();

    header('location:/login.php');
} else {
    include __DIR__ . "/../../../inc/Db.class.php";
    $db = new DB();
    if (isset($_GET['kegiatan']) and $_GET['kegiatan'] != '') {
        $kode_a = $db->query("SELECT IFNULL(KODE_REG,'REG') AS KODE_REG FROM m_kegiatan_b  WHERE ID_KGIAT_B=" . $_GET['kegiatan']);
        // print_r($kode_reg);
        foreach ($kode_a as $value) {
            $kode = $value['KODE_REG'];
        }
        $m = date('m');
        $y = date('y');
        $k = $kode . "." . $m . "." . $y;
        // $k = "REG.03.15";
        $kode_b = $db->query("SELECT NOMOR FROM t1_auto WHERE KODE LIKE '%" . $k . "'");
        if (empty($kode_b)) {
            $kode_s = str_pad('1', 4, "000", STR_PAD_LEFT) . "." . $k;
        } else {
            foreach ($kode_b as $value) {
                $kode_s = str_pad($value + 1, 4, "000", STR_PAD_LEFT) . "." . $k;
            }
        }
        echo $kode_s;
    }}
?>