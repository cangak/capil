<?php 
	require_once(__DIR__ . "/../../inc/CRUD.class.php");
	class module  Extends Crud {
		
			# Your Table name 
			protected $table = 'module';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
        
	}

?>