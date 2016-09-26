<?php

/* login.tpl */
class __TwigTemplate_29b4f53c651fb92fc93b6e89818ce0d4c761d410153131571a2a0461183304c7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<link rel=\"shortcut icon\" href=\"tema/assets/images/favico.ico\" />
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
\t<meta name=\"description\" content=\"Sistem Informasi Front Office\" />
\t<meta name=\"author\" content=\"\" />
\t<title>Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak</title>
\t<link rel=\"stylesheet\" href=\"tema/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css\">
\t<link rel=\"stylesheet\" href=\"tema/assets/css/font-icons/entypo/css/entypo.css\">
\t<link rel=\"stylesheet\" href=\"http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic\">
\t<link rel=\"stylesheet\" href=\"tema/assets/css/bootstrap.css\">
\t<link rel=\"stylesheet\" href=\"tema/assets/css/neon-core.css\">
\t<link rel=\"stylesheet\" href=\"tema/assets/css/neon-theme.css\">
\t<link rel=\"stylesheet\" href=\"tema/assets/css/neon-forms.css\">
\t<link rel=\"stylesheet\" href=\"tema/assets/css/custom.css\">
\t\t<link rel=\"stylesheet\" href=\"tema/assets/css/skins/facebook.css\">
\t<link id=\"tema\" rel=\"stylesheet\" href=\"\">

\t<script src=\"tema/assets/js/jquery-1.11.0.min.js\"></script>
\t<script>\$.noConflict();</script>

\t<!--[if lt IE 9]><script src=\"tema/assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->

\t<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t<!--[if lt IE 9]>
\t\t<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
\t\t<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
\t<![endif]-->


</head>
<body class=\"page-body login-page login-form-fall\" data-url=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo "\">


<!-- This is needed when you send requests via Ajax -->
<script type=\"text/javascript\">
var baseurl = '';
</script>

<div class=\"login-container\">
\t
\t<div class=\"login-header login-caret\">
\t\t
\t\t<div class=\"login-content\">

\t\t\t<a href=\"/\" class=\"lodgo\">
\t\t\t\t\t\t\t<img src=\"tema/assets/images/logo.png\" width=\"90\" alt=\"\" />
\t\t\t</a>
\t\t\t
\t\t\t<p class=\"description1\">Sistem Informasi Front Office</p>
\t\t\t<p class=\"description2\">Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak</p>
\t\t\t

\t\t\t
\t\t\t<!-- progress bar indicator -->
\t\t\t<div class=\"login-progressbar-indicator\">
\t\t\t\t<h3>43%</h3>
\t\t\t\t<span>logging in...</span>
\t\t\t</div>
\t\t</div>
\t\t
\t</div>
\t
\t<div class=\"login-progressbar\">
\t\t<div></div>
\t</div>
\t
\t<div class=\"login-form\">
\t\t
\t\t<div class=\"login-content\">
\t\t\t
\t\t\t<div class=\"form-login-error\">
\t\t\t\t<h3>Login Tidak Valid</h3>
\t\t\t\t<p>Pastikan Username dan Password anda Benar.</p>
\t\t\t</div>
\t\t\t
\t\t\t<form method=\"post\" role=\"form\" id=\"form_login\">
\t\t\t\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t
\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t<div class=\"input-group-addon\">
\t\t\t\t\t\t\t<i class=\"entypo-user\"></i>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"username\" id=\"username\" placeholder=\"Username\" autocomplete=\"off\" />
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t
\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t<div class=\"input-group-addon\">
\t\t\t\t\t\t\t<i class=\"entypo-key\"></i>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" name=\"password\" id=\"password\" placeholder=\"Password\" autocomplete=\"off\" />
\t\t\t\t\t</div>
\t\t\t\t
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block btn-login\">
\t\t\t\t\t\t<i class=\"entypo-login\"></i>
\t\t\t\t\t\tLogin In
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t</form>
\t\t\t
\t\t\t
\t\t\t
\t\t</div>
\t\t
\t</div>
\t
</div>


\t<!-- Bottom scripts (common) -->
\t<script src=\"tema/assets/js/gsap/main-gsap.js\"></script>
\t<script src=\"tema/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js\"></script>
\t<script src=\"tema/assets/js/bootstrap.js\"></script>
\t<script src=\"tema/assets/js/joinable.js\"></script>
\t<script src=\"tema/assets/js/resizeable.js\"></script>
\t<script src=\"tema/assets/js/neon-api.js\"></script>
\t<script src=\"tema/assets/js/jquery.validate.min.js\"></script>
\t<script src=\"tema/assets/js/neon-login.js\"></script>
\t<!-- JavaScripts initializations and stuff -->
\t<script src=\"tema/assets/js/neon-custom.js\"></script>
\t<script src=\"tema/assets/js/js.cookie.js\"></script>

\t<!-- Demo Settings -->
\t

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "login.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 35,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/* 	<link rel="shortcut icon" href="tema/assets/images/favico.ico" />*/
/* 	<meta charset="utf-8">*/
/* 	<meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />*/
/* 	<meta name="description" content="Sistem Informasi Front Office" />*/
/* 	<meta name="author" content="" />*/
/* 	<title>Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak</title>*/
/* 	<link rel="stylesheet" href="tema/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">*/
/* 	<link rel="stylesheet" href="tema/assets/css/font-icons/entypo/css/entypo.css">*/
/* 	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">*/
/* 	<link rel="stylesheet" href="tema/assets/css/bootstrap.css">*/
/* 	<link rel="stylesheet" href="tema/assets/css/neon-core.css">*/
/* 	<link rel="stylesheet" href="tema/assets/css/neon-theme.css">*/
/* 	<link rel="stylesheet" href="tema/assets/css/neon-forms.css">*/
/* 	<link rel="stylesheet" href="tema/assets/css/custom.css">*/
/* 		<link rel="stylesheet" href="tema/assets/css/skins/facebook.css">*/
/* 	<link id="tema" rel="stylesheet" href="">*/
/* */
/* 	<script src="tema/assets/js/jquery-1.11.0.min.js"></script>*/
/* 	<script>$.noConflict();</script>*/
/* */
/* 	<!--[if lt IE 9]><script src="tema/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->*/
/* */
/* 	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/* 	<!--[if lt IE 9]>*/
/* 		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/* 		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/* 	<![endif]-->*/
/* */
/* */
/* </head>*/
/* <body class="page-body login-page login-form-fall" data-url="{{domain}}">*/
/* */
/* */
/* <!-- This is needed when you send requests via Ajax -->*/
/* <script type="text/javascript">*/
/* var baseurl = '';*/
/* </script>*/
/* */
/* <div class="login-container">*/
/* 	*/
/* 	<div class="login-header login-caret">*/
/* 		*/
/* 		<div class="login-content">*/
/* */
/* 			<a href="/" class="lodgo">*/
/* 							<img src="tema/assets/images/logo.png" width="90" alt="" />*/
/* 			</a>*/
/* 			*/
/* 			<p class="description1">Sistem Informasi Front Office</p>*/
/* 			<p class="description2">Dinas Kependudukan dan Pencatatan Sipil Kota Pontianak</p>*/
/* 			*/
/* */
/* 			*/
/* 			<!-- progress bar indicator -->*/
/* 			<div class="login-progressbar-indicator">*/
/* 				<h3>43%</h3>*/
/* 				<span>logging in...</span>*/
/* 			</div>*/
/* 		</div>*/
/* 		*/
/* 	</div>*/
/* 	*/
/* 	<div class="login-progressbar">*/
/* 		<div></div>*/
/* 	</div>*/
/* 	*/
/* 	<div class="login-form">*/
/* 		*/
/* 		<div class="login-content">*/
/* 			*/
/* 			<div class="form-login-error">*/
/* 				<h3>Login Tidak Valid</h3>*/
/* 				<p>Pastikan Username dan Password anda Benar.</p>*/
/* 			</div>*/
/* 			*/
/* 			<form method="post" role="form" id="form_login">*/
/* 				*/
/* 				<div class="form-group">*/
/* 					*/
/* 					<div class="input-group">*/
/* 						<div class="input-group-addon">*/
/* 							<i class="entypo-user"></i>*/
/* 						</div>*/
/* 						*/
/* 						<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />*/
/* 					</div>*/
/* 					*/
/* 				</div>*/
/* 				*/
/* 				<div class="form-group">*/
/* 					*/
/* 					<div class="input-group">*/
/* 						<div class="input-group-addon">*/
/* 							<i class="entypo-key"></i>*/
/* 						</div>*/
/* 						*/
/* 						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />*/
/* 					</div>*/
/* 				*/
/* 				</div>*/
/* 				*/
/* 				<div class="form-group">*/
/* 					<button type="submit" class="btn btn-primary btn-block btn-login">*/
/* 						<i class="entypo-login"></i>*/
/* 						Login In*/
/* 					</button>*/
/* 				</div>*/
/* 			</form>*/
/* 			*/
/* 			*/
/* 			*/
/* 		</div>*/
/* 		*/
/* 	</div>*/
/* 	*/
/* </div>*/
/* */
/* */
/* 	<!-- Bottom scripts (common) -->*/
/* 	<script src="tema/assets/js/gsap/main-gsap.js"></script>*/
/* 	<script src="tema/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>*/
/* 	<script src="tema/assets/js/bootstrap.js"></script>*/
/* 	<script src="tema/assets/js/joinable.js"></script>*/
/* 	<script src="tema/assets/js/resizeable.js"></script>*/
/* 	<script src="tema/assets/js/neon-api.js"></script>*/
/* 	<script src="tema/assets/js/jquery.validate.min.js"></script>*/
/* 	<script src="tema/assets/js/neon-login.js"></script>*/
/* 	<!-- JavaScripts initializations and stuff -->*/
/* 	<script src="tema/assets/js/neon-custom.js"></script>*/
/* 	<script src="tema/assets/js/js.cookie.js"></script>*/
/* */
/* 	<!-- Demo Settings -->*/
/* 	*/
/* */
/* </body>*/
/* </html>*/
