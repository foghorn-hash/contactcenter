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

if (!defined($secretkey)) { die ("Please use index.php!"); }
$nexts = "";
$prev = "";
if (file_exists('modules/contactcenter/lang/'.$_GET['lang'].'.php'))
{ include ('modules/contactcenter/lang/'.$_GET['lang'].'.php'); }
else { $_GET['lang'] = $default_lang;
include ('modules/contactcenter/lang/'.$default_lang.'.php'); }

$acl->allow('Administrator');
$acl->allow('Staff 2');
$access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") {

$links = "<a href=\"".$url_prefix."es/logged.php?&module=contactcenter&task=none&id=0&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']."\">"._contactcenter."</a>"; } else {

$links = "<a href=\"".$url_prefix."es/logged.php?&module=contactcenter&task=none&id=0&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']."\">"._contactcenter."</a>";

}

switch ($_GET['task']) {

  
  default:
if (isset($_POST['submitnew'])) {
$acl->allow('Administrator');
	$acl->allow('Staff 2');
	$acl->allow('Sales Admin');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") {
    $sql = $db->quoteInto("SELECT *
FROM ".$db_prefix."_asiakkaat
WHERE asnro > ? ORDER BY asnro DESC",
    0
);


$result = $db->query($sql);
$rows = $result->fetchAll();
$yid = $rows[0]['asnro'];
$yid++;
  $row = array (
    'yritys'     => stripslashes('(työn alla)'),
);
$table = $db_prefix."_asiakkaat";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$yid."&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
}
  if (isset($_POST['submityhthlo1'])) {
  $row = array (
    'asnro'     => stripslashes($_POST['yid']),
    'myjnro' => stripslashes($_POST['myj']),
	'yhthlonro' => stripslashes($_POST['yhthlo']),
	'soitettu' => stripslashes($_POST['newy1']),
	'seuraavasoitto' => stripslashes($_POST['newy2']),
	'kiinostus' => stripslashes($_POST['newy3']),
	'lisatietoja' => stripslashes($_POST['newy4']),
);
$table = $db_prefix."_yhtot";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_POST['yid']."&zid=".$_POST['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
if (isset($_POST['submityhthlo2'])) {
  $row = array (
    'asnro'     => stripslashes($_POST['yid']),
	'etunimi' => stripslashes($_POST['etunimi']),
	'sukunimi' => stripslashes($_POST['sukunimi']),
	'titteli' => stripslashes($_POST['titteli']),
	'puh' => stripslashes($_POST['puh']),
	'gsm' => stripslashes($_POST['gsm']),
	'fax' => stripslashes($_POST['fax']),
	'email' => stripslashes($_POST['email']),
	'lisatietoja' => stripslashes($_POST['lisatietoja']),
);
$table = $db_prefix."_yhthenk";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_POST['yid']."&zid=".$_POST['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
if (isset($_POST['submityhthlo3'])) {
  $row = array (
    'asnro'     => stripslashes($_POST['yid']),
	'tuote' => stripslashes($_POST['tuote']),
);
$table = $db_prefix."_tuotteet";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_POST['yid']."&zid=".$_POST['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
if (isset($_POST['submityhthlo4'])) {
$acl->allow('Administrator');
	$acl->allow('Staff 2');
	$acl->allow('Sales Admin');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") {
$ii = $_POST['ii'];
$ii++;
$i = 1;
while ($i < $ii) {
$set = array (
    'tuote' => stripslashes($_POST['tuote'.$i]),
);
$table = $db_prefix.'_tuotteet';
$where = $db->quoteInto('`'.$db_prefix.'_tuotteet`.`tuotenro` = ?', $_POST['p'.$i]);
 
$rows_affected = $db->update($table, $set, $where);

$i++;
}
redirect("logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_POST['yid']."&zid=".$_POST['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
}


if (isset($_POST['updateyht'])) {
$acl->allow('Administrator');
	$acl->allow('Staff 2');
	$acl->allow('Sales Admin');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") {
$ii = $_POST['ii'];
$i = 0;
while ($i < $ii) {
 if ($i != 0) {
 
$set = array (
	'etunimi' => stripslashes($_POST['etunimi'.$i]),
	'sukunimi' => stripslashes($_POST['sukunimi'.$i]),
	'titteli' => stripslashes($_POST['titteli'.$i]),
	'puh' => stripslashes($_POST['puh'.$i]),
	'gsm' => stripslashes($_POST['gsm'.$i]),
	'fax' => stripslashes($_POST['fax'.$i]),
	'email' => stripslashes($_POST['email'.$i]),
	'lisatietoja' => stripslashes($_POST['lisatietoja'.$i]),
);
$table = $db_prefix.'_yhthenk';
$where = $db->quoteInto('`'.$db_prefix.'_yhthenk`.`yhthlonro` = ?', $_POST['p'.$i]);
 
$rows_affected = $db->update($table, $set, $where);
}
$i++;
}
redirect("logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_POST['yid']."&zid=".$_POST['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
}


if (isset($_POST['check'])) { 

$sql = $db->quoteInto(
    "SELECT *
FROM ".$db_prefix."_asiakkaat
WHERE yritys = ? ORDER BY asnro ASC",
    stripslashes($_POST['up2'])
);


$result = $db->query($sql);
$rows = $result->fetchAll();


$alert = "<script type=\"text/javascript\"> alert('Yritystä on ".count($rows)." kappaletta tietokannassa!'); </script>";

}


if (isset($_POST['submityhthlo5'])) {

$acl->allow('Administrator');
	$acl->allow('Staff 2');
	$acl->allow('Sales Admin');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") {
$ii = 2;
$i = 1;

while ($i < $ii) {
$set = array (
    'toimiala' => stripslashes($_POST['up1']),
	'yritys' => stripslashes($_POST['up2']),
	'katuosoite' => stripslashes($_POST['up3']),
	'pl' => stripslashes($_POST['up4']),
	'pnro' => stripslashes($_POST['up5']),
	'ptmp' => stripslashes($_POST['up6']),
	'puh' => stripslashes($_POST['up7']),
	'gsm' => stripslashes($_POST['up8']),
	'fax' => stripslashes($_POST['up9']),
	'email' => stripslashes($_POST['up10']),
	'web' => stripslashes($_POST['up11']),
	'muuta' => stripslashes($_POST['up12']),
	'asiakkuus' => stripslashes($_POST['asiakkuus']),
	'palvelut' => stripslashes($_POST['palvelut']),
);
$table = $db_prefix.'_asiakkaat';
$where = $db->quoteInto('`'.$db_prefix.'_asiakkaat`.`asnro` = ?', $_POST['p']);
 
$rows_affected = $db->update($table, $set, $where);

$i++;
}
redirect("logged.php?module=contactcenter&task=none&id=0&xid=0&subtask=view&yid=".$_POST['yid']."&zid=".$_POST['zid']."&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
}
switch ($_GET['subtask']) {
  case 'fupdate':


$ii = $_GET['yid'];
$ii++;
$i = 1;
while ($i < $ii) {
$result = $db->fetchRow(
    "SELECT asnro, myjnro FROM ".$db_prefix."_asiakkaat WHERE asnro = :id",
    array('id' => $_POST['p'.$i])
);
$set = array (
    'myjnro' => stripslashes($_POST['seller'.$i])
);
$table = $db_prefix.'_asiakkaat';
$where = $db->quoteInto('`'.$db_prefix.'_asiakkaat`.`asnro` = ?', $_POST['p'.$i]);
if ($result['myjnro'] == 1) {
$rows_affected = $db->update($table, $set, $where);
}

/* if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
    $acl->allow('Administrator');
	$acl->allow('Staff 2');
  $access = $acl->isAllowed($lvl, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") { 
$table = $db_prefix."_asiakkaat";
$where = $db->quoteInto('asnro = ?', $_POST['p'.$i]);
$rows_affected = $db->delete($table, $where);
}
} */
$i++;
}	


redirect("logged.php?module=contactcenter&task=none&id=".$_GET['id']."&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']); 

  break;
  }
  break;
  }

?>