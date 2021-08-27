<?php
$title = 'Sign-in';
require_once('header.php');
?>
    <section class="box">
      <div class="container">
        <div class="box-container">
          <div class="title">
            <h3>Sign in</h3>
          </div>
          <form action="#" method="POST" class="sign">
            <input
              type="text"
              placeholder="Your first-name"
              name="first-name"
              id="first-name"
              required
            />
            <input
              type="text"
              placeholder="Your last-name"
              name="last-name"
              id="last-name"
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
              name="re-password"
              id="re-password"
              required
            />
            <div class="checkbox">
              <div class="checkbox-title">
                Categories you are intersted in
              </div>
              <div class="check">
                <label for="products">products</label>
                <input type="checkbox" name="products" id="products" required/>
              </div>
              <div class="check">
                <label for="self-developement">self-developement</label>
                <input
                  type="checkbox"
                  name="self-developement"
                  id="self-developement"
                  required
                />
              </div>
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
