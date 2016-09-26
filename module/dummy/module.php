 <?php
 if(!defined('pontimin')) {
   die('You have no access');
}
 if ($session->wes_entek()) {
         header('location:/login.php');
 } else {
 require_once("class/#class#.php");
      $session->renew();
      
      $#class# = new #class#();
       switch ($gact) {
        default:
            $l#class#=$#class#->all();
            $judul ="Management #class#";
                  $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "l#class#" =>$l#class#
                    );
               
            break;
        
            case "edit":
                $id =array(#primari#=>$gid);
                $e#class#=$#class#->search($id);
                $judul= "Edit #class#";
                   $data =array(
                    "posisi" => $gact,
                    "judul" => $judul,
                    "edit" => $e#class#
                    );
               
                
            break;
      
             }
     
  
                    
      
     
    
 }
 
	
