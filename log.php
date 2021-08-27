<?php
require_once('header.php');
?>
    <section class="box">
      <div class="container">
        <div class="box-container">
          <div class="title">
            <h3>log in</h3>
          </div>
          <form action="#" method="POST" class="sign">
            <input
              type="mail"
              placeholder="Your email"
              name="email"
              id="email"
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
