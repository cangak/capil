 <?php
if (!defined('pontimin')) {
    die('You have no access');
}
if ($session->wes_entek()) {
    header('location:/login.php');
} else {
    require_once "class/t_reg.php";
    require_once "class/t_reg_dok.php";
    $session->renew();

    $t_reg = new t_reg();
    $d_reg = new t_reg_dok();
    if ($_SESSION['level'] == 1) {
        $l = 'admin';
    } else if ($_SESSION['level'] == 2) {
        $l = 'kasir';
    } else if ($_SESSION['level'] == 3) {
        $l = 'operator';
    } else if ($_SESSION['level'] == 4) {
        $l = 'umum';
    } else if ($_SESSION['level'] == 5) {
        $l = 'manager';
    } else if ($_SESSION['level'] == 6) {
        $l = 'kecamatan';
    }
    $l_gkegiatan = $db->query("select ID_KGIAT as id, NM_KGIAT as nama from m_kegiatan where IS_AKTIF='1'");
    $l_kecamatan = $db->query("SELECT NM_KAB as nama,ID_KEC as id FROM m_kec WHERE IS_AKTIF='1'");
//        $tambah =array()
    array_unshift($l_gkegiatan, array("id" => "", "nama" => "Pilih Group Kegiatan"));
    array_unshift($l_kecamatan, array("id" => "", "nama" => "Pilih Kecamatan"));
    switch ($gact) {

    default:

        $judul = "Register";

        $data = array(
            "level" => $l,
            "posisi" => $gact,
            "judul" => $judul,
            "gkegiatan" => $l_gkegiatan,
            "kec" => $l_kecamatan,
        );

        break;

    case "update":
        $id = array("ID_REG" => $gid);
        $et_reg = $t_reg->search($id);
        $dok_reg = $db->query("SELECT t.`ID_DOK`,t.`ID_DOKU_B`,b.`NM_DOKU_B` FROM `t_reg_dok` t LEFT JOIN m_dokumen_b b ON (b.`ID_DOKU_B`=t.`ID_DOKU_B`) WHERE t.ID_REG='$gid'");

        $judul = "Edit Register";
        $data = array(
            "level" => $l,
            "posisi" => $gact,
            "judul" => $judul,
            "edit" => $et_reg,
            "dok_reg" => $dok_reg,
            "gkegiatan" => $l_gkegiatan,
            "kec" => $l_kecamatan,
        );

        break;
    case "print":

        $p_reg = $db->query("SELECT   tr.`ID_REG`,
  mg.`NM_KGIAT`,
  mga.`NM_KGIAT_A`,
  mgb.`NM_KEGIAT_B`,
  mgc.`NM_KEGIAT_C`,
  mc.`NM_KAB`,
  tr.`TGL_REG`,
  tr.`NM_LAPOR`,
  tr.`ALM_LAPOR`,
  tr.`TELP_LAPOR`,
  tr.`NIK`,
  tr.`KK`,
  tr.`NM_REG`,
  tr.`ALM_REG`,
  tr.`INFO_RUBAH`,
  tr.`INFO`,
  tr.`TGL_PRED_SELESAI`,
  tr.`ID_USER`
FROM
  t_reg tr
  LEFT JOIN m_kegiatan mg
    ON (mg.`ID_KGIAT` = tr.`ID_KGIAT`)
  LEFT JOIN m_kegiatan_a mga
    ON (
      mga.`ID_KGIAT_A` = tr.`ID_KGIAT_A`
    )
  LEFT JOIN m_kegiatan_b mgb
    ON (
      mgb.`ID_KGIAT_B` = tr.`ID_KGIAT_B`
    )
  LEFT JOIN m_kegiatan_c mgc
    ON (
      mgc.`ID_KGIAT_C` = tr.`ID_KGIAT_C`
    )
  LEFT JOIN m_kec mc
    ON (tr.`ID_KEC` = mc.`NM_KAB`) WHERE tr.ID_REG='$gid'");

        $data = array(
            "level" => $l,
            "posisi" => "print",
            "judul" => "Kependudukan",
            "print" => $p_reg,

        );
        break;
    case "hapus":
        $data = array(
            "posisi" => "hapus",
        );
        break;
    case "kasir":
        $d = $db->query("SELECT `ID_REG`, `TGL_REG`, `NM_LAPOR`, `ALM_LAPOR`, KD_SKS,mr.DEF_RETRI, mr.`NM_RETRI`, mr.REK01, mr.REK02, mr.REK03, mr.REK04, mr.REK05, mr.REK06, mr.REK07, mr.REK08, mr.REK09, mr.REK10, mr.REK11
FROM
  t_reg LEFT JOIN m_retribusi mr ON (mr.`ID_RETRI`=t_reg.`ID_RETRI`)
WHERE ID_REG = '$gid'");
        $dat = strtotime($d[0]['TGL_REG']);
        $date = date('Y-m-d', strtotime('+1 month', $dat));
        $s = explode("-", $d[0]['TGL_REG']);
        $bln = $s[1];
        $thn = $s[2];
        $data = array(
            "bulan" => $bln,
            "tahun" => $thn,
            "level" => $l,
            "judul" => "Kependudukan",
            "posisi" => "kasir",
            "tempo" => $date,
            "print" => $d,
        );
        break;
    }

}
