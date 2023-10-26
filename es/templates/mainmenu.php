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

$rows = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_modules WHERE active = :active", array('active' => 1)
);

// mainmenu

echo '<ul id="mainmenu">';

foreach ($rows as $field_index => $field_name)
   {
     echo '<li><a href="logged.php?module='.$field_name['module_var'].'&task=none&id=0&xid=0&subtask=default&yid=0&zid=0&layout='.$_GET['layout'].'&lang='.$_GET['lang'].'" class="mainmenu"';
	  echo ($_GET['module'] == $field_name['module_var']) ? " id=\"active_menu\"" : "";
	 echo '>';
	 echo $lang[$field_name['module_var']];
	 echo '</a></li>';
   };
echo '<li><a href="logged.php?module=logout&task=none&id=1&xid=1&subtask=default&yid=0&zid=0&layout='.$_GET['layout'].'&lang='.$_GET['lang'].'" class="mainmenu"';
 echo ($_GET['module'] == "logout") ? " id=\"active_menu\"" : "";
echo '>'.$lang['logout'].'</a></li></ul>';

?>