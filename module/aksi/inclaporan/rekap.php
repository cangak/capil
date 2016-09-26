<?php
$dd = $k->query("SELECT ID_KGIAT, NM_KGIAT, ID_KGIAT_A, NM_KGIAT_A, ID_KGIAT_B, NM_KEGIAT_B,
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
WHERE A.TGL_REG BETWEEN '$_POST[tgl_dari]' AND '$_POST[tgl_sampai]'
and A.ID_KGIAT_A='$_POST[subkeg]'
) Q
GROUP BY
ID_KGIAT, NM_KGIAT, ID_KGIAT_A, NM_KGIAT_A, ID_KGIAT_B, NM_KEGIAT_B,
NM_KEGIAT_C
ORDER BY
  Q.NM_KGIAT,
  Q.NM_KGIAT_A,
  Q.NM_KEGIAT_B,
  Q.NM_KEGIAT_C
");

           foreach ($dd as $key) {
   $keg=$key['NM_KGIAT'];
   $keg_a[]=$key['NM_KGIAT_A'];
   $keg_b[]=$key['NM_KEGIAT_B'];
   $keg_c[]=$key['NM_KEGIAT_C'];
   
   }
   echo "
<h4 align='center'>Laporan Pencatatan Registrasi Kegiatan Per Kecamatan <br />
Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak <br />
Periode : " . putar_tanggal($_POST['tgl_dari']) . " s/d " . putar_tanggal($_POST['tgl_sampai']) . "</h4>";
            //  print_r($dd);
echo "<table>
<thead>
  <tr>
  <th colspan='3'  class='cc'>&nbsp;</th>
  <th class='cc'>Sub Kelompok</th>
  <th class='cc'>1.SEL</th>
  <th class='cc'>2.TIM</th>
  <th class='cc'>3.BAR</th>
  <th class='cc'>4.UTA</th>
  <th class='cc'>5.KOT</th>
  <th class='cc'>6.TNG</th>
  <th class='cc'>7.KAB</th>
  <th class='cc'>L</th>
  <th class='cc'>P</th>
  <th  class='cc'>JML</th>
  </tr></thead>";
	
  # code...
  echo '<tr>
    <td class="bold" colspan="14"><div class="width">' . $keg . '</div></td>
  </tr>';
$sel=0;
$tim=0;
$bar=0;
$uta=0;
$kot=0;
$tng=0;
$kab=0;
$la=0;
$pr=0;
$j=0;
foreach (array_unique($keg_a) as $ka) {

echo '<tr>
  <td colspan="14" class="bold">' . $ka. '</td>
  </tr>
  ';
  foreach (array_unique($keg_b) as $ma) {
    echo '<tr><td colspan="14" class="bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $ma . '</td></tr>';
   foreach ($dd as $key) {
if ($key['NM_KEGIAT_B'] == $ma) {
                $s = $key['KEC1'] + $key['KEC2'] + $key['KEC3'] + $key['KEC4'] + $key['KEC5'] + $key['KEC6'] + $key['KEC7'];
echo '<tr>
  <td>&nbsp;</td>
  
    <td colspan="3">' . $key['NM_KEGIAT_C'] . '</td>
  <td>' . $key['KEC1'] . '</td>
  <td>' . $key['KEC2'] . '</td>
  <td>' . $key['KEC3'] . '</td>
  <td>' . $key['KEC4'] . '</td>
  <td>' . $key['KEC5'] . '</td>
  <td>' . $key['KEC6'] . '</td>
  <td>' . $key['KEC7'] . '</td>
  <td>' . $key['L'] . '</td>
  <td>' . $key['P'] . '</td>
  <td>' . $s . '</td>
  </tr>';
$sel +=$key['KEC1'];
$tim +=$key['KEC2'];
$bar +=$key['KEC3'];
$uta +=$key['KEC4'];
$kot +=$key['KEC5'];
$tng +=$key['KEC6'];
$kab +=$key['KEC7'];
$la +=$key['L'];
$pr +=$key['P'];
$j +=$s;			

}

}


}
echo '<tr>
  <td>&nbsp;</td>
  <td class="bold" colspan="3">Jumlah</td>
  <td class="bold">' . $sel .'</td>
  <td class="bold">' . $tim. '</td>
  <td class="bold">' . $bar. '</td>
  <td class="bold">' . $uta. '</td>
  <td class="bold">' . $kot. '</td>
  <td class="bold">' . $tng. '</td>
  <td class="bold">' . $kab. '</td>
  <td class="bold">' . $la . '</td>
  <td class="bold">' . $pr . '</td>
  <td class="bold">'.$j.'</td>
  </tr>';
}
echo "</table>";