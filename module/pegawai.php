 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/pegawai.php");
      $session->renew();
      
      $pegawai = new pegawai();
       switch ($gact) {
        default:
            $lpegawai=$pegawai->all();
            $judul ="Management pegawai";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "lpegawai" =>$lpegawai
                    );
               
            break;
        
            case "edit":
                $id =array("USER_ID"=>$gid);
                $epegawai=$pegawai->search($id);
                $judul= "Edit pegawai";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $epegawai
                    );
               
                
            break;
      
             }
     
  
                    
      
     
    
 }
 
	
