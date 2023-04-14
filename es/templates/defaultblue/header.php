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

if (!defined($secretkey)) { die("Please use index.php!"); } ?>
<?php define("PORTAL", $portal_name, true); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo PORTAL; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo $url_prefix; ?>es/templates/defaultblue/css/stylesheet.css" rel="stylesheet" type="text/css" />
<?php include ("templates/headerscript.php"); ?>
</head>

<body>