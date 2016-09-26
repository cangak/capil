<?php
function duit($angka)
{
 $jadi = "Rp " . number_format($angka,0,',','.');
 return $jadi;
}
function putar_tanggal($tgl) {
    $s=explode("-", $tgl);
    $tanggal = $s[2];
    $bulan = getBulan($s[1]);
    $tahun = $s[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function tgl_news($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal;
}
function bln_news($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $bulan;
}
function thn_news($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tahun;
}
function getBulan($bln) {
    switch ($bln) {
    case 1:
        return "Januari";
        break;
    case 2:
        return "Februari";
        break;
    case 3:
        return "Maret";
        break;
    case 4:
        return "April";
        break;
    case 5:
        return "Mei";
        break;
    case 6:
        return "Juni";
        break;
    case 7:
        return "Juli";
        break;
    case 8:
        return "Agustus";
        break;
    case 9:
        return "September";
        break;
    case 10:
        return "Oktober";
        break;
    case 11:
        return "November";
        break;
    case 12:
        return "Desember";
        break;
    }
}
function namabulan($bln) {
    switch ($bln) {
    case "01":
        return "Januari";
        break;
    case "02":
        return "Februari";
        break;
    case "03":
        return "Maret";
        break;
    case "04":
        return "April";
        break;
    case "05":
        return "Mei";
        break;
    case "06":
        return "Juni";
        break;
    case "07":
        return "Juli";
        break;
    case "08":
        return "Agustus";
        break;
    case "09":
        return "September";
        break;
    case 10:
        return "Oktober";
        break;
    case 11:
        return "November";
        break;
    case 12:
        return "Desember";
        break;
    }
}

function get_server_memory_usage() {

    $free = shell_exec('free');
    $free = (string) trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2] / $mem[1] * 100;

    return $memory_usage;
}
?>
