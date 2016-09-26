 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_dokumen_b.php");
      $session->renew();

      $m_dokumen_b = new m_dokumen_b();
       switch ($gact) {
        default:
      	 	$lm_dokumen_b=$db->query("SELECT * FROM m_dokumen_b,m_kegiatan_b,m_kegiatan_a WHERE m_dokumen_b.ID_KGIAT_B=m_kegiatan_b.ID_KGIAT_B AND m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A");
             $groupk=$db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE IS_AKTIF=1");
            $judul ="Dokumen Sub Kegiatan";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_dokumen_b" =>$lm_dokumen_b,
                      "groupk" => $groupk
                    );

            break;

            case "edit":
                $id =array("ID_DOKU_B"=>$gid);
                $em_dokumen_b=$db->query("SELECT * FROM m_dokumen_b,m_kegiatan_b,m_kegiatan_a WHERE m_dokumen_b.ID_KGIAT_B=m_kegiatan_b.ID_KGIAT_B AND m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A AND m_dokumen_b.ID_DOKU_B='$gid'");
                   $groupk=$db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE IS_AKTIF=1");
                $judul= "Edit Dokumen Sub Kegiatan";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_dokumen_b,
                      "groupk" => $groupk
                    );


            break;

             }






 }
