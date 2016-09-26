<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();
    header('location:/login.php');
} else {
    include __DIR__ . "/../../../inc/Db.class.php";
    $db = new DB();
    if (isset($_GET['id']) and $_GET['id'] != '') {
        $detail = $db->query("SELECT A.`ID_REG` AS 'No Reg',
  A.`TGL_REG` AS 'Tanggal',
  A.`TGL_PRED_SELESAI` AS 'Pred Selesai',
  A.`NM_LAPOR` AS Pelapor,
  A.`ALM_LAPOR` AS 'Alamat Pelapor',
  A.`TELP_LAPOR` AS Telepon,
  A.`NM_REG` AS Nama,
  A.`ALM_REG` AS Alamat,
  A.`JK_REG` AS JK,
  A.`TGL_PERISTIWA` AS 'Tanggal Kejadian',
  A.`NO_AKTA` AS 'NO Akta',
  A.`TGL_AKTA` AS 'Tgl Akta',
  A.`INFO` AS Keterangan,
  A.`DATA_LAMA` AS 'Data Lama',
  A.`DATA_BARU` AS 'Data Baru',
  A.INFO_RUBAH AS Catatan,
  A.`N_RETRI` AS Retribusi,
  A.`C_BAYAR` AS Bayar,
  F.`NM_KAB` AS Kecamatan,
  Z.`NM_KGIAT` AS Kegiatan,
  B.`NM_KGIAT_A` AS 'Sub Kegiatan',
  C.`NM_KEGIAT_B` AS 'Kelompok Kegiatan',
  D.`NM_KEGIAT_C` AS 'Nama Retribusi',
  E.`NM_RETRI`  AS 'Nama Retribusi',
  A.`ID_USER` AS 'Id User',
  A.`UPDATED` AS Updated
FROM
  T_REG A
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
  INNER JOIN m_kegiatan Z ON (Z.`ID_KGIAT`=A.`ID_KGIAT`)
WHERE A.`ID_REG`='" . $_GET['id'] . "'");
        array_unshift($detail, null);
        $transposedarr = call_user_func_array('array_map', $detail);
        echo '<table class="table table-hover table-bordered">';
        foreach ($transposedarr as $r => $v) {
            echo '<tr>';
            echo '<th class="rowwi">' . $r . '</th><td>' . $v . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '<table class="table table-hover table-bordered">';
        $docu = $db->query("SELECT B.`NM_DOKU_B` FROM t_reg_dok A
                        inner join  m_dokumen_b B on (A.ID_DOKU_B=B.ID_DOKU_B) WHERE A.ID_REG='$_GET[id]'");
        echo "<tr>
                <th>Dokumen</th>
              </tr>";
        if (empty($docu)) {
            echo "<tr><td>Tidak Ada Dokomen</td></tr>";
        } else {
            foreach ($docu as $value) {
                echo "<tr><td>$value[NM_DOKU_B]</td></tr>";
            }}
        echo '</table>';

        echo "<style>.rowwi { border: 1px solid #ddd; background-color:#F5F5F6;font-weight: bold;width:25%; }</style>";
    }}
