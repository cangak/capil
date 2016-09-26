 <?php
if (!defined('pontimin')) {
    header('location:/');
    exit;
}
if ($session->wes_entek()) {
    header('location:/login.php');
} else {
    $jumlah_selesai_hari_ini = $db->query("SELECT COUNT(*) as jumlah
FROM
  t_reg A
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
  WHERE A.`TGL_PRED_SELESAI` > DATE_SUB(NOW(), INTERVAL 1 DAY)
ORDER BY A.TGL_REG DESC
");

    $jumlah_bulan_ini = $db->query("SELECT COUNT(*) as jumlah
FROM
  t_reg A
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
  WHERE A.`TGL_REG` >  DATE_SUB(NOW(), INTERVAL 1 MONTH)
ORDER BY A.TGL_REG DESC
");

    $jumlah_all = $db->query("SELECT COUNT(*) as jumlah
FROM
  t_reg A
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
ORDER BY A.TGL_REG DESC
");

    $jumlah_lunas = $db->query("SELECT COUNT(*) as jumlah
FROM
  t_reg A
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
where A.IS_LUNAS=1");
    $jumlah_blunas = $db->query("SELECT COUNT(*) as jumlah
FROM
  t_reg A
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
where A.IS_LUNAS=0");
    $jumlah_proses = $db->query("SELECT COUNT(*) AS jumlah
FROM
  t_reg A
  LEFT OUTER JOIN T_REG_STAT X ON (A.C_ID_REG_STAT = X.ID_REG_STAT)
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
WHERE X.`NO_STAT`=1");
    $jumlah_pending = $db->query("SELECT COUNT(*) AS jumlah
FROM
  t_reg A
  LEFT OUTER JOIN T_REG_STAT X ON (A.C_ID_REG_STAT = X.ID_REG_STAT)
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
WHERE X.`NO_STAT`=2");
    $jumlah_selesai = $db->query("SELECT COUNT(*) AS jumlah
FROM
  t_reg A
  LEFT OUTER JOIN T_REG_STAT X ON (A.C_ID_REG_STAT = X.ID_REG_STAT)
  INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A)
  INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B)
  LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C)
  INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI)
  INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)
WHERE X.`NO_STAT`=3");
    $data = array(
        "judul"                   => "Dashboard",
        "jumlah_selesai_hari_ini" => $jumlah_selesai_hari_ini[0]['jumlah'],
        "jumlah_bulan_ini"        => $jumlah_bulan_ini[0]['jumlah'],
        "bulan"                   => getBulan(date("m")),
        "lunas"                   => $jumlah_lunas[0]['jumlah'],
        "blunas"                  => $jumlah_blunas[0]['jumlah'],
        "proses"                  => $jumlah_proses[0]['jumlah'],
        "pending"                 => $jumlah_pending[0]['jumlah'],
        "selesai"                 => $jumlah_selesai[0]['jumlah'],
        "jumlah_all"              => $jumlah_all[0]['jumlah']);
    $session->renew();

}
