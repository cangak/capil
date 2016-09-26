<?php
//aku edit edit lah sikit
require_once "inc/encryption/function.php";
require_once "inc/class/Session.php";
require_once "inc/class/login.php";
require_once "inc/class/Db.class.php";
require_once "vendor/twig/twig/lib/Twig/Autoloader.php";
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('tema');
$twig = new Twig_Environment($loader, array(
    'cache' => 'tmp/tema',
));
$session = new Session();
if ($session->wes_mlebu()){
	 header('location:/');
};
  if (!isset($_POST['username']) and !isset($_POST['password'])) {
        $template = $twig->loadTemplate('login.tpl');
echo $template->render(
				array('judul' => 'Halaman login',
						'ket'=>'Masukan Username dan Password anda',
						'user'=>'username',
						'pass'=>'password',
						'tombol'=>'login'
));
    }




     ?>