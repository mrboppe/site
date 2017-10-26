<?php
require('connect.php');
session_start();
if(isset($_SESSION['username'])){
  $account = $dbh->query('SELECT * FROM `accounts` WHERE `username`='.$dbh->quote($_SESSION['username']))->fetch();
}
$pages = ['register','login', 'user'];
if(isset($_REQUEST['page']) && in_array($_REQUEST['page'], $pages)){
    $page = './pages/'.$_REQUEST['page'].'.php';
    $title = ucfirst($_REQUEST['page']);
} else {
  $title = 'Welcome';
  $page = './pages/main.php';
}

?>

<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title><?=$title?></title>
  <link rel="icon" type="img" href="./Img/SD.ico"/>
  <?php require('header.php'); ?>
</head>

  <body>
    <header>
      <div class="container">
        <div class="header_helper">

            <div id="top">

                  <div class="flags">
                    <button class="flags" type="button" name="button">
                      <img src="./img/swe.png"/>
                    </button>
                    <button class="flags" id="activ" type="button" name="button">
                      <img src="./img/uk.png"/>
                    </button>
                  </div>

                  <div class="login">
                    <?php
                      if(!isset($_SESSION['username'])){ ?>
                        <form id="loginForm">
                          <input type="text" name="username" placeholder="Username">
                          <input type="password" name="password" placeholder="Password">
                          <input type="submit" name="" value="LOGIN">
                        </form>
                      <?php if(isset($_REQUEST['page']) != 'register'){ ?>
                        <div id="register">
                          <a href="/?page=register">Registrera dig här</a>
                        </div>
                      <?php } ?>

              <?php  } else { ?>
                        <?='Welcome: '.$account['username']?>
                        <span><a href="/pages/logout.php">Logout</a></span>
                        <a href="/?page=user&id=<?=$_SESSION["id"]?>"<span><img id="avatar" src="/img/uploads/avtars/<?=$account['avatar']?>"/></span>
              <?php } ?>

                  </div>

              </div>

        </div>
        <div id="logo">
          <a href="index.php"><img src="/img/logo123.png"/></a></li>
        </div>
      </div>

      <nav>
        <div class="container">
          <div class="menu_helper">
            <ul><!--
              --><button>Start</button><!--
              --><button>Projekt</button><!--
              --><button>Feed</button><!--
              --><button>Kontakt</button><!--
              --><button>Om mig</button><!--
      --></ul>
          </div>
        </div>
      </nav>

    </header>

    <div class="main_container">
      <?php require($page); ?>
    </div>

  </body>

</html>
