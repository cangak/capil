<?php 
	require_once(__DIR__ . "/../../inc/CRUD.class.php");
	class pegawai  Extends Crud {
		
			# Your Table name 
			protected $table = 'm_user';
			
			# Primary Key of the Table
			protected $pk	 = 'USER_ID';
        
	}

?>