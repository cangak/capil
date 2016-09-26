 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_kegiatan_a.php");
      $session->renew();
   $db=new DB();
      $m_kegiatan_a = new m_kegiatan_a();

       switch ($gact) {
        default:



            $lm_kegiatan_a=$db->query("SELECT * FROM m_kegiatan_a,m_kegiatan WHERE m_kegiatan.ID_KGIAT=m_kegiatan_a.ID_KGIAT");
	   $groupk=$db->query("SELECT ID_KGIAT AS id, NM_KGIAT AS nama FROM m_kegiatan WHERE IS_AKTIF=1");

            $judul ="Data Kegiatan";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_kegiatan_a" =>$lm_kegiatan_a,
                    "groupk" =>$groupk
                    );

            break;

            case "edit":
                $id =array("ID_KGIAT_A"=>$gid);
                $em_kegiatan_a=$db->query("SELECT * FROM m_kegiatan_a,m_kegiatan WHERE m_kegiatan.ID_KGIAT=m_kegiatan_a.ID_KGIAT AND m_kegiatan_a.ID_KGIAT_A='$gid'");
		$groupk=$db->query("SELECT ID_KGIAT AS id, NM_KGIAT AS nama FROM m_kegiatan WHERE IS_AKTIF=1");
		  $judul= "Edit Data Kegiatan";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_kegiatan_a,
		    "groupk" => $groupk
                    );


            break;


             }






 }
