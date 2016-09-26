 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_kec.php");
      $session->renew();

      $m_kec = new m_kec();
       switch ($gact) {
        default:
            $lm_kec=$m_kec->all();
            $judul ="Data Kecamatan";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_kec" =>$lm_kec
                    );

            break;

            case "edit":
                $id =array("ID_KEC"=>$gid);
                $em_kec=$m_kec->search($id);
                $judul= "Edit Data Kecamatan";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_kec
                    );


            break;

             }






 }
