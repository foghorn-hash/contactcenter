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

require_once 'Zend/Db.php';

$params = array ('host'     => $dbhost,
                 'username' => $dbuser,
                 'password' => $dbpasswd,
                 'dbname'   => $database);

$db = Zend_Db::factory('PDO_MYSQL', $params); 

?>