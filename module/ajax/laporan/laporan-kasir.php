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
    function triwulan($monthNumber) {
        return floor(($monthNumber - 1) / 3) + 1;
    }
    function semester($monthNumber) {
        return floor(($monthNumber - 1) / 6) + 1;
    }
    $tgl = date('m');
    $thn = date('Y');
    if ($_POST['jangka'] == "1") {
        $judul = "Laporan kasir Bulan " . getBulan(date('m'));
        $periode = "Bulan " . getBulan(date('m')) . " " . date('Y');
        $data = $k->query("SELECT a.`ID_REG`, d.`NM_KGIAT`, e.`NM_KGIAT_A`, f.`NM_KEGIAT_B`, g.`NM_KEGIAT_C`, c.`NM_RETRI`, B.`TGL`, b.`INFO`,
                          b.`N_BAYAR`,
                          b.`ID_USER`
                        FROM
                          t_reg a
                          INNER JOIN t_reg_byr b
                            ON (a.`ID_REG` = b.`ID_REG`)
                          INNER  JOIN m_retribusi c ON (c.`ID_RETRI`=a.`ID_RETRI`)
                        LEFT JOIN m_kegiatan d ON (d.`ID_KGIAT`=a.`ID_KGIAT`)
                        LEFT JOIN m_kegiatan_a  e ON (e.`ID_KGIAT_A`=a.`ID_KGIAT_A`)
                        LEFT JOIN m_kegiatan_b  f ON (f.`ID_KGIAT_B`=a.`ID_KGIAT_B`)
                        LEFT JOIN m_kegiatan_c g ON (g.`ID_KGIAT_C`=a.`ID_KGIAT_C`)
                         where MONTH(b.`TGL`) = '$tgl' and YEAR(b.`TGL`)='$thn'
                        ORDER BY  b.`TGL`");
    } elseif ($_POST['jangka'] == 3) {
        $t = triwulan($tgl);
        if ($t == 1) {
            $b = "01 and 03";
            $periode = "Bulan januari - Maret " . date('Y');
        } elseif ($t == 2) {
            $b = "04 and 06";
            $periode = "Bulan April - Juni " . date('Y');
        } elseif ($t == 3) {
            $b = "07 and 09";
            $periode = "Bulan Juli - September " . date('Y');
        } elseif ($t == 4) {
            $b = "10 and 12";
            $periode = "Bulan Oktober - Desember " . date('Y');
        }
        $judul = "Laporan kasir Triwulan ke-" . $t;
        $data = $k->query("SELECT a.`ID_REG`, d.`NM_KGIAT`, e.`NM_KGIAT_A`, f.`NM_KEGIAT_B`, g.`NM_KEGIAT_C`, c.`NM_RETRI`,
                      B.`TGL`,
                      b.`INFO`,
                      b.`N_BAYAR`,
                      b.`ID_USER`
                    FROM
                      t_reg a
                      INNER JOIN t_reg_byr b
                        ON (a.`ID_REG` = b.`ID_REG`)
                      INNER  JOIN m_retribusi c ON (c.`ID_RETRI`=a.`ID_RETRI`)
                    LEFT JOIN m_kegiatan d ON (d.`ID_KGIAT`=a.`ID_KGIAT`)
                    LEFT JOIN m_kegiatan_a  e ON (e.`ID_KGIAT_A`=a.`ID_KGIAT_A`)
                    LEFT JOIN m_kegiatan_b  f ON (f.`ID_KGIAT_B`=a.`ID_KGIAT_B`)
                    LEFT JOIN m_kegiatan_c g ON (g.`ID_KGIAT_C`=a.`ID_KGIAT_C`)
                    WHERE MONTH(b.`TGL`) between $b and YEAR(b.`TGL`)='$thn' ORDER BY  b.`TGL`");
    } elseif ($_POST['jangka'] == 6) {
        $s = semester($tgl);
        if ($s == 1) {
            $periode = "Bulan januari - Juni " . date('Y');

            $b = "01 and 06";
        } elseif ($s == 2) {
            $periode = "Bulan Juli  - Desember " . date('Y');
            $b = "07 and 12";
        }
        $judul = "Laporan kasir  Semester ke-" . $s;
        $data = $k->query("SELECT a.`ID_REG`, d.`NM_KGIAT`, e.`NM_KGIAT_A`, f.`NM_KEGIAT_B`, g.`NM_KEGIAT_C`, c.`NM_RETRI`,
                      B.`TGL`,
                      b.`INFO`,
                      b.`N_BAYAR`,
                      b.`ID_USER`
                    FROM
                      t_reg a
                      INNER JOIN t_reg_byr b
                        ON (a.`ID_REG` = b.`ID_REG`)
                      INNER  JOIN m_retribusi c ON (c.`ID_RETRI`=a.`ID_RETRI`)
                    LEFT JOIN m_kegiatan d ON (d.`ID_KGIAT`=a.`ID_KGIAT`)
                    LEFT JOIN m_kegiatan_a  e ON (e.`ID_KGIAT_A`=a.`ID_KGIAT_A`)
                    LEFT JOIN m_kegiatan_b  f ON (f.`ID_KGIAT_B`=a.`ID_KGIAT_B`)
                    LEFT JOIN m_kegiatan_c g ON (g.`ID_KGIAT_C`=a.`ID_KGIAT_C`)
                    WHERE MONTH(b.`TGL`) between $b and YEAR(b.`TGL`)='$thn'  ORDER BY  b.`TGL`");
    } elseif ($_POST['jangka'] == 12) {
        $judul = "Laporan kasir Tahunan";
        $periode = date('Y');
        $data = $k->query("SELECT a.`ID_REG`, d.`NM_KGIAT`, e.`NM_KGIAT_A`, f.`NM_KEGIAT_B`, g.`NM_KEGIAT_C`, c.`NM_RETRI`,
                      B.`TGL`,
                      b.`INFO`,
                      b.`N_BAYAR`,
                      b.`ID_USER`
                    FROM
                      t_reg a
                      INNER JOIN t_reg_byr b
                        ON (a.`ID_REG` = b.`ID_REG`)
                      INNER  JOIN m_retribusi c ON (c.`ID_RETRI`=a.`ID_RETRI`)
                    LEFT JOIN m_kegiatan d ON (d.`ID_KGIAT`=a.`ID_KGIAT`)
                    LEFT JOIN m_kegiatan_a  e ON (e.`ID_KGIAT_A`=a.`ID_KGIAT_A`)
                    LEFT JOIN m_kegiatan_b  f ON (f.`ID_KGIAT_B`=a.`ID_KGIAT_B`)
                    LEFT JOIN m_kegiatan_c g ON (g.`ID_KGIAT_C`=a.`ID_KGIAT_C`)
                    WHERE  YEAR( b.`TGL`)='$thn'  ORDER BY  b.`TGL`");
    }
// Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

// Set document properties
    $objPHPExcel->getProperties()->setCreator("cangak")
        ->setLastModifiedBy("cangak")
        ->setTitle("Office 2007 XLSX laporan Pendaftaran")
        ->setSubject("Office 2007 XLSX laporan Pendaftaran")
        ->setDescription("laporan Pendaftaran")
        ->setKeywords("laporan Pendaftaran")
        ->setCategory("laporan Pendaftaran");

    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->freezePane('h5');

    $objPHPExcel->setActiveSheetIndex(0)->setTitle($judul);
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:g3');
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A1')->getAlignment()->setWrapText(true);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A4:g10')->getAlignment()->setWrapText(true);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle("A1")->getFont()
        ->setBold(true)
        ->setSize(14);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle("A1:g4")->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:g4')->getAlignment()->applyFromArray(
        array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:g4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', "Pendapatan Kasir \nDinas Kependudukan dan Pencatatan Sipil Kota Pontianak \nPeriode : " . $periode)
        ->setCellValue('A4', 'No')
        ->setCellValue('B4', "No. Reg ")
        ->setCellValue('C4', "Group Kegiatan ")
        ->setCellValue('D4', 'Retribusi')
        ->setCellValue('E4', "Tanggal")
        ->setCellValue('F4', 'Info ')
        ->setCellValue('G4', "Total");
    foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
        $objPHPExcel->getActiveSheet()
            ->getColumnDimension($col)
            ->setAutoSize(true);
    }
    $loop = 5;
    $no = 1;
    $qty = 0;
    $jum = count($data);
    $row = $jum + 5;
    foreach ($data as $pr) {

        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('A' . $loop, $no);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('B' . $loop, $pr['ID_REG']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('C' . $loop, $pr['NM_KGIAT']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('D' . $loop, $pr['NM_RETRI']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('E' . $loop, putar_tanggal($pr['TGL']));
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('F' . $loop, $pr['INFO']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('G' . $loop, $pr['N_BAYAR']);
        $qty += $pr['N_BAYAR'];
        $loop++;
        $no++;
        # code...
    }

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $row . ':F' . $row);
    $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('A' . $row, "Total");
    $objPHPExcel->setActiveSheetIndex(0)->getStyle("A" . $row . ':G' . $row)->getFont()
        ->setBold(true);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A' . $row)->getAlignment()->applyFromArray(
        array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue("G$row", "=SUM(G5:G" . ($row - 1) . ")");
//$objPHPExcel->setActiveSheetIndex(0)->SetCellValue('G'.$row,"");

    $objPHPExcel->getActiveSheet()->setAutoFilter('A4:G4');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);
}
