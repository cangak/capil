  <?php
echo "
  <h4 align='center'>Rekap Retribusi<br />
  Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak <br />
  Periode : " . putar_tanggal($_POST['tgl_dari']) . " s/d " . putar_tanggal($_POST['tgl_sampai']) . "</h4>";
$ret = $k->query("SELECT a.`ID_REG`, a.`TGL_REG`, d.`NM_KGIAT`, c.`NM_RETRI`,
     a.`N_RETRI`,
     IF(a.`IS_LUNAS`=1,'LUNAS','BELUM') AS lunas
   FROM
    t_reg a
    INNER  JOIN m_retribusi c ON (c.`ID_RETRI`=a.`ID_RETRI`)
  LEFT JOIN m_kegiatan d ON (d.`ID_KGIAT`=a.`ID_KGIAT`)
  LEFT JOIN m_kegiatan_a  e ON (e.`ID_KGIAT_A`=a.`ID_KGIAT_A`)
  LEFT JOIN m_kegiatan_b  f ON (f.`ID_KGIAT_B`=a.`ID_KGIAT_B`)
  LEFT JOIN m_kegiatan_c g ON (g.`ID_KGIAT_C`=a.`ID_KGIAT_C`)
  WHERE KD_SKS != '' AND N_RETRI > 0 AND a.`TGL_REG` BETWEEN '$_POST[tgl_dari]'
    AND '$_POST[tgl_sampai]' ORDER BY  a.`TGL_REG`");
echo '<table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="cc">No</th>
          <th class="cc">Tanggal</th>
          <th class="cc">ID Reg</th>
          <th class="cc">Group Kegiatan</th>
          <th class="cc">Retribusi</th>
         <th class="cc">Total</th>
          <th class="cc">Bayar</th>
        </tr>
      </thead>
      <tbody>';
$no = 1;
foreach ($ret as $ra) {
    echo " <tr>
          <td>$no</td>
          <td>" . putar_tanggal($ra['TGL_REG']) . "</td>
          <td>" . $ra['ID_REG'] . "</td>
          <td>" . $ra['NM_KGIAT'] . "</td>
          <td>" . str_replace("/", "atau", $ra['NM_RETRI']) . "</td>
          <td>" . $ra['N_RETRI'] . "</td>
          <td>" . $ra['lunas'] . "</td>

               </tr>";
    $no++;
}

echo '
            <tr><td class="cc" colspan=7><div style="width:100%;"></div></td></tr>

           </tbody>
    </table>';
