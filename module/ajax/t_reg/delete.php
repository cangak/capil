<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
$session = new Session();
if ($session->wes_entek()) {
    $session->end();
    header('location:/login.php');
} else {
    include __DIR__ . "/../../../inc/Db.class.php";
    $db = new DB();
    if (isset($_POST['id']) and $_POST['id'] != '') {
        $delete = $db->query("delete from t_reg where ID_REG='$_POST[id]'");
        if ($delete) {
            $deletes = $db->query("delete from t_reg_dok where ID_REG='$_POST[id]'");
        }
        if ($deletes) {
            $data = array("res" => "1", "id" => $_POST['id']);
            echo json_encode($data);
        }
    }
}
