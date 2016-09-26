 <?php
if (!defined('pontimin')) {
    die('You have no access');
}
if ($session->wes_entek()) {
    header('location:/login.php');
} else {
    require_once "class/m_user.php";
    $session->renew();
    $user = $session->getusernmae();
    $m_user = new m_user();
    switch ($gact) {
    default:
        if ($session->getlevel() == 1) {
            $lm_user['user'] = $db->query("SELECT u.id,u.username,u.level,m.NM_USER,m.`JABAT_USER`,m.`NIP_USER`  FROM USER u INNER JOIN m_user m ON (m.`USER_ID`=u.`m_user_id`)");
            $lm_user['level'] = $db->query("SELECT `id`, `group` AS `nama` FROM `m_group`");
            $lm_user['pegawai'] = $db->query("SELECT USER_ID as id,NM_USER as nama from m_user");
            $lm_user['satker'] = $db->query("SELECT  id,satker as nama from satker");
        } else {
            $lm_user['user'] = $db->query("SELECT u.id, u.username,m.NM_USER,m.`JABAT_USER`,m.`NIP_USER`  FROM USER u INNER JOIN m_user m ON (m.`USER_ID`=u.`m_user_id`) where u.username='" . $session->getusernmae() . "'");
        }
        $judul = "Data User";
        $data = array(
            "posisi" => $gact,
            "judul" => $judul,
            "lm_user" => $lm_user,
        );

        break;

    case "edit":
        if ($session->getlevel() == 1) {

            $em_user['user'] = $db->query("select  u.id, u.`username`,u.level,u.m_user_id,u.satker as sat,
  mk.`satker`,
  mg.`group` ,
  mu.`NIP_USER`,
  mu.`NM_USER`,
  mu.`JABAT_USER`
from
  user u
  left join satker mk
    on (mk.`id` = u.`satker`)
  left join m_group mg
    on (mg.`id` = u.`level`)
  left join m_user mu on (mu.`USER_ID`=u.`m_user_id`)
    where u.id= '$gid'");
            $em_user['level'] = $db->query("SELECT `id`, `group` AS `nama` FROM `m_group`");
            $em_user['pegawai'] = $db->query("SELECT USER_ID as id,NM_USER as nama from m_user");
            $em_user['satker'] = $db->query("SELECT  id,satker as nama from satker");
        } else {
            $em_user['user'] = $db->query("select  u.id, u.`username`,u.level,u.m_user_id,u.satker as sat,
  mk.`satker`,
  mg.`group` ,
  mu.`NIP_USER`,
  mu.`NM_USER`,
  mu.`JABAT_USER`
from
  user u
  left join satker mk
    on (mk.`id` = u.`satker`)
  left join m_group mg
    on (mg.`id` = u.`level`)
  left join m_user mu on (mu.`USER_ID`=u.`m_user_id`)
    where u.id= '$gid'");

        }
        $judul = "Edit Data User";

        $data = array(
            "posisi" => $gact,
            "judul" => $judul,
            "edit" => $em_user,
            "level" => $session->getlevel(),
        );

        break;

    }

}
