<?php
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
WHERE A.`TGL_REG` BETWEEN '$_POST[tgl_dari]' and '$_POST[tgl_sampai]'
ORDER BY
 A.TGL_REG ");
            echo "
  <h4>LAPORAN PENDAFTARAN<br />
  Periode : " . putar_tanggal($_POST['tgl_dari']) . " s/d " . putar_tanggal($_POST['tgl_sampai']) . "</h4>";

            echo "<table class='satos' style='width:100%'>
<thead>
  <tr>
  <th class='cc'>No</th>
  <th class='cc'>No. Reg</th>
  <th class='cc'>Tanggal</th>
  <th class='cc'>Pelapor</th>
  <th class='cc'>NIK</th>
  <th class='cc'>No. KK</th>
  <th class='cc'>Nama Register</th>
  <th class='cc'>Alamat Register</th>
  </tr>
 
  
  </thead>
<tbody>";
            $no = 1;
            foreach ($data as $key) {
                echo "  <tr>
  <td align='center'>$no</td>
  <td>$key[ID_REG]</td>
  <td>".putar_tanggal($key['TGL_REG'])."</td>
  <td>$key[NM_LAPOR]</td>
  <td>$key[NIK]</td>
  <td>$key[KK]</td>
  <td>$key[NM_REG]</td>
  <td>$key[ALM_REG]</td>

  </tr>
  
";
                $no++;
            }

            echo " <tr>
    <th class='cc' colspan='8'><div style='width:100%;'></div>
</th>
  </tr></tbody>
</table>";
