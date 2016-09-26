 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/level.php");
      $session->renew();

      $level = new level();
       switch ($gact) {
        default:
            $llevel=$level->all();
            $judul ="Level";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "llevel" =>$llevel
                    );

            break;

            case "edit":
                $id =array("id"=>$gid);
                $elevel=$level->search($id);
                $judul= "Edit level";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $elevel
                    );


            break;

             }






 }
