 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_kegiatan_b.php");
      $session->renew();
      $db=new DB();
      $m_kegiatan_b = new m_kegiatan_b();
       switch ($gact) {
        default:
 		 $lm_kegiatan_b=$db->query("SELECT * FROM m_kegiatan_a,m_kegiatan_b WHERE m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A");
      	$groupk=$db->query("SELECT ID_KGIAT_A AS id, NM_KGIAT_A AS nama FROM m_kegiatan_a WHERE IS_AKTIF=1");

            $judul ="Sub Kegiatan";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_kegiatan_b" =>$lm_kegiatan_b,
                      "groupk" => $groupk
                    );

            break;

            case "edit":
                $id =array("ID_KGIAT_B"=>$gid);
 			 $em_kegiatan_b=$db->query("SELECT * FROM m_kegiatan_a,m_kegiatan_b WHERE m_kegiatan_b.ID_KGIAT_A=m_kegiatan_a.ID_KGIAT_A AND m_kegiatan_b.ID_KGIAT_B='$gid'");
       	$groupk=$db->query("SELECT ID_KGIAT_A AS id, NM_KGIAT_A AS nama FROM m_kegiatan_a WHERE IS_AKTIF=1");
                $judul= "Edit Sub Kegiatan";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_kegiatan_b,
                      "groupk" => $groupk
                    );


            break;

             }






 }
