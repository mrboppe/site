<?php
session_start();
require('./connect.php');

// hämta data
$userinfo = $dbh->query('SELECT * FROM `accounts` WHERE `id`='.$dbh->quote($_REQUEST['id']))->fetch();
?>
<div class="inner_container">
  <div id="img">
    <img id="avatar" src="/img/uploads/avtars/<?=$userinfo['avatar']?>"/>
    <p id="day"><?=ucfirst($userinfo['username'])?></p>
    <p>Senast online: <?=date("Y-m-d H:i:s", $userinfo['day'])?></p>
  </div>
  <div class="tab">
      <div class="tab_holder"><button class="btn profile_general" style="<?=($_SESSION['id'] != $_REQUEST['id']) ? 'display:inherit':'';?>">Allmänt</button></div><!--
    --><?php if($_SESSION["id"] == $_REQUEST['id']){  ?><!--
    --><div class="tab_holder"><button class="btn profile_edit">Redigera</button></div><!--
    --><?php } ?>
  </div>
  <div class="profile_box profile_info_box">
    <table>
      <tr>
        <td><b>Användarnamn</b></td>
        <td><b>Bio</b></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;"><span><?=ucfirst($userinfo['username'])?></span></td>
        <td> <textarea rows="4" cols="50" readonly maxlength="1">At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.</textarea> </td>
      </tr>
      <tr>
        <td><b>Namn</b></td>
        <td><b>Location</b></td>
      </tr>
      <tr>
        <td><?=ucfirst($userinfo['firstname'])?> <?=ucfirst($userinfo['lastname'])?></td>
        <td>Ängelholm</td>
      </tr>
    </table>
    <table>

    </table>
  </div>
  <div class="profile_box profile_edit_box">

  </div>

</div>
