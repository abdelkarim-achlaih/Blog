<?php
$title = 'Log-in';
require_once('session.php');
if(isset($_GET['error'])) {
  echo '
    <section class="error-section">
    <div class="container">
    <div class="error">
    <h4>Error</h4>
    <div class="error-name">
  ';
  echo $_GET['error'] ;
  echo '
    </div>
    </div>
    </div>
    </section>
  ' ;
}
?>
<section class="box">
  <div class="container">
    <div class="box-container">
      <div class="title">
        <h3>log in</h3>
      </div>
      <form action="config.php?option=log" method="POST" class="sign">
        <input
          type="mail"
          placeholder="Your email"
          name="email"
          id="email"
          <?php if(isset($_GET['email'])) {
            echo "value=";
            echo '"';
            echo $_GET['email'];
            echo '"';
          }
          ?>
          required
        />
        <input
          type="password"
          placeholder="Your password"
          name="password"
          id="password"
          required
        />
        <input type="submit" value="log-in" class="main-button" />
        <a href="sign.php" class="already">Not registred yet, create an account</a>
      </form>
    </div>
  </div>
</section>
    <?php require_once('footer.php');
    ?>
  </body>
</html>
