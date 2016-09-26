<?php 
	require_once(__DIR__ . "/Crud.php");
	class login  Extends Crud {
		
			# Your Table name 
			protected $table = 'user';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
        
	}

?>