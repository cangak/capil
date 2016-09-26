<?php
require_once __DIR__ . "/../../inc/encryption/function.php";
if (isset($_POST)) {
    echo "?" . urlc("module=t_reg&act=" . $_POST['id'] . "&id=" . $_POST['url']);
}
?>