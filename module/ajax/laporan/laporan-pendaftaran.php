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
        $judul = "Laporan Bulan " . getBulan(date('m'));
        $periode = "Bulan " . getBulan(date('m')) . " " . date('Y');
        $data = $k->query("SELECT A.ID_REG, A.TGL_REG, A.NM_LAPOR, A.NM_REG, A.ALM_REG,
                    A.ID_KEC,
                    A.ID_KGIAT,
                    A.ID_KGIAT_A,
                    A.ID_KGIAT_B,
                    A.ID_KGIAT_C,
                    A.ID_RETRI,
                    A.NIK,
                    A.KK,
                    A.TGL_PRED_SELESAI,
                    G.TGL,
                    G.NO_STAT,
                    G.ID_USER,
                    B.NM_KGIAT,
                    C.NM_KGIAT_A,
                    D.NM_KEGIAT_B,
                    F.NM_RETRI,
                    A.JK_REG,
                    E.NM_KEGIAT_C
                  FROM
                    T_REG A
                    LEFT OUTER JOIN T_REG_STAT G ON (A.C_ID_REG_STAT = G.ID_REG_STAT)
                    LEFT OUTER JOIN M_KEGIATAN B ON (A.ID_KGIAT = B.ID_KGIAT)
                    LEFT OUTER JOIN M_KEGIATAN_A C ON (A.ID_KGIAT_A = C.ID_KGIAT_A)
                    LEFT OUTER JOIN M_KEGIATAN_B D ON (A.ID_KGIAT_B = D.ID_KGIAT_B)
                    LEFT OUTER JOIN M_KEGIATAN_C E ON (A.ID_KGIAT_C = E.ID_KGIAT_C)
                    LEFT OUTER JOIN M_RETRIBUSI F ON (A.ID_RETRI = F.ID_RETRI)
                    where MONTH(A.`TGL_REG`) = '$tgl' and YEAR(a.`TGL_REG`)='$thn'
                  ORDER BY A.TGL_REG");
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
        $judul = "Laporan Triwulan ke-" . $t;
        $data = $k->query("SELECT A.ID_REG, A.TGL_REG, A.NM_LAPOR, A.NM_REG, A.ALM_REG,
                      A.ID_KEC,
                      A.ID_KGIAT,
                      A.ID_KGIAT_A,
                      A.ID_KGIAT_B,
                      A.ID_KGIAT_C,
                      A.ID_RETRI,
                      A.NIK,
                      A.KK,
                      A.TGL_PRED_SELESAI,
                      G.TGL,
                      G.NO_STAT,
                      G.ID_USER,
                      B.NM_KGIAT,
                      C.NM_KGIAT_A,
                      D.NM_KEGIAT_B,
                      F.NM_RETRI,
                      A.JK_REG,
                      E.NM_KEGIAT_C
                    FROM
                      T_REG A
                      LEFT OUTER JOIN T_REG_STAT G ON (A.C_ID_REG_STAT = G.ID_REG_STAT)
                      LEFT OUTER JOIN M_KEGIATAN B ON (A.ID_KGIAT = B.ID_KGIAT)
                      LEFT OUTER JOIN M_KEGIATAN_A C ON (A.ID_KGIAT_A = C.ID_KGIAT_A)
                      LEFT OUTER JOIN M_KEGIATAN_B D ON (A.ID_KGIAT_B = D.ID_KGIAT_B)
                      LEFT OUTER JOIN M_KEGIATAN_C E ON (A.ID_KGIAT_C = E.ID_KGIAT_C)
                      LEFT OUTER JOIN M_RETRIBUSI F ON (A.ID_RETRI = F.ID_RETRI)
                      WHERE MONTH(A.`TGL_REG`) between $b and YEAR(a.`TGL_REG`)='$thn'
                      ORDER BY A.TGL_REG");

    } elseif ($_POST['jangka'] == 6) {
        $s = semester($tgl);
        if ($s == 1) {
            $periode = "Bulan januari - Juni " . date('Y');

            $b = "01 and 06";
        } elseif ($s == 2) {
            $periode = "Bulan Juli  - Desember " . date('Y');
            $b = "07 and 12";
        }
        $judul = "Laporan Semester ke-" . $s;
        $data = $k->query("SELECT A.ID_REG, A.TGL_REG, A.NM_LAPOR, A.NM_REG, A.ALM_REG,
                      A.ID_KEC,
                      A.ID_KGIAT,
                      A.ID_KGIAT_A,
                      A.ID_KGIAT_B,
                      A.ID_KGIAT_C,
                      A.ID_RETRI,
                      A.NIK,
                      A.KK,
                      A.TGL_PRED_SELESAI,
                      G.TGL,
                      G.NO_STAT,
                      G.ID_USER,
                      B.NM_KGIAT,
                      C.NM_KGIAT_A,
                      D.NM_KEGIAT_B,
                      F.NM_RETRI,
                      A.JK_REG,
                      E.NM_KEGIAT_C
                    FROM
                      T_REG A
                      LEFT OUTER JOIN T_REG_STAT G ON (A.C_ID_REG_STAT = G.ID_REG_STAT)
                      LEFT OUTER JOIN M_KEGIATAN B ON (A.ID_KGIAT = B.ID_KGIAT)
                      LEFT OUTER JOIN M_KEGIATAN_A C ON (A.ID_KGIAT_A = C.ID_KGIAT_A)
                      LEFT OUTER JOIN M_KEGIATAN_B D ON (A.ID_KGIAT_B = D.ID_KGIAT_B)
                      LEFT OUTER JOIN M_KEGIATAN_C E ON (A.ID_KGIAT_C = E.ID_KGIAT_C)
                      LEFT OUTER JOIN M_RETRIBUSI F ON (A.ID_RETRI = F.ID_RETRI)
                      WHERE MONTH(A.`TGL_REG`) between $b and YEAR(a.`TGL_REG`)='$thn'
                      ORDER BY A.TGL_REG");
    } elseif ($_POST['jangka'] == 12) {
        $judul = "Laporan Tahunan";
        $periode = date('Y');
        $data = $k->query("SELECT A.ID_REG, A.TGL_REG, A.NM_LAPOR, A.NM_REG, A.ALM_REG,
                      A.ID_KEC,
                      A.ID_KGIAT,
                      A.ID_KGIAT_A,
                      A.ID_KGIAT_B,
                      A.ID_KGIAT_C,
                      A.ID_RETRI,
                      A.NIK,
                      A.KK,
                      A.TGL_PRED_SELESAI,
                      G.TGL,
                      G.NO_STAT,
                      G.ID_USER,
                      B.NM_KGIAT,
                      C.NM_KGIAT_A,
                      D.NM_KEGIAT_B,
                      F.NM_RETRI,
                      A.JK_REG,
                      E.NM_KEGIAT_C
                    FROM
                      T_REG A
                      LEFT OUTER JOIN T_REG_STAT G ON (A.C_ID_REG_STAT = G.ID_REG_STAT)
                      LEFT OUTER JOIN M_KEGIATAN B ON (A.ID_KGIAT = B.ID_KGIAT)
                      LEFT OUTER JOIN M_KEGIATAN_A C ON (A.ID_KGIAT_A = C.ID_KGIAT_A)
                      LEFT OUTER JOIN M_KEGIATAN_B D ON (A.ID_KGIAT_B = D.ID_KGIAT_B)
                      LEFT OUTER JOIN M_KEGIATAN_C E ON (A.ID_KGIAT_C = E.ID_KGIAT_C)
                      LEFT OUTER JOIN M_RETRIBUSI F ON (A.ID_RETRI = F.ID_RETRI)
                      WHERE  YEAR(a.`TGL_REG`)='$thn'
                      ORDER BY A.TGL_REG");
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
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:h3');
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A1')->getAlignment()->setWrapText(true);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A4:h10')->getAlignment()->setWrapText(true);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle("A1")->getFont()
        ->setBold(true)
        ->setSize(14);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle("A1:h4")->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:h4')->getAlignment()->applyFromArray(
        array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
    $objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:h4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', "LAPORAN PENDAFTARAN \nPeriode : " . $periode)
        ->setCellValue('A4', 'No')
        ->setCellValue('B4', "No. Reg ")
        ->setCellValue('C4', "Tanggal")
        ->setCellValue('D4', 'Pelapor')
        ->setCellValue('E4', "NIK")
        ->setCellValue('F4', 'No. KK ')
        ->setCellValue('G4', "Nama Register")
        ->setCellValue('H4', "Alamat Register");
    foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
        $objPHPExcel->getActiveSheet()
            ->getColumnDimension($col)
            ->setAutoSize(true);
    }
    $loop = 5;
    $no = 1;
    foreach ($data as $pr) {

        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('A' . $loop, $no);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('B' . $loop, $pr['ID_REG']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('C' . $loop, putar_tanggal($pr['TGL_REG']));
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('D' . $loop, $pr['NM_LAPOR']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('E' . $loop, $pr['NIK']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('F' . $loop, $pr['KK']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('G' . $loop, $pr['NM_REG']);
        $objPHPExcel->setActiveSheetIndex(0)->SetCellValue('H' . $loop, $pr['ALM_REG']);
        $loop++;
        $no++;
        # code...
    }
    $objPHPExcel->getActiveSheet()->setAutoFilter('A4:H4');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);
}
