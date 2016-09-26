 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_kegiatan_c.php");
      $session->renew();

      $m_kegiatan_c = new m_kegiatan_c();
       switch ($gact) {
        default:
      	 $lm_kegiatan_c=$db->query("SELECT * FROM m_kegiatan_c,m_kegiatan_b,m_kegiatan_a WHERE m_kegiatan_b.ID_KGIAT_B=m_kegiatan_c.ID_KGIAT_B AND m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A");
         $groupk=$db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE IS_AKTIF=1");
            $judul ="Sub Kelompok";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_kegiatan_c" =>$lm_kegiatan_c,
                      "groupk" => $groupk
                    );

            break;

            case "edit":
                $id =array("ID_KGIAT_C"=>$gid);
 			    $em_kegiatan_c=$db->query("SELECT * FROM m_kegiatan_c,m_kegiatan_b,m_kegiatan_a WHERE m_kegiatan_b.ID_KGIAT_B=m_kegiatan_c.ID_KGIAT_B AND m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A AND m_kegiatan_c.ID_KGIAT_C='$gid'");
             $groupk=$db->query("SELECT ID_KGIAT_B AS id, NM_KEGIAT_B AS nama FROM m_kegiatan_b WHERE IS_AKTIF=1");
                $judul= "Edit Sub Kelompok";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_kegiatan_c,
                      "groupk" => $groupk
                    );


            break;

             }






 }
