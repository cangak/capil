<?php
require_once __DIR__ . "/../../inc/CRUD.class.php";
class m_user Extends Crud {

    # Your Table name
    protected $table = 'user';

    # Primary Key of the Table
    protected $pk = 'id';

}

?>