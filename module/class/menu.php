<?php 
	require_once(__DIR__ . "/../../inc/CRUD.class.php");
	class menu  Extends Crud {
		
			# Your Table name 
			protected $table = 'admin_menu';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
        
	}

?>