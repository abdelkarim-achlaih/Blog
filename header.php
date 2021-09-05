<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css?version=1.1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Georama:ital,wght@0,400;0,600;0,800;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="images/logo.png" />
    <script src="js/index-message.js"></script>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo">
          <a href="index.php">
            <img src="images/logo.png" alt="Home" />
          </a>
        </div>
        <nav id='nav'>
          <ul>
            <li><a href="#">About</a></li>
            <li><a href="post.php">Post</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Servics</a></li>
          </ul>
        </nav>
        <div class="sign" id='sign'>
          <ul class='links'>
            <?php 
              if(isset($_SESSION['first_name'])) {
                echo '
                  <li class="li">
                  '.$_SESSION['first_name'].'
                  </li>
                  <ul class="toogle">
                    <li><a href="account.php" ><i class="fas fa-user"></i>Account</a></li>
                    <li><a href="settings.php"><i class="fas fa-cog"></i>Settings</a></li>
                    <li>
                      <a href="config.php?option=logout"><i class="fas fa-sign-out-alt"></i>Log out</a>
                    </li>
                  </ul>
                ';
              }
              else {
                echo '
                  <li class="li-log">
                    <a href="log.php">Log in</a>
                  </li>
                  <li class="li-sign">
                    <a href="sign.php">Sign up for free</a>
                  </li>
                ';
              }
            ?>
          </ul>
        </div>
        <div class="button">
          <i class="fas fa-arrow-down" id="button"><span class='jsvar' id='jsvar'></span></i>
        </div>
      </div>
    </header>
    <script src='js/menu.js'></script>