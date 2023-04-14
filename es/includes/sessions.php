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

if (!defined($secretkey)) { die("Please use index.php!"); }

// session start
session_start();
$sid = session_id();
define($sid, null);
$_SESSION['sid'] = $sid;
if (isset($_SESSION['sid'])) { 
if ($_SESSION['sid'] != $sid) 
{ 
session_destroy();
redirect ("index.php"); 
# Exit is important
ob_clean();
exit();
}
}

if (!isset($_SESSION['sid'])) { 
session_destroy();
redirect ("index.php");
# Exit is important
ob_clean();
exit(); 
}

?>