<?php
$kas = $k->query("SELECT a.`ID_REG`, d.`NM_KGIAT`, e.`NM_KGIAT_A`, f.`NM_KEGIAT_B`, g.`NM_KEGIAT_C`,
  c.`NM_RETRI`,
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
WHERE b.`TGL` BETWEEN ' $_POST[tgl_dari]' AND '$_POST[tgl_sampai]' ORDER BY b.`TGL`");
echo "
<h4 align='center'>Pendapatan Kasir<br />
Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak <br />
Periode : " . putar_tanggal($_POST['tgl_dari']) . " s/d " . putar_tanggal($_POST['tgl_sampai']) . "</h4>";
echo '<table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th class="cc">No</th>
        <th class="cc">ID Reg</th>
        <th class="cc">Group Kegiatan</th>
        <th class="cc">Retribusi</th>
        <th class="cc">Tanggal</th>
        <th class="cc">Info</th>
        <th class="cc">Total</th>
      </tr>
    </thead>
    <tbody>';
$no = 1;
$qty = 0;
foreach ($kas as $ka) {
    echo " <tr>
        <td>$no</td>
        <td>$ka[ID_REG]</td>
        <td>" . $ka['NM_KGIAT'] . "</td>
        <td>" . $ka['NM_RETRI'] . "</td>
        <td>" . putar_tanggal($ka['TGL']) . "</td>
        <td>" . $ka['INFO'] . "</td>
        <td>" . duit($ka['N_BAYAR']) . "</td>
      </tr>";
    $no++;
    $qty += $ka['N_BAYAR'];
}

echo '
     <tr><td align="center"colspan=6><b>Total</b></td><td>' . duit($qty) . '</td></tr>
     <tr><td class="cc" colspan=7><div style="width:100%;"></div></td></tr>
         </tbody>
  </table>';
