<?php
require_once __DIR__ . "/../inc/class/Session.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();
    echo "1";
} else {

    echo "0";

}
