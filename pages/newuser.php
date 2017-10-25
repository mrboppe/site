<?php
	require('../connect.php');

//  /?page=user&id=22
/*
	url parameters
	$_REQUEST['id'] == $_SESSION[id]

*/
    // If the values are posted, insert them into the database.
    $fields = ['email','firstname','lastname','password','password1','username'];
    $fkedup = false;
    foreach($fields as $field){
      if(!isset($_REQUEST[$field])){
        $fkedup = true;
        break;
      }
    }
    if($_REQUEST['password'] !== $_REQUEST['username']){
      if(!$fkedup){
          // Validate Email
          if(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            echo 'inv_email';
          } else {
            // Validate Password
            // === IDENTICAL
            // == equals
            if($_REQUEST['password'] !== $_REQUEST['password1']){
              echo 'pass_match';
            } else {
              // insert values
              if($dbh->query('INSERT INTO `accounts`(`firstname`,`lastname`,`email`,`username`,`password`)
              VALUES('.$dbh->quote($_REQUEST['firstname']).',
                      '.$dbh->quote($_REQUEST['lastname']).',
                      '.$dbh->quote($_REQUEST['email']).',
                      '.$dbh->quote($_REQUEST['username']).',
                      '.$dbh->quote(sha1($_REQUEST['password'])).')')){
                echo 'success';
              } else {
                echo 'fail';
              }
            }
          }
      }  else {
        echo 'fields_required';
      }
    } else {
      echo 'error: same user/password';
    }
?>
