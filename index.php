<?php
require_once("lib/autoloader.class.php");


$aNumberOfRequests = array();
$aPercentAvailability = array();
$aResultsUnique = array();
$aAlerts = array();
$sDataGraph = "";
$bHasAlerts = false;
$aMigrations = array();
        
$sql = "SELECT * FROM indicateurs WHERE `key` like 'TOTAL_NB_REQUESTS_LAST_1_HOUR%' && date > date_sub(now(),interval 1 day) ORDER BY date";
$oQuery = $oDb->query($sql);
$aResults = $oQuery->fetchAll(PDO::FETCH_OBJ);

foreach ($aResults as $oResult)
{
  $who = $oResult->who;
  if (preg_match("/-jboss[1-2]/", $who))
  {
    $who = strstr($who, '-jboss', true);
  }

  if (false === isset($aNumberOfRequests[$who]))
  {
    $aNumberOfRequests[$who] = array();
    $aResultsUnique[$who] = array();
  }

  if (false === isset($aNumberOfRequests[$who][$oResult->key]))
  {
    $aNumberOfRequests[$who][$oResult->key] = 0;
    $aResultsUnique[$who][$oResult->key] = array();
  }

  $aNumberOfRequests[$who][$oResult->key] += $oResult->value;
  $aResultsUnique[$who][$oResult->key][$oResult->date] += $oResult->value;
}

foreach ($aResultsUnique as $who => $aHours)
{
  foreach ($aHours as $key => $value)
  {
    if ('TOTAL_NB_REQUESTS_LAST_1_HOUR' === $key)
    {
      foreach ($value as $k => $v)
      {
        $sDataGraph .= sprintf("{y: '%s', '%s': %d},\n", $k, $who, $v);        
      }
    }
  }
}

foreach ($aNumberOfRequests as $k => $v)
{
  $aPercentAvailability[$k] = round($v['TOTAL_NB_REQUESTS_LAST_1_HOUR_OK'] / $v['TOTAL_NB_REQUESTS_LAST_1_HOUR'] * 100, 1);
}



$sql = "SELECT * FROM indicateurs WHERE `key` like 'NB_REGISTERDOMAINS_LAST_1_HOUR%' && date > date_sub(now(),interval 1 day) ORDER BY date";
$oQuery = $oDb->query($sql);
$aResults = $oQuery->fetchAll(PDO::FETCH_OBJ);
$aInscriptions = array();

foreach ($aResults as $oResult)
{
  $who = $oResult->who;
  if (preg_match("/-jboss[1-2]/", $who))
  {
    $who = strstr($who, '-jboss', true);
  }

  if (false === isset($aInscriptions[$who]))
  {
    $aInscriptions[$who] = array();
  }

  if (false === isset($aInscriptions[$who][$oResult->key]))
  {
    $aInscriptions[$who][$oResult->key] = 0;
  }

  $aInscriptions[$who][$oResult->key] += $oResult->value;

  if (preg_match("/_KO$/", $oResult->key) && $oResult->value > 0)
  {
    $bHasAlerts = true;
  }
}

if (!empty($_POST['field-id']))
{
    $update = $oDb->prepare("UPDATE migration_domino "
                            . "SET `lot`=:lot,"
                            . "`percent`=:percent "
                            . "WHERE `id`=:id");

    $update->execute(array( ':lot' => $_POST['field-lot'],
                            ':percent' => $_POST['field-percent'],
                            ':id' => $_POST['field-id'],
                           ));
}
elseif (isset($_POST['field-lot']) or isset($_POST['field-percent']))
{
    var_dump($_POST['field-percent']);
    $insert= $oDb->prepare("INSERT INTO migration_domino(lot,percent) "
                            . "VALUES (:lot,:percent )");
    $insert->execute(array(
                "lot" => $_POST['field-lot'], 
                "percent" => $_POST['field-percent']
                ));
}


$sql = $oDb->prepare("SELECT AVG(percent) FROM migration_domino");
$sql->execute(); 
$aAverage = str_replace(".0000","",$sql->fetch());
$iAverage = (int)$aAverage[0];


$sql = "SELECT * FROM migration_domino ORDER BY id";
$oQuery = $oDb->query($sql);
$aMigrations = $oQuery->fetchAll(PDO::FETCH_OBJ);   



// Display page
require_once("templates/header.html.php");
require_once("templates/index.html.php");
require_once("templates/footer.html.php");