<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
    ob_start("ob_gzhandler");
} else {
    ob_start();
}

require_once "inc/encryption/function.php";
require_once "inc/class/Session.php";
//require_once "inc/class/Db.class.php";
require_once "inc/explode.php";
require_once "module/class/module.php";
require_once "module/class/menu.php";
require_once "vendor/autoload.php";
require_once "inc/tglindo.php";
#require_once "vendor/twig/twig/lib/Twig/autoloader.php";
$session = new Session();
if ($session->wes_mlebu()) {
    $session->renew();
    If (!isset($gmodule) or empty($gmodule)) {
        $gmodule = 'home';
    }
    $db = new db();
    $sql = $db->query("select akses from m_group_akses where group_id = '" . $_SESSION['level'] . "'");
    foreach ($sql as $ha) {
        $h[] = $ha;
    }
    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
    }

    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('tema');
    $twig = new Twig_Environment($loader, array(
        'cache' => FALSE,
        'auto_reload' => true,
        'debug' => true,

    ));
    $twig->addExtension(new Twig_Extension_Debug());

    $twig->addExtension(new \nochso\HtmlCompressTwig\Extension());
    $function = new Twig_SimpleFunction("encu", function ($saya) {
        return urlc($saya);

    });
    $function3 = new Twig_SimpleFunction("decu", function ($saya) {
        return urld($saya);

    });
    $function2 = new Twig_SimpleFunction("indo", function ($saya) {
        return tgl_indo($saya);

    });
    $function2 = new Twig_SimpleFunction("namabulan", function ($saya) {
        return namabulan($saya);

    });
    $twig->addFunction($function2);

    $twig->addFunction($function3);
    $twig->addFunction($function);

//$twig->addExtension(new Twig_Extension_Debug());

    $loadmodule = new module();
    $mod = array("name" => $gmodule, "publish" => "yes");
    $lmodul = $loadmodule->search($mod);
    $loadmenu = new menu();
    if ($_SESSION['level'] == 1) {
        $allmenu = $db->query("SELECT am.*,i.icon as ic FROM `admin_menu`am left join icon i on (am.icon=i.id_icon) where am.aktif='Y' ORDER BY `position` ASC");
    } elseif ($_SESSION['level'] == 2) {
        $allmenu = $db->query("SELECT am.*,i.icon as ic FROM `admin_menu`am left join icon i on (am.icon=i.id_icon) where am.aktif='Y' and id in (4,17,16,2,7,18) ORDER BY `position` ASC");

    } elseif ($_SESSION['level'] == 3) {
        $allmenu = $db->query("SELECT am.*,i.icon as ic FROM `admin_menu`am left join icon i on (am.icon=i.id_icon) where am.aktif='Y' and id in (4,17,16,2,7,18) ORDER BY `position` ASC");

    } elseif ($_SESSION['level'] == 4) {
        $allmenu = $db->query("SELECT am.*,i.icon as ic FROM `admin_menu`am left join icon i on (am.icon=i.id_icon) where am.aktif='Y' and id in (4,17,16,2,7,9,18) ORDER BY `position` ASC");
    } elseif ($_SESSION['level'] == 5) {
        $allmenu = $db->query("SELECT am.*,i.icon as ic FROM `admin_menu`am left join icon i on (am.icon=i.id_icon) where am.aktif='Y' and id in (4,17,16,2,7,18) ORDER BY `position` ASC");
    }
    function sub($items, $id) {
        $subarray = array();
        foreach ($items as $item) {
            if ($item['parent_id'] == $id) {
                $submenu = sub($items, $item['id']);
                if (empty($submenu)) {
                    $subarray[] = array("link" => $item['link'], "title" => $item['title'], "icon" => $item['ic']);
                } else {
                    $subarray[] = array("link" => $item['link'], "title" => $item['title'], "icon" => $item['ic'], "sub" => $submenu);
                }

            }
        }
        return $subarray;
    }
    foreach ($allmenu as $data) {
        if ($data['parent_id'] == 0) {
            $id = $data['id'];
            $submenu = sub($allmenu, $id);
            if (empty($submenu)) {
                $utama[] = array("link" => $data['link'], "title" => $data['title'], "icon" => $data['ic']);
            } else {
                $utama[] = array("link" => $data['link'], "title" => $data['title'], "icon" => $data['ic'], "sub" => $submenu);
            }
        }
    }
    $hak = in_array_r($lmodul[0]['name'], $h) ? true : false;
    if (!empty($lmodul[0]['link_include']) and file_exists($lmodul[0]['link_include'])) {
        define('pontimin', true);
        include $lmodul[0]['link_include'];
        $tema = array('links' => $utama);
        $rende = (!isset($data)) ? $tema : $rende = array_merge($data, $tema);
        echo $twig->render('module/' . $gmodule . '/' . $gmodule . '.tpl', $rende);

    } else {

        echo "Module <b> " . $gmodule . " </b>tidak tersedia";
        //header('location:/');
    }

} else {
    $session->end();
    header('location:/login.php');
}

?>
