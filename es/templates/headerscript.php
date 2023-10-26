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

echo "<script type=\"text/javascript\" src=\"".$url_prefix."es/includes/js/mootools/js/mootools.v1.1.1.js\"></script> \n\n";

?>



<?php 
    if (isset($_SESSION['sid'])) {
	echo "\n <script type=\"text/javascript\"> \n
				
				
		window.onload = function(e){ \n
		
		

			
				e = new Event(e).stop();
 
	var url = \"".$url_prefix."es/logged.php?module=".$_GET['module']."&task=".$_GET['task']."&id=".$_GET['id']."&xid=".$_GET['xid']."&subtask=".$_GET['subtask']."&yid=".$_GET['yid']."&zid=".$_GET['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']."\";
 
	/**
	 * The simple way for an Ajax request, use onRequest/onComplete/onFailure
	 * to do add your own Ajax depended code.
	 */
	new Ajax(url, {
		method: \"get\",
		clean: $(\"myelementid\")
	}).request();
	
		} \n
     </script> \n"; }
	 	 
	    if (isset($_SESSION['sid'])) {
	echo "\n  <script type=\"text/javascript\"> \n
				
				
		window.addEvent('domready', function(){
	$(\"reqTrigger\").addEvent(\"click\", function(a) {
	a = new Event(a).stop(); \n
		
		

			

	var url = \"".$url_prefix."es/ajax.php?module=".$_GET['module']."&task=".$_GET['task']."&id=".$_GET['id']."&xid=".$_GET['xid']."&subtask=".$_GET['subtask']."&yid=".$_GET['yid']."&zid=".$_GET['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']."\";
 
	/**
	 * The simple way for an Ajax request, use onRequest/onComplete/onFailure
	 * to do add your own Ajax depended code.
	 */ 
	new Ajax(url, {
	    encoding: \"iso-8859-1\",
		method: \"get\",
		update: $(\"targetPanel\")
	}).request();
	
		});		}); \n
     </script> \n "; } 
	 
	 
	 
	// tabpane
echo "\n<script type=\"text/javascript\" src=\"".$url_prefix."es/includes/js/tabpane/js/tabpane.js\"></script>\n<link type=\"text/css\" rel=\"StyleSheet\" href=\"".$url_prefix."es/templates/".$_GET['layout']."/css/tabpane.css\" />\n";
	// end 
 ?>
 

	
	<style type="text/css">
	
	.tool-tip {
	color: #fff;
	width: 139px;
	z-index: 13000;
}
 
.tool-title {
	font-weight: bold;
	font-size: 11px;
	margin: 0;
	color: #9FD4FF;
	padding: 8px 8px 4px;
	background: url(templates/images/bubble.png) top left;
}
 
.tool-text {
    color: #fff;
	font-size: 11px;
	padding: 4px 8px 8px;
	background: url(templates/images/bubble.png) bottom right;
}


	</style>