<?php 

/**
 * Teknologiaplaneetta - Enterprise Solution
 *
 * @e-mail     matti.kiviharju@teknologiaplaneetta.com
 *
 * LICENSE: GNU GPL
 *
 * @copyright  2007 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL Version 2
 * @version    $Id$ 1.0.0
 * @link       http://www.teknologiaplaneetta.com
 */ 

if (!defined($secretkey)) { die("Please use index.php!"); } 

startprototype(1);
/* $db = $database;
$user = $dbuser;
$pass = $dbpasswd;
$host = $dbhost;
mysql_connect($host,$user,$pass);
mysql_select_db($db);
$row = 0;
$handle = fopen("osoitteet.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
$row++;


mysql_query("INSERT INTO `es_asiakkaat` ( `asnro` , `toimiala` , `yritys` , `katuosoite` , `pl` , `pnro` , `ptmp` , `puh` , `gsm` , `fax` , `email` , `web` , `muuta` ) VALUES ($data[0] , '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]');");		




}
fclose($handle); */



switch ($_GET['task']) {

default:

  switch ($_GET['subtask']) {
  case 'view':
starttabpane('ccpane1');
starttabpage('Asiakastiedot ja yhtydenotot');
  $result = $db->fetchRow(
    "SELECT * FROM ".$db_prefix."_asiakkaat WHERE asnro = :id",
    array('id' => $_GET['yid'])
); 
    $acl->allow('Administrator');
	$acl->allow('Staff 2');
	$acl->allow('Sales Admin');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") { $dis = ''; } else { $dis = 'disabled '; }
  ?>
  <table border="0" cellspacing="0" cellpadding="0" class="list-table" width="100%">
	<thead>
		<tr>
			<td class="title" width="200">&nbsp;
			
			</td>
			<td class="title">&nbsp;
			
			</td>
		</tr> 
	</thead>
	<tbody>
	<?php
	echo '<tr>'
		.'<td valign="top">'; ?>
		  <form action="" name="adminform" method="post">
    <input type="hidden" name="yid" value="<?php echo $_GET['yid']; ?>" />
	<input type="hidden" name="zid" value="<?php echo $_GET['zid']; ?>" />
	<input type="hidden" name="p" value="<?php echo $_GET['yid']; ?>" />
		<?php echo ''
		.' <strong>Toimiala:</strong> <br /><input type="text" name="up1" value="'.$result['toimiala'].'" '.$dis.'/>'
		.'<br /> <strong>Yritys:</strong> <br /><input type="text" name="up2" value="'.$result['yritys'].'" '.$dis.'/><br /><br /><input name="check" class="button" type="submit" value="Tarkista" '.$dis.'/><br />';
		$yn = $result['yritys'];
		echo '<br /> <strong>Katuosoite:</strong> <br /><input type="text" name="up3" value="'.$result['katuosoite'].'" '.$dis.'/>'
		.'<br /> <strong>PL:</strong> <br /><input type="text" name="up4" value="'.$result['pl'].'" '.$dis.'/>'
		.'<br /> <strong>Postinumero:</strong> <br /><input type="text" name="up5" value="'.$result['pnro'].'" '.$dis.'/>'
		.'<br /> <strong>Postitoimipaikka:</strong> <br /><input type="text" name="up6" value="'.$result['ptmp'].'" '.$dis.'/>'
		.'<br /> <strong>Puhelinnumero:</strong> <br /><input type="text" name="up7" value="'.$result['puh'].'" '.$dis.'/>'
		.'<br /> <strong>GSM:</strong> <br /><input type="text" name="up8" value="'.$result['gsm'].'" '.$dis.'/>'
		.'<br /> <strong>FAX:</strong> <br /><input type="text" name="up9" value="'.$result['fax'].'" '.$dis.'/>'
		.'<br /> <strong>Sähköpostiosoite:</strong> <br /><input type="text" name="up10" value="'.$result['email'].'" '.$dis.'/>'
		.'<br /> <strong>WWW-sivu:</strong> <br /><input type="text" name="up11" value="'.$result['web'].'" '.$dis.'/>'
		.'<br /> <strong>Muuta:</strong> <br /><textarea name="up12" '.$dis.'>'.$result['muuta'].'</textarea><br /> '
		.'<strong>Palvelut:</strong> <br /><textarea name="palvelut" '.$dis.'>'.$result['palvelut']
		.'</textarea><strong>Asiakkuus:</strong> <br />';
		if ($result['asiakkuus'] == 0) {$sele1=" selected";} else {$sele1="";}
		if ($result['asiakkuus'] == 1) {$sele2=" selected";} else {$sele2="";}
		if ($result['asiakkuus'] == 2) {$sele3=" selected";} else {$sele3="";}
		if ($result['asiakkuus'] == 3) {$sele4=" selected";} else {$sele4="";}
		echo '<select name="asiakkuus" '.$dis.'>'
		.'<option value="0"'.$sele1.'>-- Valitse --</option>'
		.'<option value="1"'.$sele2.'>Asiakas</option>'
		.'<option value="2"'.$sele3.'>Tarjottu</option>'
		.'<option value="3"'.$sele4.'>Älä tarjoa </option>'
		.'</select>'
		.'<br /><br /><input name="submityhthlo5" class="button" type="submit" value="Päivitä" '.$dis.'/></form>'
		.'</td><td valign="top"><strong>Yhteydenotot</strong><br />';

$sql = $db->quoteInto(
    "SELECT *
FROM ".$db_prefix."_yhtot
WHERE yhtotnro > ? AND asnro = ".$_GET['yid']." ORDER BY yhtotnro ASC LIMIT 4",
    $_GET['zid']
    
);


$result = $db->query($sql);
$rows = $result->fetchAll();

  $sql = $db->quoteInto(
    "SELECT * FROM ".$db_prefix."_myyjat WHERE myjnro > ? ORDER BY nro ASC",
    0
);

$seller = $db->query($sql);
$sellers = $seller->fetchAll();

  $sql = $db->quoteInto(
    "SELECT * FROM ".$db_prefix."_yhthenk WHERE asnro = ? ORDER BY yhthlonro ASC",
    $_GET['yid']
);

$yhthlo = $db->query($sql);
$yhthlo = $yhthlo->fetchAll();
$a = 1;
 foreach ($rows as $field_index => $field_name)
   {
   if ($a == 1) {$prev = $field_name['yhtotnro'] - 5;}
   echo "<div style=\"border: 1px #ccc solid;\"><input name=\"p".$a."\" type=\"hidden\" value=\"".$field_name['yhtotnro']."\" disabled />"
   ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\"><tr><td valign=\"top\">"
   ."Soitettu<br /><input name=\"y1\" type=\"text\" value=\"".$field_name['soitettu']."\" disabled />"
   ."<br />Seurava yhteydenotto<br /><input name=\"y2\" type=\"text\" value=\"".$field_name['seuraavasoitto']."\" disabled /><br />Myyjä<br />" 
  		. '<select name="seller'.$a.'" disabled>';
		
		foreach ($sellers as $seller_index => $seller_name) {
		
		echo '<option value="'.$seller_name['myjnro'].'"';
		if ($field_name['myjnro'] == $seller_name['myjnro']) { echo "selected"; }
		echo '>'.$seller_name['nimi'].' ('.$seller_name['nro'].')</option>';
		
		}
		
		echo '</select>' 
   . "</td><td valign=\"top\">"
   ."Kiinnostus<br /><textarea name=\"y3\" disabled>".$field_name['kiinostus']."</textarea><br />Yhteyshenkilö<br />" 
  		. '<select name="yhthlo'.$a.'" disabled>';
		
		foreach ($yhthlo as $yhthlo_index => $yhthlo_name) {
		
		echo '<option value="'.$yhthlo_name['yhthlonro'].'"';
		if ($field_name['yhthlonro'] == $yhthlo_name['yhthlonro']) { echo "selected"; }
		echo '>'.$yhthlo_name['etunimi'].' '.$yhthlo_name['sukunimi'].'</option>';
		
		}
		
		echo '</select>' 
		."</td><td valign=\"top\">"
   ."Lisätietoja<br /><textarea name=\"y4\" disabled>".$field_name['lisatietoja']."</textarea></td>"
   ."</tr></table>"
   ."</div>";
   $a++;
   $next = $field_name['yhtotnro'];
   }
?>
		
	<div style="border: 1px #ccc solid; padding:2px; background-color:#FFFFFF;">
	<strong>Lisää yhteydenotto</strong>
	<form action="" name="adminform" method="post">
	<table width="100%" border="1" cellspacing="0" cellpadding="2">
  <tr>
      <td valign="top">
    <input type="hidden" name="yid" value="<?php echo $_GET['yid']; ?>" />
	<input type="hidden" name="zid" value="<?php echo $_GET['zid']; ?>" />
	<input type="hidden" name="myj" value="<?php
		foreach ($sellers as $seller_index => $seller_name) {
		if ($seller_name['user_id'] == $my) { echo $seller_name['myjnro']; }
		}
	?>" />
	Soitettu<br /><input type="text" name="newy1" value="0000-00-00 00:00:00" />
   <br /><br />Seurava soitto<br /><input type="text" name="newy2" value="0000-00-00 00:00:00" />
	<td valign="top">
	Kiinnostus<br /><textarea name="newy3"></textarea></td>
	<td valign="top">
	Lisätietoja<br /><textarea name="newy4"></textarea>
<br /><br />
   <?php 
   
  if (count($yhthlo) == 0) {
   $row = array (
    'asnro'     => $_GET['yid'],
	'etunimi' => 'Ei',
	
);
$table = $db_prefix."_yhthenk";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();
$ei = "<option value=\"1\">Ei</option>";
  } else { $ei = ""; } 
   
     		echo '<select name="yhthlo">';
		
		foreach ($yhthlo as $yhthlo_index => $yhthlo_name) {
		
		echo '<option value="'.$yhthlo_name['yhthlonro'].'"'
		.'>'.$yhthlo_name['etunimi'].' '.$yhthlo_name['sukunimi'].'</option>';
		
		}
		
		echo $ei.'</select>' 
   ?>
   
   </td>
	  </tr>
</table>
    <input name="submityhthlo1" class="button" type="submit" value="Lis&auml;&auml;" />
	</form></div>
	<?php 
	if ($_GET['zid'] > 0) { echo "<a href=\"".$url_prefix."es/logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_GET['yid']."&zid=".$prev."&layout=".$_GET['layout']."&lang=".$_GET['lang']."\"><<</a> | "; }
  if ($a == 5) { echo "<a href=\"".$url_prefix."es/logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_GET['yid']."&zid=".$next."&layout=".$_GET['layout']."&lang=".$_GET['lang']."\">>></a>";	}
		
    echo '</td></tr>';
	?>
	</tbody>
	</table>
	<?php 
	endtabpage();
	starttabpage('Yhteyshekilöt');
			
		
		$ii = count($yhthlo);
	$i = 0;
	echo '<form action="" name="adminform" method="post">';
	starttabpane('yhthe');
  foreach ($yhthlo as $yhthlo_index => $yhthlo_name) {
  if ($i != 0) {
  startsubtabpage($i);
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="2" class="list-table">
	<thead><tr><td><strong>Yhteyshekilöt</strong></td><td>'.$yn.'</td></tr>
	</thead><tbody>
      <tr>
      <td valign="top">
	Etunimi <input type="text" name="etunimi'.$i.'" value="'.$yhthlo_name['etunimi'].'" /> Sukunimi <input type="text" name="sukunimi'.$i.'" value="'.$yhthlo_name['sukunimi'].'" /> <br /><br />Titteli <input type="text" name="titteli'.$i.'" value="'.$yhthlo_name['titteli'].'" /> Puhelin <input type="text" name="puh'.$i.'" value="'.$yhthlo_name['puh'].'" /><br /><br />GSM <input type="text" name="gsm'.$i.'" value="'.$yhthlo_name['gsm'].'" /> FAX <input type="text" name="fax'.$i.'" value="'.$yhthlo_name['fax'].'" /> <br /><br />Sähköposti <input type="text" name="email'.$i.'" value="'.$yhthlo_name['email'].'" /> 
<input type="hidden" name="p'.$i.'" value="'.$yhthlo_name['yhthlonro'].'" />
     </td>
	<td valign="top">
	Lisätietoja:<br /><textarea name="lisatietoja'.$i.'">'.$yhthlo_name['lisatietoja'].'</textarea>
	 <input name="updateyht" class="button" type="submit" value="Päivitä" />
	  </td>
	  </tr></tbody></table>'; 
	  endsubtabpage();
	  }
	  $i++;
	  }
	  endtabpane();
	  echo '<input type="hidden" name="yid" value="'.$_GET['yid'].'" />
	<input type="hidden" name="zid" value="'.$_GET['zid'].'" />
	<input type="hidden" name="ii" value="'.$ii.'" />
	</form>';
	
	?>
	

	<form action="" name="adminform" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="2" class="list-table">
	<thead><tr><td><strong>Lisää yhteyshekilö</strong></td><td><?php echo $yn; ?></td></tr>
	</thead>
  <tr>
      <td valign="top">
    <input type="hidden" name="yid" value="<?php echo $_GET['yid']; ?>" />
	<input type="hidden" name="zid" value="<?php echo $_GET['zid']; ?>" />
	Etunimi <input type="text" name="etunimi" /> Sukunimi <input type="text" name="sukunimi" /> <br /><br />Titteli <input type="text" name="titteli" /> Puhelin <input type="text" name="puh" /><br /><br />GSM <input type="text" name="gsm" /> FAX <input type="text" name="fax" /> <br /><br />Sähköposti <input type="text" name="email" /> 

     </td>
	<td valign="top">
	Lisätietoja:<br /><textarea name="lisatietoja"></textarea>
	<input name="submityhthlo2" class="button" type="submit" value="Lis&auml;&auml;" />
    </td>
	  </tr>
</table>
	</form>
	<?php 
  endtabpage();
  starttabpage('Tuotteet');
	?>
	<form action="" name="adminform" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list-table">
	<thead><tr><td><strong>Lisää tuote</strong></td><td><?php echo $yn; ?></td></tr>
	</thead>
	<tbody>
  <tr>
      <td valign="top">
    <input type="hidden" name="yid" value="<?php echo $_GET['yid']; ?>" />
	<input type="hidden" name="zid" value="<?php echo $_GET['zid']; ?>" />


	<input type="text" name="tuote" />
	<input name="submityhthlo3" class="button" type="submit" value="Lis&auml;&auml;" />
     </td>
	 <td></td>
  </tr>
  </tbody>
</table>
    </form>
	
  <?php
  
  $sql = $db->quoteInto(
    "SELECT *
FROM ".$db_prefix."_tuotteet
WHERE asnro = ? ORDER BY tuotenro ASC",
    $_GET['yid']
);


$result = $db->query($sql);
$rows = $result->fetchAll();
$ii = count($rows);
if ($ii > 0) { 
?><div style="border: 1px #ccc solid; padding:10px; background-color:#FFFFFF;">
<form action="" name="adminform" method="post">
    <input type="hidden" name="yid" value="<?php echo $_GET['yid']; ?>" />
	<input type="hidden" name="zid" value="<?php echo $_GET['zid']; ?>" />
	<input type="hidden" name="ii" value="<?php echo $ii; ?>" />
	    
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="1%">#</td>
    <td>Tuote</td>
  </tr>
<?php 
$i = 1;
foreach ($rows as $field_index => $field_name) {
  echo "<tr>
    <td>".$field_name['tuotenro']."</td>
    <td><input name=\"tuote".$i."\" type=\"text\" value=\"".$field_name['tuote']."\" $dis/>
	<input type=\"hidden\" name=\"p".$i."\" value=\"".$field_name['tuotenro']."\" />
	</td>
  </tr>";
  $i++;
}
?>
</table>
<input name="submityhthlo4" class="button" type="submit" value="Päivitä" <?php echo $dis; ?>/>
</form>
</div><?php }

 endtabpage();
 endtabpane();
  break;
  default;
  
  /* 
  * default case of Contact Center
  */ 
  
if (!isset($_POST['yns']) && !isset($_POST['next'])) {

  $sql = $db->quoteInto(
    "SELECT *
FROM ".$db_prefix."_asiakkaat
WHERE asnro > ? ORDER BY asnro ASC LIMIT 50",
    $_GET['id']
	);  
	
$result = $db->query($sql);
$rows = $result->fetchAll();

} else if (isset($_POST['yns'])) {

  $sql = $db->quoteInto(
    "SELECT *
FROM ".$db_prefix."_asiakkaat
WHERE ".$_POST['method']." LIKE ? ORDER BY asnro ASC LIMIT 50",
    '%'.stripslashes($_POST['yn']).'%'
    );  
	
$result = $db->query($sql);
$rows = $result->fetchAll();
	
 } else if (isset($_POST['next'])) {
 
$result = $db->fetchAll(
    "SELECT * FROM ".$db_prefix."_asiakkaat WHERE asnro > :id AND ".$_POST['method']." LIKE :md ORDER BY asnro ASC LIMIT 50",
    array('id' => $_POST['sid'], 'md' => "%".stripslashes($_POST['yn'])."%")
); 

$rows = $result;

	}




$sql = $db->quoteInto(
    "SELECT * FROM ".$db_prefix."_myyjat WHERE myjnro > ? ORDER BY nro ASC",
    0
);

$seller = $db->query($sql);
$sellers = $seller->fetchAll();
	starttabpane('customersfront');
	starttabpage('Asiakkaat');
$x = 1;

if (isset($_POST['yns']) || isset($_POST['next'])) {

foreach ($rows as $field_index => $field_name)
   {

if ($x == 50) { $nexts = " <input type=\"hidden\" name=\"sid\" value=\"".$field_name['asnro']."\" /> <input name=\"next\" type=\"submit\" class=\"button\" value=\">>\" />"; } else {
$nexts = "<input type=\"hidden\" name=\"sid\" value=\"".$field_name['asnro']."\" />";
}

$x++;
} } else { $nexts = "<input type=\"hidden\" name=\"sid\" value=\"0\" />"; }

$oid = count($rows) + 1;
$nr = count($rows);
$a = 1;
$acl->allow('Administrator');
	$acl->allow('Staff 2');
	$acl->allow('Sales Admin');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") {
if (!isset($_POST['method'])) { $_POST['method'] = "yritys"; }
if (!isset($_POST['yn'])) { $_POST['yn'] = stripslashes(""); }
if ($_POST['method'] == "yritys") {$did1="selected";} else {$did1="";}
if ($_POST['method'] == "toimiala") {$did2="selected";} else {$did2="";}
if ($_POST['method'] == "ptmp") {$did3="selected";} else {$did3="";}
echo "<form action=\"\" method=\"post\" name=\"adminform\"><div style=\"float:left;\">"
."<input name=\"submitnew\" type=\"submit\" value=\""._new."\" class=\"button\" />"
."</div><div style=\"float:left;\">"
."&nbsp;<select name=\"method\">"
."<option value=\"yritys\"".$did1.">Yritys</option>"
."<option value=\"toimiala\"".$did2.">Toimiala</option>"
."<option value=\"ptmp\"".$did3.">Postitoimipaikka</option>"
."</select> <input type=\"text\" name=\"yn\" size=\"30\"  value=\""
.stripslashes($_POST['yn'])."\" />"
." <input name=\"yns\" type=\"submit\" value=\"Hae\" class=\"button\" />"
.$nexts
."</div></form>"; }
echo "\n<form action=\"logged.php?module=contactcenter&amp;task=none&amp;id=".$_GET['id']."&amp;xid=0&amp;subtask=fupdate&amp;yid=".$nr."&amp;zid=0&amp;layout=".$_GET['layout']."&amp;lang=".$_GET['lang']."\" method=\"post\" name=\"adminform\">"
."<div align=\"right\" style=\"float: both;\">"
."<input name=\"submit\" type=\"submit\" value=\""._update."\" class=\"button\" />"
."</div><div style=\"clear: both;\"></div><br />"
 ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"list-table\" width=\"100%\">"
 ."<thead>"
 ."<tr>"
 ."<td>#</td>"
 ."<td>Toimiala</td>"
 ."<td>Yritys</td>"
 ."<td>Postitomipaikka</td>"
 ."<td width=\"20%\">Palvelut</td>"
 ."<td>Asiakkuus</td>"
 ."<td>Myyjä</td>"
 ."</tr>"
 ."</thead>"
 ."<tbody>\n\n";
 
 foreach ($rows as $field_index => $field_name)
   {
	   
if (is_integer($a/2)) { $class = "table-first"; } else { $class = "table-second"; }
if ($a == 1) {$prev = $field_name['asnro'] - 51;}
echo "<tr>"
."<td class=\"$class\" valign=\"top\">".$field_name['asnro']
."<input name=\"p".$a."\" type=\"hidden\" value=\"".$field_name['asnro']."\" />"
."</td>"
."<td class=\"$class\" valign=\"top\">".$field_name['toimiala']."</td>"
."<td class=\"$class\" valign=\"top\">"
.'<a href="'.$url_prefix.'es/logged.php?module=contactcenter&amp;task=none&amp;id=0&amp;xid=0&amp;subtask=view&amp;yid='.$field_name['asnro'].'&amp;zid=0&amp;layout='.$_GET['layout'].'&amp;lang='.$_GET['lang'].'">'.$field_name['yritys'].'</a>'
."</td>"
."<td class=\"$class\" valign=\"top\">".$field_name['ptmp']."</td>"
."<td class=\"$class\" valign=\"top\">".$field_name['palvelut']."</td>"
."<td class=\"$class\" valign=\"top\">";

		if ($field_name['asiakkuus'] == 0) {$sele1=" selected";} else {$sele1="";}
		if ($field_name['asiakkuus'] == 1) {$sele2=" selected";} else {$sele2="";}
		if ($field_name['asiakkuus'] == 2) {$sele3=" selected";} else {$sele3="";}
		if ($field_name['asiakkuus'] == 3) {$sele4=" selected";} else {$sele4="";}
		echo '<select name="asiakkuus" disabled>'
		.'<option value="0"'.$sele1.'>-- Ei ole määritetty --</option>'
		.'<option value="1"'.$sele2.'>Asiakas</option>'
		.'<option value="2"'.$sele3.'>Tarjottu</option>'
		.'<option value="3"'.$sele4.'>Älä tarjoa </option>'
		.'</select>';

echo "</td>"
."<td class=\"$class\" valign=\"top\">";

$result = $db->fetchRow(
    "SELECT asnro, myjnro FROM ".$db_prefix."_asiakkaat WHERE asnro = :id",
    array('id' => $field_name['asnro'])
);
if ($result['myjnro'] == 1) {$mj = "";} else {$mj = "disabled";}
echo '<select name="seller'.$a.'" '.$mj.'>';
		
		foreach ($sellers as $seller_index => $seller_name) {
		
		echo '<option value="'.$seller_name['myjnro'].'"';
		if ($field_name['myjnro'] == $seller_name['myjnro']) { echo "selected"; }
		echo '>'.$seller_name['nimi'].' ('.$seller_name['nro'].')</option>';
		
		}
		
		echo '</select>';
		
		if ($mj == "disabled") { echo '<input type="hidden" name="seller'
		.$a.'" value="'.$field_name['myjnro'].'" />'; }
		
echo "</td>"
."</tr>\n\n";
	
$a++;
$next = $field_name['asnro'];
    }
	

  echo "\n\n</tbody></table></form>";
  
  if (!isset($_POST['yns'])) {
  if ($_GET['id'] > 0) { echo "<a href=\"".$url_prefix."es/logged.php?module=contactcenter&task=none&id=".$prev."&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']."\"><<</a> "; }
  
 }
 
 if (!isset($_POST['yns'])) { if ($a == 51) { $nextlink = "<a href=\"".$url_prefix."es/logged.php?module=contactcenter&task=none&id=".$next."&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']."\">>></a>"; } }
  

  
    $sql = $db->quoteInto(
    "SELECT *
FROM ".$db_prefix."_asiakkaat
WHERE asnro > ? ORDER BY asnro ASC",
    0
);


$result = $db->query($sql);
$rows = $result->fetchAll();

  $i = 1;
  $ii = count($rows);
    echo "<a href=\"".$url_prefix."es/logged.php?module=contactcenter&task=none&id="
  ."0&xid=0&subtask=default&yid=0&zid=0&layout="
  .$_GET['layout']."&lang=".$_GET['lang']."\">"
  .'1-50</a> ';
   while ($i < $ii) {
   
  if (is_integer($i / 50)) { 
  $a = $i + 50;
  $b = $i + 1;
  echo "<a href=\"".$url_prefix."es/logged.php?module=contactcenter&task=none&id="
  .$i."&xid=0&subtask=default&yid=0&zid=0&layout="
  .$_GET['layout']."&lang=".$_GET['lang']."\">"
  .$b.'-'.$a.'</a> '; 
  }
  
  $i++;
  
  }
 
 if (!isset($_POST['yns'])) {
if (!isset($nextlink)) { $nextlink = ""; }
 echo $nextlink; }
 
     if ($a == 51) { $nextlink = "<a href=\"".$url_prefix."es/logged.php?module=contactcenter&task=none&id=".$next."&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']."\">>></a>"; } 
  
  endtabpage();
  starttabpage('Yhteydenotot');
    $sql = $db->quoteInto(
    "SELECT * FROM ".$db_prefix."_yhtot WHERE yhtotnro > ? ORDER BY yhtotnro DESC LIMIT 50",
    0
);

$yht = $db->query($sql);
$yht  = $yht->fetchAll();
 foreach ($yht as $field_index => $field_name)
   {
   echo "<div style=\"border: 1px #ccc solid;\">";
$result = $db->fetchRow(
    "SELECT * FROM ".$db_prefix."_asiakkaat WHERE asnro = :id",
    array('id' => $field_name['asnro'])
);
   echo "<input name=\"p".$a."\" type=\"hidden\" value=\"".$field_name['yhtotnro']."\" disabled />"
   ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\"><tr><td valign=\"top\">"
.'<a href="'.$url_prefix.'es/logged.php?module=contactcenter&amp;task=none&amp;id=0&amp;xid=0&amp;subtask=view&amp;yid='.$result['asnro'].'&amp;zid=0&amp;layout='.$_GET['layout'].'&amp;lang='.$_GET['lang'].'">'.$result['yritys'].'</a><br />'
   ."Soitettu<br /><input name=\"y1\" type=\"text\" value=\"".$field_name['soitettu']."\" disabled />"
   ."<br />Seurava yhteydenotto<br /><input name=\"y2\" type=\"text\" value=\"".$field_name['seuraavasoitto']."\" disabled /><br />Myyjä<br />" 
  		. '<select name="seller'.$a.'" disabled>';
		
		foreach ($sellers as $seller_index => $seller_name) {
		
		echo '<option value="'.$seller_name['myjnro'].'"';
		if ($field_name['myjnro'] == $seller_name['myjnro']) { echo "selected"; }
		echo '>'.$seller_name['nimi'].' ('.$seller_name['nro'].')</option>';
		
		}
		
		echo '</select>' 
   . "</td><td valign=\"top\">"
   ."Kiinnostus<br /><textarea name=\"y3\" disabled>".$field_name['kiinostus']."</textarea><br />Yhteyshenkilö<br />";
 
    $sql = $db->quoteInto(
    "SELECT * FROM ".$db_prefix."_yhthenk WHERE asnro = ? ORDER BY yhthlonro ASC",
    $field_name['asnro']
);

$yhthlo = $db->query($sql);
$yhthlo = $yhthlo->fetchAll(); 
   
  		echo '<select name="yhthlo'.$a.'" disabled>';
		
		foreach ($yhthlo as $yhthlo_index => $yhthlo_name) {
		
		echo '<option value="'.$yhthlo_name['yhthlonro'].'"';
		if ($field_name['yhthlonro'] == $yhthlo_name['yhthlonro']) { echo "selected"; }
		echo '>'.$yhthlo_name['etunimi'].' '.$yhthlo_name['sukunimi'].'</option>';
		
		}
		
		echo '</select>' 
		."</td><td valign=\"top\">"
   ."Lisätietoja<br /><textarea name=\"y4\" disabled>".$field_name['lisatietoja']."</textarea></td>"
   ."</tr></table>"
   ."</div>";
   }
  endtabpage();
  endtabpane();
   break;
  }
  break;
  }
endprototype(1);

?>

