<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles-v1.1.css" />
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
          <div class="button">
            <i class="fas fa-bars" id="button">
              <span class="jsvar" id="jsvar"></span>
            </i>
          </div>
        </div>
        <div class="nav-container hidden" id="nav-container">
          <nav>
            <ul>
              <li class="soon"><a href="#">About</a></li>
              <li><a href="post.php">Post</a></li>
              <li class="soon"><a href="#">Feed</a></li>
              <li class="menu-handle">
                <a href="#">Categories</a>
                <ul class="menu">
                  <?php 
                    require('categories.php');
                    $number_of_categories = number_of_categories();
                    $m = 1;
                    while($m <= $number_of_categories) {
                      $category = get_category_infos($m);
                      echo '
                        <li><a href="config.php?option=filter_category&category='.$category['id'].'">'.$category['name'].'</a></li>
                      ';
                      $m = $m + 1;
                    }
                  ?>
                </ul>
              </li>
              <li class="soon"><a href="#">Services</a></li>
              <li><a href="mailto:abdelkarima46@gmail.com" target="_blank">Contact</a></li>
            </ul>
          </nav>
          <nav>
            <ul>
              <?php 
                  if(! isset($_SESSION['first_name'])) {
                    echo '
                      <li>
                        <a href="log.php">Log in</a>
                      </li>
                      <li>
                        <a href="sign.php">sign up for free</a>
                      </li>
                    ';
                  }
                  else {
                    echo '
                      <li class="menu-handle">
                        <a href="account.php">Abdelkarim</a>
                        <ul class="menu">
                          <li>
                            <a href="account.php"><i class="fas fa-user"></i>Account</a>
                          </li>
                          <li>
                            <a href="settings.php"><i class="fas fa-cog"></i>Settings</a>
                          </li>
                          <li>
                            <a href="config.php?option=logout"
                              ><i class="fas fa-sign-out-alt"></i>Log out</a
                            >
                          </li>
                        </ul>
                      </li>
                    ';
                  }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <script src='js/menu.js'></script>