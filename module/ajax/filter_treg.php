<?php
require_once __DIR__ . "/../../inc/class/Session.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();

    header('location:/login.php');
} else {
    include __DIR__ . "/../../inc/Db.class.php";
    if (isset($_GET['golek'])) {
        $db = new DB();
        //tak usah di ganggu
        if ($_GET['golek'] == 'nkegiatan') {
            //$r[''] = "Pilih Nama Kegiatan";
            if ($_GET['gkegiatan'] != '') {
                $hasil = $db->query("SELECT ID_KGIAT_A AS id, NM_KGIAT_A AS nama FROM m_kegiatan_a WHERE ID_KGIAT ='$_GET[gkegiatan]'");
                $s = [["", "Pilih Nama Kegiatan"]];
                foreach ($hasil as $h) {
                    $ss[] = [$h['id'], $h['nama']];
                }
                $d = array_merge($s, $ss);
                /*foreach ($hasil as $h) {
            $val     = $h['id'];
            $tex     = $h['nama'];
            $r[$val] = $tex;
            }*/
            }
        } elseif ($_GET['golek'] == 'skegiatan') {
            // $r[''] = "Pilih Sub Kegiatan";
            if ($_GET['nkegiatan'] != '') {
                $hasil = $db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE ID_KGIAT_A='$_GET[nkegiatan]'");
                $s = [["", "Pilih Sub Kegiatan"]];
                foreach ($hasil as $h) {
                    $ss[] = [$h['id'], $h['nama']];
                }
                $d = array_merge($s, $ss);

                /* foreach ($hasil as $h) {
            $val     = $h['id'];
            $tex     = $h['nama'];
            $r[$val] = $tex;
            }*/
            }
            ///yang serah lah
        } elseif ($_GET['golek'] == 'tambahgkegiatan') {
            if ($_GET['tambahgkegiatan'] != '') {
                $hasil = $db->query("SELECT ID_KGIAT_A AS id, NM_KGIAT_A AS nama FROM m_kegiatan_a WHERE ID_KGIAT ='$_GET[tambahgkegiatan]'");
                $s = [["", "pilih Kegiatan"]];
                foreach ($hasil as $h) {
                    $ss[] = [$h['id'], $h['nama']];
                }
                $d = array_merge($s, $ss);
                // echo json_encode($d);
            }
        } elseif ($_GET['golek'] == 'tambahskegiatan') {
            $s = [["", "Pilih Sub Kegiatan"]];
            if ($_GET['tambahkegiatan'] != '') {
                $hasil = $db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE ID_KGIAT_A ='$_GET[tambahkegiatan]'");
                foreach ($hasil as $h) {
                    $ss[] = [$h['id'], $h['nama']];
                }
                $d = array_merge($s, $ss);
            }
        } elseif ($_GET['golek'] == 'tambahkkegiatan') {
            $s = [["", "Pilih Kelompok Kegiatan"]];
            if ($_GET['tambahskegiatan'] != '') {
                $hasil = $db->query("SELECT ID_KGIAT_C AS id, NM_KEGIAT_C AS nama FROM m_kegiatan_c WHERE ID_KGIAT_B ='$_GET[tambahskegiatan]'");
                foreach ($hasil as $h) {
                    $ss[] = [$h['id'], $h['nama']];
                }
                $d = array_merge($s, $ss);
            }
        } elseif ($_GET['golek'] == 'tambahretribusi') {
            $s = [["", "Sub Kelompok Kegiatan"]];
            if ($_GET['tambahskegiatan'] != '') {
                $hasil = $db->query("SELECT ID_RETRI AS id, NM_RETRI AS nama FROM m_retribusi WHERE ID_KGIAT_B ='$_GET[tambahskegiatan]'");
                foreach ($hasil as $h) {
                    $ss[] = [$h['id'], $h['nama']];
                }
                $d = array_merge($s, $ss);
            }
        } elseif ($_GET['golek'] == 'harga') {
            if (isset($_GET['idretri'])) {
                $hasil = $db->query("SELECT DEF_RETRI FROM m_retribusi WHERE ID_RETRI ='$_GET[idretri]'");
                foreach ($hasil as $h) {
                    $ss['retri'] = $h['DEF_RETRI'];
                }
                $m = date('m');
                $y = date('y');
                $k = "SKS" . "." . $m . "." . $y;
                //$k = "REG.03.15";
                $kode_b = $db->query("SELECT NOMOR FROM t1_auto WHERE KODE LIKE '%" . $k . "'");
                if (empty($kode_b)) {
                    $ss['kode'] = str_pad('1', 4, "000", STR_PAD_LEFT) . "." . $k;
                    $ins = $db->query("insert into t1_auto value ('" . $k . "','0')");
                } else {
                    foreach ($kode_b as $value) {
                        $bari = $value['NOMOR'] + 1;
                        //$upd = $db->query("update t1_auto set NOMOR='$bari'");
                        $ss['kode'] = str_pad($value['NOMOR'] + 1, 4, "000", STR_PAD_LEFT) . "." . $k;
                    }
                }
                if (isset($ss) and $ss != '') {
                    echo json_encode($ss);
                }

            }

        } elseif ($_GET['golek'] == 'document') {

            if ($_GET['keywords'] != '') {
                // echo "SELECT ID_DOKU_B as id, NM_DOKU_B as nama FROM m_dokumen_b WHERE ID_KGIAT_B ='$_GET[keywords]'";
                $lama = $db->query("select lama from m_kegiatan_b where ID_KGIAT_B='$_GET[keywords]'");
                $hariini = date('d/m/Y');
                $ex = "+" . $lama[0]['lama'];
                $tglselesai = date('d/m/Y', strtotime($ex . " days"));
                $ss['lama'] = $tglselesai;
                $hasil = $db->query("SELECT ID_DOKU_B as id, NM_DOKU_B as nama FROM m_dokumen_b WHERE ID_KGIAT_B ='$_GET[keywords]'");
                foreach ($hasil as $h) {
                    $ss['document'][] = $h;
                }
                $kode_a = $db->query("SELECT IFNULL(KODE_REG,'REG') AS KODE_REG FROM m_kegiatan_b  WHERE ID_KGIAT_B=" . $_GET['keywords']);
                foreach ($kode_a as $value) {
                    $kode = $value['KODE_REG'];
                }
                $m = date('m');
                $y = date('y');
                $k = $kode . "." . $m . "." . $y;
                //$k = "REG.03.15";
                $kode_b = $db->query("SELECT NOMOR FROM t1_auto WHERE KODE LIKE '%" . $k . "'");
                if (empty($kode_b)) {
                    $ss['kode'] = str_pad('1', 4, "000", STR_PAD_LEFT) . "." . $k;
                    $ins = $db->query("insert into t1_auto value ('" . $k . "','0')");
                } else {
                    foreach ($kode_b as $value) {
                        $no = $value['NOMOR'] + 1;
                        $ss['kode'] = str_pad($no, 4, "000", STR_PAD_LEFT) . "." . $k;
                        $auto = $db->query("update t1_auto set NOMOR='$no' where KODE like '%$k'");
                    }
                }

                if (isset($ss) and $ss != '') {
                    echo json_encode($ss);
                }

            }
        }
        if ((isset($r) and $r != '')) {
            echo json_encode($r);
        } else if ((isset($d) and $d != '')) {
            echo json_encode($d);
        }

    }
}
?>