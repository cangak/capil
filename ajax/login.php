<?php
include __DIR__ . "/../inc/class/login.php";
include __DIR__ . "/../inc/class/Session.php";
$login = new login();
$session = new Session();
$username = $_POST['username'];
$resp = array();
$login_status = 'invalid';
$cari = array("username" => $username, "status" => 1);
$stat = $login->search($cari);
$password_hash = $_POST['password'];
// $tes = $login->username;
// print_r($stat);
if ($stat) {
    if (password_verify($_POST['password'], $stat[0]['password_hash'])) {
        $login_status = 'success';
        $resp['redirect_url'] = '?b1ac401f5ba6e78216c0c4d4438c5ca7';
    }
}

$resp['login_status'] = $login_status;

if ($login_status == 'success') {
    $array = array(
        "username" => $stat[0]['username'],
        "level" => $stat[0]['level'],
        "satker" => $stat[0]['satker'],

    );
    $session->register(60, $array);
}

echo json_encode($resp);
