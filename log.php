<?php
$title = 'Log-in';
require_once('session.php');
require('functions.php');
if(isset($_SESSION['message_source'])) {
  if($_SESSION['message_source'] == 'config.php') {
    if(isset($_SESSION['message_success'])) {
      show_message ($_SESSION['message_success'], 'Success');
      unset($_SESSION['message_success']);
    }
    if(isset($_SESSION['message_error'])) {
      show_message ($_SESSION['message_error'], 'Error');
      unset($_SESSION['message_error']);
    }
  }
}
?>
<section class="data">
  <div class="container">
    <div class="form user-log">
      <div class="title">
        <h3><i class="fas fa-sign-in-alt"></i>log in</h3>
      </div>
      <form action="config.php?option=log" method="POST">
        <input
          type="mail"
          placeholder="Your email"
          name="email"
          id="email"
          <?php if(isset($_SESSION['message_email'])) {
            echo "value=";
            echo '"';
            echo $_SESSION['message_email'];
            echo '"';
          }
          else {
            echo "autofocus";
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
          <?php if(isset($_SESSION['message_email'])) {
            echo "autofocus";
            unset($_SESSION['message_email']);
            }
          ?>
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
