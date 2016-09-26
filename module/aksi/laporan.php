<?php
// session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "../../inc/encryption/function.php";
require_once "../../inc/class/Session.php";
require_once "../../inc/explode.php";
$session = new Session();
if ($session->wes_entek()) {
    header('location:/login.php');
} else {

    $session->renew();
    require_once __DIR__ . "/../../inc/CRUD.class.php";
    require_once __DIR__ . "/../../inc/tglindo.php";
    $k = new DB;
    $keg = $k->query("SELECT NM_KGIAT FROM m_kegiatan WHERE ID_KGIAT='$_POST[keg]'");
    $subkeg = $k->query("SELECT NM_KGIAT_A FROM m_kegiatan_a WHERE ID_KGIAT_A='$_POST[subkeg]'");
    $subkeg2 = $k->query("SELECT NM_KEGIAT_B FROM m_kegiatan_b WHERE ID_KGIAT_B='$_POST[subkeg2]'");
    if ($gact == "view") {
        ob_start();

        echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
  <title>tes</title>
  <style>

table, td, th {
    border: 1px solid #ddd;
    font-size:14px;

}
.bold {
  font-weight:bold;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th {
    padding: 10px;
}
.cc {
      background:#ccc;

}
div {
  width:100%
}
</style>
</head>
<body>';
        if ($_POST['jenis'] == 'daftar') {
            include "inclaporan/daftar.php";
            $nama = "daftar-register.pdf";
        } elseif ($_POST['jenis'] == 'kasir') {
            include "inclaporan/kasir.php";
            $nama = "laporan-kasir.pdf";
        } elseif ($_POST['jenis'] == 'rekap') {
            include "inclaporan/rekap.php";
            $nama = "rekap-perkecamatan.pdf";
        } elseif ($_POST['jenis'] == 'retri') {
            include "inclaporan/retribusi.php";
            $nama = "rekap-retribusi.pdf";
        }
        echo '
  </body>
  </html><!-- Akhir halaman HTML yang akan di konvert -->
   ';
    }
    $filename = $nama; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
    //==========================================================================================================
    //Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
    //==========================================================================================================
    $content = ob_get_clean();
    //      $content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
    $content = '<page>' . $content . '</page>';
    require_once 'html2pdf/html2pdf.class.php';
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'en', false, 'ISO-8859-15', array(20, 10, 20, 10));
        $html2pdf->setDefaultFont('Arial');
//            $html2pdf->setModeDebug();
        //            $html2pdf->writeHTML($content);
        $html2pdf->WriteHTML($content);

        $html2pdf->Output($filename);
    } catch (HTML2PDF_exception $e) {echo $e;}

}
