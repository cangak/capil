 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_kegiatan.php");
      $session->renew();

      $m_kegiatan = new m_kegiatan();
       switch ($gact) {
        default:
            $lm_kegiatan=$m_kegiatan->all();
            $judul ="Group Kegiatan";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_kegiatan" =>$lm_kegiatan
                    );

            break;

            case "edit":
                $id =array("ID_KGIAT"=>$gid);
                $em_kegiatan=$m_kegiatan->search($id);
                $judul= "Edit Group Kegiatan";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_kegiatan
                    );


            break;

             }






 }
