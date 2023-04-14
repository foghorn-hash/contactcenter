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

include("templates/defaultblue/header.php"); ?>

<div style="height: 10px; background-color: #333366;"></div>
<div id="header">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="42" valign="middle" style="padding-left: 10px; padding-right: 10px;"><h1><?php echo PORTAL; ?></h1></td>    <td align="center" valign="top" width="400"><?php include("templates/adminmenu.php"); ?></td>
  </tr>
</table>
</div>
<div id="menu">
<?php include("templates/mainmenu.php"); ?>
</div>
<div id="content">
<center>
<?php include("templates/modules.php"); ?>
</center>
</div>
<?php 
include("templates/logged.php");
include("templates/defaultblue/footer.php"); 
?>
