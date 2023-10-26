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
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="250">

<div align="left">

<b><?php echo LOGINFORM; ?></b>



<br />
<?php 
if (!isset($msg)) {$msg = "";} else {
echo "<i style=\"color: red;\">".$msg."</i>"; }?>
<br />

<form action="" method="post" name="login">

<?php echo USERNAME; ?>:&nbsp;
<br />
<input type="text" name="username" size="25" />
<br /><br />

<?php echo PASSWORD; ?>:&nbsp;
<br />
<input type="password" name="password" size="25" />
<?php if ($layoutselector == 1) { ?>
<br /><br />
<?php echo TEMPLATE; ?>:
<br />
<select name="layouts" OnChange='<?php echo "location.href=\"index.php?layout=\"+this.value +\"&lang=".$_GET['lang']."\""; ?>'>
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
</select> <?php } ?>
<br />
<br />

<?php echo LANGUAGE; ?>:
<br />
<select name="language" OnChange='<?php echo "location.href=\"index.php?layout=".$_GET['layout']."&lang=\"+this.value"; ?>'>
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
<br />
<br />

<input type="submit" name="Login!" value="<?php echo LOGIN; ?>" />
</form>
<br />
<br />
</div>

    </td>
  </tr>
</table>

</center>
