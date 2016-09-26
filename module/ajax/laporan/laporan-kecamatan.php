<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "../../../inc/class/Session.php";
$session = new Session();
if ($session->wes_entek()) {
    header('location:/login.php');
} else {
/** Include PHPExcel */
    require_once dirname(__FILE__) . '/../../aksi/PHPExcel/PHPExcel.php';
    require_once __DIR__ . "/../../../inc/CRUD.class.php";
    require_once __DIR__ . "/../../../inc/tglindo.php";

    $k = new DB;
    $data = $k->query("SELECT s.ID_KGIAT_A, ID_KGIAT, NM_KGIAT, ID_KGIAT_A, NM_KGIAT_A, ID_KGIAT_B, NM_KEGIAT_B,
NM_KEGIAT_C,
ID_REG,
COUNT(ID_REG) N,
SUM(KEC1) AS KEC1,
SUM(KEC2) AS KEC2,
SUM(KEC3) AS KEC3,
SUM(KEC4) AS KEC4,
SUM(KEC5) AS KEC5,
SUM(KEC6) AS KEC6,
SUM(KEC7) AS KEC7,
SUM(L) AS L,
SUM(P) AS P
FROM
(
SELECT
  A.ID_KGIAT,
  B.NM_KGIAT,
  A.ID_KGIAT_A,
  C.NM_KGIAT_A,
  A.ID_KGIAT_B,
  D.NM_KEGIAT_B,
  A.ID_KGIAT_C,
  COALESCE(E.NM_KEGIAT_C,'-') AS NM_KEGIAT_C,
  A.ID_REG,
  CASE A.ID_KEC WHEN 1 THEN 1 ELSE 0 END AS KEC1,
  CASE A.ID_KEC WHEN 2 THEN 1 ELSE 0 END AS KEC2,
  CASE A.ID_KEC WHEN 3 THEN 1 ELSE 0 END AS KEC3,
  CASE A.ID_KEC WHEN 4 THEN 1 ELSE 0 END AS KEC4,
  CASE A.ID_KEC WHEN 5 THEN 1 ELSE 0 END AS KEC5,
  CASE A.ID_KEC WHEN 6 THEN 1 ELSE 0 END AS KEC6,
  CASE A.ID_KEC WHEN 7 THEN 1 ELSE 0 END AS KEC7,
  CASE WHEN A.JK_REG = 'L' THEN 1 ELSE 0 END AS L,
  CASE WHEN A.JK_REG = 'P' THEN 1 ELSE 0 END AS P
FROM
  T_REG A
  LEFT OUTER JOIN M_KEGIATAN B ON (A.ID_KGIAT = B.ID_KGIAT)
  LEFT OUTER JOIN M_KEGIATAN_A C ON (A.ID_KGIAT_A = C.ID_KGIAT_A)
  LEFT OUTER JOIN M_KEGIATAN_B D ON (A.ID_KGIAT_B = D.ID_KGIAT_B)
  LEFT OUTER JOIN M_KEGIATAN_C E ON (A.ID_KGIAT_C = E.ID_KGIAT_C)
WHERE A.ID_KGIAT_A IN (SELECT ID_KGIAT_A FROM `m_kegiatan_a`) s
) Q
GROUP BY
ID_KGIAT, NM_KGIAT, ID_KGIAT_A, NM_KGIAT_A, ID_KGIAT_B, NM_KEGIAT_B,
NM_KEGIAT_C
ORDER BY
  Q.NM_KGIAT,
  Q.NM_KGIAT_A,
  Q.NM_KEGIAT_B,
  Q.NM_KEGIAT_C");
    foreach ($data as $key) {
        $keg[] = $key['NM_KGIAT'];
        $keg_a[] = $key['NM_KGIAT_A'];
        $keg_b[] = $key['NM_KEGIAT_B'];
        $keg_c[] = $key['NM_KEGIAT_C'];

    }
    // print_r($data);
    $objPHPExcel = new PHPExcel();
// Set document properties
    $objPHPExcel->getProperties()->setCreator("cangak")
        ->setLastModifiedBy("cangak")
        ->setTitle("Office 2007 XLSX laporan Pendaftaran perkecamatan")
        ->setSubject("Office 2007 XLSX laporan Pendaftaran perkecamatan")
        ->setDescription("laporan Pendaftaran")
        ->setKeywords("laporan Pendaftaran")
        ->setCategory("laporan Pendaftaran perkecamatan");
    $sheet = 0;
    foreach (array_unique($keg_a) as $k) {
        if (strlen($k) > 30) {
            $k = substr($k, 0, 20) . '...';
        }
        $objPHPExcel->createSheet($sheet);
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->setTitle($k);
        //        $objPHPExcel->getActiveSheet()->freezePane('H5');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:N4');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:N10')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()
            ->setBold(true)
            ->setSize(14);
        $objPHPExcel->getActiveSheet()->getStyle("A1:N6")->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:N6')->getAlignment()->applyFromArray(
            array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $objPHPExcel->getActiveSheet()->getStyle('A1:N6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()
            ->setCellValue('A1', "Laporan Pencatatan Registrasi Kegiatan Per Kecamatan \nDinas Kependudukan dan Pencatatan Sipil Kota Pontianak\n Periode ")
            ->setCellValue('A6', "")
            ->setCellValue('B6', "")
            ->setCellValue('C6', "")
            ->setCellValue('D6', "Sub Kelompok ")
            ->setCellValue('E6', "1.SEL")
            ->setCellValue('F6', '2.TIM ')
            ->setCellValue('G6', "3.BAR ")
            ->setCellValue('H6', '4.UTA')
            ->setCellValue('I6', "5.KOT")
            ->setCellValue('J6', "6.TNG")
            ->setCellValue('K6', "7.KAB ")
            ->setCellValue('L6', "L")
            ->setCellValue('M6', "P")
            ->setCellValue('N6', "JML")
            ->setCellValue('A7', $keg[0])
            ->setCellValue('b8', $k);
        $loopkb = 9;
        foreach (array_unique($keg_b) as $ma) {

            $objPHPExcel->getActiveSheet()
                ->setCellValue('C' . $loopkb, $ma);
        }
        $sheet++;

    }
// Create new PHPExcel object

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    //$objPHPExcel->setActiveSheetIndex(0);

}