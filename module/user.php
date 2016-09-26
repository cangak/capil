 <?php
if (!defined('pontimin')) {
    die('You have no access');
}
if ($session->wes_entek()) {
    header('location:/login.php');
} else {
    require_once "class/user.php";
    $session->renew();

    $user = new user();
    switch ($gact) {
    default:
        $luser = $user->all();
        $judul = "Management user";
        $data = array(
            "posisi" => $gact,
            "judul" => $judul,
            "luser" => $luser,
        );

        break;

    case "edit":
        $id = array("id" => $gid);
        $euser = $user->search($id);
        $judul = "Edit user";
        $data = array(
            "posisi" => $gact,
            "judul" => $judul,
            "edit" => $euser,
        );

        break;

    }

}
