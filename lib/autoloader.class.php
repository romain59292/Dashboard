<?php
require_once(dirname(__FILE__) . '/../config/config.php');

try
{
  $oDb = new PDO(sprintf("mysql:dbname=%s;host=%s", MYSQL_BASE, MYSQL_HOST), MYSQL_USER, MYSQL_PASS);  
}
catch (Exception $e)
{
  echo 'Connexion échouée : ' . $e->getMessage();
}
