<?php if (!defined($secretkey)) { die("Please use index.php!"); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php  if ($_GET['lang'] == "finnish" || $_GET['lang'] == "fi_FI") { echo "fi"; } else { echo "en"; } ?>">
<head>
<title>Curriculum Vitae - Matti Kiviharju - <?php echo ucfirst($_GET['lang']); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="templates/defaultwhite/css/stylesheet.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center">
<div id="container">
	  <div id="header">
	  <div align="left">
      <ul id="nav-top">
                <li><a href="woodoo-parser.php?lang=finnish&amp;id=<?php echo $_GET['id']; ?>">In Finnish</a></li>
                <li><a href="woodoo-parser.php?lang=english&amp;id=<?php echo $_GET['id']; ?>">In English</a></li>
      </ul>
	  </div>
	  </div>
      <div id="content">