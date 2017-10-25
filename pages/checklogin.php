<?php
  session_start();
  require('../connect.php');
  $day = getdate();


  if(empty($_REQUEST['username']) || empty($_REQUEST['password'])){
    echo "Wrong username or Password";
  } else {
    $account = $dbh->query('SELECT * FROM `accounts` WHERE `username`='.$dbh->quote($_REQUEST['username'] ))->fetch();

    if(sha1($_REQUEST['password']) === $account['password']){
      $_SESSION['id'] = $account['id'];
      $_SESSION['username'] = $account['username'];
      $_SESSION['password'] = $account['password'];

      $dbh->exec('UPDATE `accounts` SET `day`='.$dbh->quote($day[0]).' WHERE `id`='.$dbh->quote($account['id']));

      setcookie('username',$account['username'],time()+(172800*30),"/",NULL, TRUE, TRUE);
      setcookie('password',$account['password'],time()+(172800*30),"/",NULL, TRUE, TRUE);
      echo 'success';
    } else {
      echo 'failed';
    }
  }//

?>
