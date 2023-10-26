<?php 

require('./es/config.inc.php');
define($secretkey, null);

mysql_connect($dbhost,$dbuser,$dbpasswd) or die ('<center><br /><b>Can not connect to database!</b></center>');
mysql_select_db($database) or die ('<center><br /><b>Database do not found!</b></center>');

include ('./es/includes/functions.php');

if (!isset($_GET['lang'])) {$_GET['lang'] = $default_lang;}
if ($_GET['lang'] == "fi_FI") {header('Location: '.$url_prefix);}
if ($_GET['lang'] == "en_GB") {header('Location: '.$url_prefix);}
if (!isset($_GET['id'])) {$_GET['id'] = 1;}

include ('./es/languages/'.$_GET['lang'].'.php');
include ('./es/modules/curriculumvitae/lang/'.$_GET['lang'].'.php');

    $pages = Array (
				"frontpage" => "templates/defaultwhite/index.php"
             );
    
	
    $page = isset($_GET["page"]) ? $_GET["page"] : $_GET["page"] = "frontpage";


$result1 = mysql_query("SELECT * FROM ".$db_prefix."_cv_workexp WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result2 = mysql_query("SELECT * FROM ".$db_prefix."_cv_courses WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result3 = mysql_query("SELECT * FROM ".$db_prefix."_cv_edu WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result4 = mysql_query("SELECT * FROM ".$db_prefix."_cv_skills WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result5 = mysql_query("SELECT * FROM ".$db_prefix."_cv_hobbies WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result6 = mysql_query("SELECT * FROM ".$db_prefix."_cv_personaldata WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result7 = mysql_query("SELECT * FROM ".$db_prefix."_cv_recommendations WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result8 = mysql_query("SELECT * FROM ".$db_prefix."_cv_references WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result9 = mysql_query("SELECT * FROM ".$db_prefix."_cv_info WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");



    if (isset($pages[$page]) AND file_exists($pages[$page])){
        include ($pages[$page]);
    } else {
        include ("templates/defaultwhite/error.php");
    }


mysql_close( );

?>
