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
if (!isset($_GET['layout'])) {$_GET['layout'] = $default_layout;} // IMPORTANT!!!!!
if (!isset($_GET['lang'])) {$_GET['lang'] = $default_lang;} // IMPORTANT!!!!!

if (file_exists('languages/'.$_GET['lang'].'.php')) 
{ include ('languages/'.$_GET['lang'].'.php'); }
else { $_GET['lang'] = $default_lang;
include ('languages/'.$default_lang.'.php'); }

include ('includes/login.php');

if (file_exists('templates/'.$_GET['layout'].'/login.php')) 
{ include ('templates/'.$_GET['layout'].'/login.php'); }
else { $_GET['layout'] = $default_layout;
include ('templates/'.$default_layout.'/login.php'); }

?>