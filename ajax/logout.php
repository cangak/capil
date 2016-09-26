 <?php
include __DIR__ . "/../inc/class/Session.php";
$session = new Session();
$session->end();
header('location:/login.php');
