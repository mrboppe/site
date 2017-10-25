<?php
  $user = "root";
  $pass = "";
  $db = "boppe";
  $host = "localhost";

  try {
    $dbh = new PDO('mysql:host='.$host.';dbname='.$db,$user,$pass);
  } catch(PDOException $e){
    echo "Error: ".$e->getMessage();
  }
?>
