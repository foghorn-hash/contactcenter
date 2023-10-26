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
if (!isset($_POST['layoutti'])) {$_POST['layoutti'] = "";} // IMPORTANT!!!!!
?>

<center>

<br /> 
<br />

<form action="" method="post" name="login">


<?php if ($layoutselector == 1) { ?>
<select name="layouts" OnChange='<?php echo "location.href=\"logged.php?module=".$_GET['module']."&task=".$_GET['task']."&id=".$_GET['id']."&xid=".$_GET['xid']."&subtask=".$_GET['subtask']."&yid=".$_GET['yid']."&zid=".$_GET['zid']."&layout=".$_GET['layout']."&layout=\"+this.value +\"&lang=".$_GET['lang']."\""; ?>'>
<?php 
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_layouts ORDER BY :layout_id ASC", array('layout_id' => 'layout_id')
);

if (!isset($_GET['layout'])) { $lays = $default_layout; } else { $lays = $_GET['layout']; }
   $i = 1;
	foreach ($result as $field_index => $field_name)
   {
     echo "\n<!-- SELECT $i -->\n";
	  echo "<option value=\"";
       echo (isset($_GET['layout'])) ? "".$field_name['layout_dir']."" : $field_name['layout_dir'];
      echo "\"";
     echo ($field_name['layout_dir'] == $lays)?" SELECTED":"";
    echo ">".$field_name['layout_name']."</option>\n";
	$i++;
   }; 
?>
</select>

 <br /> <br />
 <?php } ?>
<select name="language" OnChange='<?php echo "location.href=\"logged.php?module=".$_GET['module']."&task=".$_GET['task']."&id=".$_GET['id']."&xid=".$_GET['xid']."&subtask=".$_GET['subtask']."&yid=".$_GET['yid']."&zid=".$_GET['zid']."&layout=".$_GET['layout']."&lang=\"+this.value"; ?>'>
<?php 
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_lang ORDER BY :lang_id ASC", array('lang_id' => 'lang_id')
);

if (!isset($_GET['lang'])) { $langs = $default_lang; } else { $langs = $_GET['lang']; }
   $i = 1;
	foreach ($result as $field_index => $field_name)
   {

     echo "\n<!-- SELECT $i -->\n";
	  echo "<option value=\"";
       echo (isset($_GET['lang'])) ? "".$field_name['lang_file']."" : $field_name['lang_file'];
      echo "\"";
     echo ($field_name['lang_file'] == $langs)?" SELECTED":"";
    echo ">".$field_name['lang_name']."</option>\n";
	$i++;
   };
?>
</select>

</form>

</center>

<br />
<br />
