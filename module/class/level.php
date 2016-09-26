<?php 
	require_once(__DIR__ . "/../../inc/CRUD.class.php");
	class level  Extends Crud {
		
			# Your Table name 
			protected $table = 'level';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
        
	}

?>