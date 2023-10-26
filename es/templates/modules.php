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
?>

<!-- loading screen -->
<script type="text/javascript">
document.write('<h1 style="display: none;">moo.ajax, 1.3kb for all your asyncronous needs.</h1>');
document.writeln('<div id="myelementid">');
document.writeln('<img src="templates/images/loading.gif" alt="loading" style="position: fixed; left: 50%; top: 50%;" />');
document.writeln('<div style="z-index: 500; position: fixed; left: 0px; top: 0px; width:100%; height: 100%; background-color:<?php echo $loadingscreencolor; ?>; -moz-opacity: 0.6; opacity:.60; filter: alpha(opacity=60);"></div>');
document.write("</div>");
</script>
<!-- loading screen -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left">
<h1><?php echo $lang[$_GET['module']] ?></h1>
<?php echo WELCOME; ?>, <?php echo $user; ?>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
	<!-- left align -->
	<div align="left">
	
	<?php if (file_exists('modules/'.$_GET['module'].'/'.$_GET['module'].'.html.php')) 
	{ include ('modules/'.$_GET['module'].'/'.$_GET['module'].'.html.php'); } 
	else { include ('modules/error/error.html.php'); } ?>
	
	</div>
	<!-- left align -->
	</td>
  </tr>
</table>
