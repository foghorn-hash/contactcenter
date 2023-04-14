<?php 

/**
 * Teknologiaplaneetta - Enterprise Solution
 *
 * LICENSE: Open Source (GNU GPL)
 *
 * @copyright  2007 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL Version 2
 * @version    $Id$ 1.0.0
 * @link       http://www.teknologiaplaneetta.com
 */ 

require('config.inc.php');
define($secretkey, null);
require('includes/db.php');
include ('includes/functions.php');
include ('includes/sessions.php');
require_once 'Zend/Acl.php';
$acl = new Zend_Acl();
require_once 'Zend/Acl/Role.php';

  $sql = $db->quoteInto(
    "SELECT * FROM ".$db_prefix."_acl 
	WHERE acl_id > ? ORDER BY order_id DESC",
    0
);

$result = $db->query($sql);
$rows = $result->fetchAll();

 foreach ($rows as $field_index => $field_name)
   {
   if ($field_name['inherit'] != "none") {
    $acl->addRole(new Zend_Acl_Role($field_name['role']), 
	$field_name['inherit']); 
    } else {
    $acl->addRole(new Zend_Acl_Role($field_name['role']));
    }

   }

if (!isset($_SESSION['user'])) 
{ session_destroy(); 
redirect ("index.php"); 
# Exit is important
ob_clean();
exit();
}

$username = $_SESSION['user'];

$result = $db->fetchRow(
    "SELECT * FROM ".$db_prefix."_users 
	WHERE username = :username",
    array('username' => $username)
);

$user = $result['firstname']." "
.$result['lastname'];
$my = $result['user_id'];
$un = $result['username'];

$result = $db->fetchRow(
    "SELECT * FROM ".$db_prefix."_acl WHERE 
	acl_id = :id",
    array('id' => $result['userlevel'])
);

$lvl = $result['role']; 

if (!isset($_GET['layout'])) {
$_GET['layout'] = $default_layout;} // IMPORTANT!!!!!
if (!isset($_GET['lang'])) {
$_GET['lang'] = $default_lang;} // IMPORTANT!!!!!

if (file_exists('languages/'.$_GET['lang'].'.php'))
{ include ('languages/'.$_GET['lang'].'.php'); }
else { $_GET['lang'] = $default_lang;
include ('languages/'.$default_lang.'.php'); }


$rows  = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_modules WHERE 
active = :active", array('active' => 1)
);

   foreach ($rows as $field_index => $field_name)
   {
       if (file_exists('modules/'.$field_name['module_var']
	   .'/lang/'.$_GET['lang'].'.mod.php'))
       { include ('modules/'.$field_name['module_var']
	   .'/lang/'.$_GET['lang'].'.mod.php'); }
       else { // $_GET['lang'] = $default_lang;
       include ('modules/'.$field_name['module_var']
	   .'/lang/'.$default_lang.'.mod.php'); }
   };
   
          if (file_exists('modules/admin/lang/'
		  .$_GET['lang'].'.mod.php'))
       { include ('modules/admin/lang/'.$_GET['lang']
	   .'.mod.php'); }
       else { // $_GET['lang'] = $default_lang;
       include ('modules/admin/lang/'.$default_lang
	   .'.mod.php'); }
	   
	             if (file_exists('modules/error/lang/'
				 .$_GET['lang'].'.mod.php'))
       { include ('modules/error/lang/'.$_GET['lang']
	   .'.mod.php'); }
       else { // $_GET['lang'] = $default_lang;
       include ('modules/error/lang/'.$default_lang
	   .'.mod.php'); }
	   
	   	             if (file_exists('modules/logout/lang/'
					 .$_GET['lang'].'.mod.php'))
       { include ('modules/logout/lang/'.$_GET['lang']
	   .'.mod.php'); }
       else { // $_GET['lang'] = $default_lang;
       include ('modules/logout/lang/'.$default_lang
	   .'.mod.php'); }

if (file_exists('modules/'.$_GET['module'].'/ajax-'
.$_GET['module'].'.php')) 
{ include ('modules/'.$_GET['module'].'/ajax-'
.$_GET['module'].'.php'); }
else { $_GET['module'] = "error";
include ('modules/error/ajax-error.php'); }

include ('includes/functions.html.php');

if (file_exists('modules/'.$_GET['module']
.'/ajax-'.$_GET['module'].'.html.php')) 
{ include ('modules/'.$_GET['module']
.'/ajax-'.$_GET['module'].'.html.php'); }
else { $_GET['module'] = "error";
include ('modules/error/ajax-error.html.php'); }

?>