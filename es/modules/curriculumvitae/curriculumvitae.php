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

if (!defined($secretkey)) { die ("Please use index.php!"); }


if (file_exists('modules/curriculumvitae/lang/'.$_GET['lang'].'.php'))
{ include ('modules/curriculumvitae/lang/'.$_GET['lang'].'.php'); }
else { $_GET['lang'] = $default_lang;
include ('modules/curriculumvitae/lang/'.$default_lang.'.php'); }

// Links

$links = "<a href=\"".$url_prefix."pdf/woodoo-parser.php?lang="
.$_GET['lang']."&amp;id=".$my."&amp;sid=".$sid
."\" target=\"_blank\">"._wiev."</a>"
." | <a href=\"".$url_prefix
."es/logged.php?module=curriculumvitae&task=none&id=0&xid=0&subtask="
."default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']."\">"
._curriculum_vitae."</a>"
." | <a href=\"".$url_prefix
."es/logged.php?module=curriculumvitae&task=config&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']."\">"._config."</a>";


$config = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_config WHERE user_id = 
:my ORDER BY cid ASC", array('my' => $my)
);

  $confignr = count($config);
  
  if ($confignr == 0) { 
 // XML config if empty 
$row = array (
    'public'     => 'no',
	'pdf' => 'back',
    'pic' => 'pic',
	'xml' => "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>",
	'user_id' => $my,
);

$table = $db_prefix."_cv_config";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();
redirect("logged.php?module=curriculumvitae&task=config&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']); 
}

if (isset($_POST['submit'])) {

// info

if ($_GET['task'] == "addnewinfo") {
$row = array (
    'content'     => stripslashes($_POST['info']),
    'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_info";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0"
."&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}
if ($_GET['task'] == "updateinfo") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {
$set = array (
    'content' => stripslashes($_POST['c'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_info';
$where = $db->quoteInto('`'.$db_prefix.'_cv_info`.`iid` = ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_info`.`user_id` = ?', $my);
 
$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_info";
$where = $db->quoteInto('iid = ?', $_POST['del'.$i], 'AND user_id = ?', $my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}	
redirect("logged.php?module=curriculumvitae&task=none&id="
."0&xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}

// pesonaldata

if ($_GET['task'] == "addnewpd") {
$row = array (
    'title'     => stripslashes($_POST['pdtitle']),
    'content'     => stripslashes($_POST['pdvalue']),
	'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_personaldata";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}
if ($_GET['task'] == "updatepd") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'title' => stripslashes($_POST['t'.$i]),
    'content' => stripslashes($_POST['c'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_personaldata';
$where = $db->quoteInto('`'.$db_prefix.'_cv_personaldata`.`pdid` = ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_personaldata`.`user_id` = ?', $my);
 
$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_personaldata";
$where = $db->quoteInto('pdid = ?', $_POST['del'.$i], 'AND user_id = ?', $my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}
redirect("logged.php?module=curriculumvitae&task=none&id=0&xid=0"
."&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}

// skill

if ($_GET['task'] == "addnewskill") {
$row = array (
    'title'     => stripslashes($_POST['title']),
    'content'     => stripslashes($_POST['skills']),
	'description'     => stripslashes($_POST['desc']),
    'years'     => stripslashes($_POST['exp']),
	'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_skills";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();
redirect("logged.php?module=curriculumvitae&task=none&id=0&xid=0&"
."subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}
if ($_GET['task'] == "updateskills") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'title' => stripslashes($_POST['t'.$i]),
    'content' => stripslashes($_POST['c'.$i]),
	'years' => stripslashes($_POST['y'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
	'description' => stripslashes($_POST['d'.$i]),
);
$table = $db_prefix.'_cv_skills';
$where = $db->quoteInto('`'.$db_prefix.'_cv_skills`.`sid` = ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_skills`.`user_id` = ?', $my);
 
$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_skills";
$where = $db->quoteInto('sid = ?', $_POST['del'.$i], 'AND user_id = ?', $my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}
redirect("logged.php?module=curriculumvitae&task=none&id=0&xid=0"
."&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}

// recom

if ($_GET['task'] == "addnewreco") {

$row = array (
    'title'     => stripslashes($_POST['title']),
    'content'     => stripslashes($_POST['content']),
	'contact'     => stripslashes($_POST['contact']),
	'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_recommendations";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}
if ($_GET['task'] == "updatereco") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'title' => stripslashes($_POST['t'.$i]),
    'content' => stripslashes($_POST['c'.$i]),
	'contact' => stripslashes($_POST['cont'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_recommendations';
$where = $db->quoteInto('`'.$db_prefix.'_cv_recommendations`.`rid` 
= ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_recommendations`.`user_id` = ?', $my);
 
$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_recommendations";
$where = $db->quoteInto('rid = ?', $_POST['del'.$i], 'AND user_id = ?', $my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}
redirect("logged.php?module=curriculumvitae&task=none&id=0"
."&xid=0&subtask=default&yid=0&zid=0&layout="
."".$_GET['layout']."&lang=".$_GET['lang']);
}

// edu

if ($_GET['task'] == "addnewedu") {

$row = array (
    'edname'     => stripslashes($_POST['degree']),
    'edplace'     => stripslashes($_POST['school']),
	'edyear'     => stripslashes($_POST['years']),
	'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_edu";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0&xid=0"
."&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}
if ($_GET['task'] == "updateedu") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'edname' => stripslashes($_POST['e'.$i]),
    'edplace' => stripslashes($_POST['pp'.$i]),
	'edyear' => stripslashes($_POST['year'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_edu';
$where = $db->quoteInto('`'.$db_prefix
.'_cv_edu`.`edid` = ?', 
$_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_edu`.`user_id` = ?', $my);
 
$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_edu";
$where = $db->quoteInto('edid = ?', $_POST['del'.$i], 
'AND user_id = ?', $my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}
redirect("logged.php?module=curriculumvitae&task=none&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}

// cour

if ($_GET['task'] == "addnewcour") {

$row = array (
    'cname'     => stripslashes($_POST['degree']),
    'sname'     => stripslashes($_POST['school']),
	'year'     => stripslashes($_POST['years']),
	'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_courses";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}
if ($_GET['task'] == "updateec") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'cname' => stripslashes($_POST['e'.$i]),
    'sname' => stripslashes($_POST['pp'.$i]),
	'year' => stripslashes($_POST['year'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_courses';
$where = $db->quoteInto('`'.$db_prefix
.'_cv_courses`.`cid` = ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_courses`.`user_id` = ?', 
 $my);
 
$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_courses";
$where = $db->quoteInto('cid = ?', 
$_POST['del'.$i], 'AND user_id = ?', 
$my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}
redirect("logged.php?module=curriculumvitae&task=none&id=0&"
."xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}

// hob

if ($_GET['task'] == "addnewhob") {

$row = array (
    'content'     => $_POST['hob'],
	'user_id' => $my,
	'order_id' => $_POST['order_id'],
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_hobbies";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0&xid=0"
."&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}
if ($_GET['task'] == "updatehob") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'content' => stripslashes($_POST['c'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_hobbies';
$where = $db->quoteInto('`'.$db_prefix
.'_cv_hobbies`.`hid` = ?', 
$_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_hobbies`.`user_id` = ?', 
 $my);

$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_hobbies";
$where = $db->quoteInto('hid = ?', 
$_POST['del'.$i], 'AND user_id = ?', 
$my);
$rows_affected = $db->delete($table, $where);

}
$i++;
}	
redirect("logged.php?module=curriculumvitae&task=none&id=0&xid=0"
."&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}

// exp

if ($_GET['task'] == "addnewexp") {

$row = array (
    'wename'     => stripslashes($_POST['name']),
	'wedes'     => stripslashes($_POST['des']),
	'emptype'     => stripslashes($_POST['type']),
	'sdate'     => stripslashes($_POST['sd']),
	'edate'     => stripslashes($_POST['ed']),
	'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_workexp";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0&xid=0&"
."subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}
if ($_GET['task'] == "updateexp") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'wename' => stripslashes($_POST['t'.$i]),
    'wedes' => stripslashes($_POST['c'.$i]),
	'emptype' => stripslashes($_POST['ep'.$i]),
	'sdate' => stripslashes($_POST['s'.$i]),
	'edate' => stripslashes($_POST['e'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_workexp';
$where = $db->quoteInto('`'.$db_prefix
.'_cv_workexp`.`weid` = ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_workexp`.`user_id` = ?', 
 $my);

$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_workexp";
$where = $db->quoteInto('weid = ?', 
$_POST['del'.$i], 'AND user_id = ?', $my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}	
redirect("logged.php?module=curriculumvitae&task=none&id=0&"
."xid=0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}

// exp

if ($_GET['task'] == "addnewref") {

	$row = array (
    'title'     => stripslashes($_POST['t']),
	'content'     => stripslashes($_POST['c']),
	'url'     => stripslashes($_POST['u']),
	'user_id' => $my,
	'order_id' => stripslashes($_POST['order_id']),
	'lang' => $_GET['lang'],
);
$table = $db_prefix."_cv_references";
$rows_affected = $db->insert($table, $row);
$last_insert_id = $db->lastInsertId();

redirect("logged.php?module=curriculumvitae&task=none&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']."&lang="
.$_GET['lang']);
}
if ($_GET['task'] == "updateref") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

$set = array (
    'title' => stripslashes($_POST['t'.$i]),
    'content' => stripslashes($_POST['c'.$i]),
	'url' => stripslashes($_POST['url'.$i]),
	'order_id' => stripslashes($_POST['i'.$i]),
);
$table = $db_prefix.'_cv_references';
$where = $db->quoteInto('`'.$db_prefix
.'_cv_references`.`rid` = ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_references`.`user_id` = ?', 
 $my);

$rows_affected = $db->update($table, $set, $where);

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_references";
$where = $db->quoteInto('rid = ?', $_POST['del'.
$i], 'AND user_id = ?', 
$my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}	
redirect("logged.php?module=curriculumvitae&task=none&id=0&xid="
."0&subtask=default&yid=0&zid=0&layout=".$_GET['layout']
."&lang=".$_GET['lang']);
}
if ($_GET['task'] == "updateconf") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {
$set = array (
    'public' => stripslashes($_POST['pub'.$i]),
	'pdf' => stripslashes($_POST['pdf'.$i]),
	'pic' => stripslashes($_POST['pic'.$i]),
	'xml' => stripslashes($_POST['xml'.$i]),
); 
$table = $db_prefix.'_cv_config';
$where = $db->quoteInto('`'.$db_prefix.'_cv_config`.`cid` = ?', $_POST['p'.$i],
 'AND `'.$db_prefix.'_cv_config`.`user_id` = ?', $my);
 
$rows_affected = $db->update($table, $set, $where);
if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
$table = $db_prefix."_cv_config";
$where = $db->quoteInto('cid = ?', $_POST['del'.$i], 'AND user_id = ?', $my);
$rows_affected = $db->delete($table, $where);
}
$i++;
}	
redirect("logged.php?module=curriculumvitae&task=config&id=0&xid=0&subtask="
."default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']);
}
if ($_GET['task'] == "upload") {


 $upload = $server_path.'es/modules/curriculumvitae/upload/'.md5($my).'/';
 
foreach ($_FILES["uploader"]["error"] as $key => $error) { 
if ($error == UPLOAD_ERR_OK) {

       if (stristr($_FILES["uploader"]["name"][$key], '.jpg') 
	   || stristr($_FILES["uploader"]["name"][$key], '.pdf')) {
	   $tmp_name = $_FILES["uploader"]["tmp_name"][$key]; 
       $name = $_FILES["uploader"]["name"][$key];
	   move_uploaded_file($tmp_name, $upload.$name); 
	   } else if (!stristr($_FILES["uploader"]["name"][$key], '.jpg') 
	   || !stristr($_FILES["uploader"]["name"][$key], '.pdf')){ 
	   break;
       } 
	    
} else {
break;
}
} 
redirect("logged.php?module=curriculumvitae&task=config&id=0&xid=0&subtask="
."default&yid=0&zid=0&layout=".$_GET['layout']."&lang=".$_GET['lang']); 
}
}

?>