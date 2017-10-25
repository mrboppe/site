<?php
session_start();
require('../connect.php');
  $day = getdate();
  $dbh->exec('UPDATE `accounts` SET `day`='.$dbh->quote($day[0]).' WHERE `id`='.$dbh->quote($_SESSION['id']));

?>
