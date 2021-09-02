<?php
$title = 'Sign-in';
require_once('session.php');
require('functions.php');
if(isset($_SESSION['message_source'])) {
  if($_SESSION['message_source'] == 'config.php') {
    if(isset($_SESSION['message_error'])) {
      show_message ($_SESSION['message_error'], 'Error');
      unset($_SESSION['message_error']);
    }
    if(isset($_SESSION['message_notification'])) {
      show_message ($_SESSION['message_notification'], 'Notification');
      unset($_SESSION['message_notification']);
    }
  }
}


if(isset($_GET['message'])) {
  show_message ($_GET['message'], 'Notification');
}
?>
<section class="box">
  <div class="container">
    <div class="box-container">
      <div class="title">
        <h3>Sign in</h3>
      </div>
      <form action="config.php?option=sign" method="POST" class="sign">
        <input
          type="text"
          placeholder="Your first-name"
          name="first_name"
          id="first_name"
          required
          autofocus
        />
        <input
          type="text"
          placeholder="Your last-name"
          name="last_name"
          id="last_name"
          required
        />
        <input
          type="text"
          placeholder="Your username"
          name="username"
          id="username"
          required
        />
        <input
          type="mail"
          placeholder="Your email"
          name="email"
          id="email"
          required
          <?php if(isset($_SESSION['message_email'])) {
            echo "value=";
            echo '"';
            echo $_SESSION['message_email'];
            echo '"';
            unset($_SESSION['message_email']);
          }
          ?>
        />
        <input
          type="password"
          placeholder="Your password"
          name="password"
          id="password"
          required
        />
        <input
          type="password"
          placeholder="Re-tap your password "
          name="re_password"
          id="re_password"
          required
        />
        <div class="checkbox">
          <div class="checkbox-title">
            Categories you are intersted in
          </div>
            <input 
              type="radio"
              name="category"
              value="1"
              id="products"
              required
            />
            <label for="products">products</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="2"
              id="self-developement"
              required
            />
            <label for="self-developement">self-developement</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="3"
              id="sport"
              required
            />
            <label for="sport">sport</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="4"
              id="nature"
              required
            />
            <label for="nature">nature</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="5"
              id="work"
              required
            />
            <label for="work">work</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="6"
              id="school"
              required
            />
            <label for="school">school</label>
        </div>
        <input type="submit" value="Sign-in" class="main-button" />
        <a href="log.php" class="already">Already have an account, log in</a>
      </form>
    </div>
  </div>
</section>
<?php require_once('footer.php');
?>
  </body>
</html>
