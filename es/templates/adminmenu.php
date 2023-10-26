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

  $acl->allow('Administrator');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") {
echo '<ul id="adminmenu">';
// manu
echo '<li><a href="logged.php?module=admin&task=none&id=0&xid=0&subtask=default&yid=0&zid=0&layout='.$_GET['layout'].'&lang='.$_GET['lang'].'" class="adminmenu"';
if ($_GET['module'] == "admin") {echo ' id="active_menu_admin"'; }
echo '>'.$lang['admin'].'</a></li>';



echo '</ul>';
}

?>
