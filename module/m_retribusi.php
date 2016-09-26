 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_retribusi.php");
      $session->renew();

      $m_retribusi = new m_retribusi();
       switch ($gact) {
        default:
            $lm_retribusi=$db->query("SELECT * FROM m_retribusi,m_kegiatan_b,m_kegiatan_a WHERE m_retribusi.ID_KGIAT_B=m_kegiatan_b.ID_KGIAT_B AND m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A");
                 $groupk=$db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE IS_AKTIF=1");
            $judul ="Retribusi Sub Kegiatan";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_retribusi" =>$lm_retribusi,
                        "groupk" => $groupk
                    );

            break;

            case "edit":
                $id =array("ID_RETRI"=>$gid);
                $em_retribusi=$db->query("SELECT * FROM m_retribusi,m_kegiatan_b,m_kegiatan_a WHERE m_retribusi.ID_KGIAT_B=m_kegiatan_b.ID_KGIAT_B AND m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A AND m_retribusi.ID_RETRI='$gid'");
                     $groupk=$db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE IS_AKTIF=1");
                $judul= "Edit Retribusi Sub Kegiatan";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_retribusi,
                        "groupk" => $groupk
                    );


            break;

             }






 }
