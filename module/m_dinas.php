 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/m_dinas.php");
      $session->renew();

      $m_dinas = new m_dinas();
       switch ($gact) {
        default:
            $lm_dinas=$m_dinas->all();
            $judul ="Data Dinas";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lm_dinas" =>$lm_dinas
                    );

            break;

            case "edit":
                $id =array("ID"=>$gid);
                $em_dinas=$m_dinas->search($id);
                $judul= "Edit Data Dinas";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $em_dinas
                    );


            break;

             }






 }
