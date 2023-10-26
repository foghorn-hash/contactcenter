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
include("templates/bluewhite/header.php"); ?>
<div style="height: 10px; background-color: #333366;"></div>
<div id="header">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="42" valign="middle" style="padding-left: 10px; padding-right: 10px;"><h1><?php echo PORTAL; ?></h1></td>
  </tr>
</table>
</div>
<div id="content">
<center>
<br /><br />
<div style="width: 300px; width: 278px; !importan background-color: #EEEEEE; border: 1px #000000 solid; padding: 10px;">
<?php include ("templates/login.php"); ?>
</div>
<br />
</center>
</div>
<?php include("templates/bluewhite/footer.php"); ?>