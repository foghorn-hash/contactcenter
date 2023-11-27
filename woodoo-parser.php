<?php 
// Include the configuration file
require('./es/config.inc.php');
/ Define a constant named $secretkey with a value of null
define($secretkey, null);

// Connect to the MySQL database or terminate the script if the connection fails
mysql_connect($dbhost,$dbuser,$dbpasswd) or die ('<center><br /><b>Can not connect to database!</b></center>');
// Select the database or terminate the script if the database is not found
mysql_select_db($database) or die ('<center><br /><b>Database do not found!</b></center>');

// Include the functions file
include ('./es/includes/functions.php');
// Set the default language if none is provided
if (!isset($_GET['lang'])) {$_GET['lang'] = $default_lang;}
// Redirect to the base URL if the language is Finnish or British English
if ($_GET['lang'] == "fi_FI") {header('Location: '.$url_prefix);}
if ($_GET['lang'] == "en_GB") {header('Location: '.$url_prefix);}
// Set the default id if none is provided
if (!isset($_GET['id'])) {$_GET['id'] = 1;}
// Include the language files
include ('./es/languages/'.$_GET['lang'].'.php');
include ('./es/modules/curriculumvitae/lang/'.$_GET['lang'].'.php');
    // Define the pages array
    $pages = Array (
				"frontpage" => "templates/defaultwhite/index.php"
             );
    
	// Set the default page if none is provided
    $page = isset($_GET["page"]) ? $_GET["page"] : $_GET["page"] = "frontpage";

// Execute SQL queries to fetch data from the database
$result1 = mysql_query("SELECT * FROM ".$db_prefix."_cv_workexp WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result2 = mysql_query("SELECT * FROM ".$db_prefix."_cv_courses WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result3 = mysql_query("SELECT * FROM ".$db_prefix."_cv_edu WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result4 = mysql_query("SELECT * FROM ".$db_prefix."_cv_skills WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result5 = mysql_query("SELECT * FROM ".$db_prefix."_cv_hobbies WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result6 = mysql_query("SELECT * FROM ".$db_prefix."_cv_personaldata WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result7 = mysql_query("SELECT * FROM ".$db_prefix."_cv_recommendations WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result8 = mysql_query("SELECT * FROM ".$db_prefix."_cv_references WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");
$result9 = mysql_query("SELECT * FROM ".$db_prefix."_cv_info WHERE lang = '".$_GET['lang']."' AND user_id = ".$_GET['id']." ORDER BY order_id ASC");


    // Include the requested page if it exists, otherwise include the error page
    if (isset($pages[$page]) AND file_exists($pages[$page])){
        include ($pages[$page]);
    } else {
        include ("templates/defaultwhite/error.php");
    }

// Close the MySQL connection
mysql_close( );

?>
