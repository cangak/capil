<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Asia/Pontianak');

if ($_POST['jenis'] == "daftar") {
    $include = "laporan-pendaftaran";
} else if ($_POST['jenis'] == "rekap") {
    $include = "laporan-kecamatan";

} else if ($_POST['jenis'] == "kasir") {
    $include = "laporan-kasir";

} else if ($_POST['jenis'] == "retri") {
    $include = "laporan-retribusi";
}

include $include . ".php";

require_once dirname(__FILE__) . '/../../aksi/PHPExcel/PHPExcel/IOFactory.php';
// Save Excel 2007 file
$callStartTime = microtime(true);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace(__FILE__,"/../../../laporan/".$include."-".date('H:i:s').".xlsx",__FILE__));
$objWriter->save('laporan/' . $include . '.xlsx');

$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
echo json_encode(array("status" => "done", "name" => $include));