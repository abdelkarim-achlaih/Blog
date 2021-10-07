<?php
$title = 'Sign-in';
require_once('session.php');
require('functions.php');
error('config.php', 3);
error('config.php', 4);
if(isset($_GET['message'])) {
  show_message ($_GET['message'], 'Notification');
}
?>
<section class="data">
  <div class="container">
    <div class="form user-sign">
      <div class="title">
        <h3><i class="fas fa-user-plus"></i>Sign in</h3>
      </div>
      <form action="config.php?option=sign" method="POST" enctype="multipart/form-data">
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
        <div class="checkbox-title" style="margin-bottom:20px;">
          Upload you avatar
        </div>
        <input 
          type="file" 
          name="avatar" 
          id="avatar" 
          class="upload"
          required
        />
        <div class="checkbox-container">
          <div class="checkbox">
            <div class="checkbox-title">
              Choose a category you are intersted in
            </div>
              <input 
                type="radio"
                name="category"
                value="1"
                id="technology"
                required
              />
              <label for="technology">technology</label>
              <br><br>
              <input
                type="radio"
                name="category"
                value="2"
                id="self-development"
                required
              />
              <label for="self-development">self-development</label>
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
          <div class="checkbox">
            <div class="checkbox-title">
              Select your gender
            </div>
              <input 
                type="radio"
                name="gender"
                value="1"
                id="male"
                required
              />
              <label for="male">male</label>
              <br><br>
              <input
                type="radio"
                name="gender"
                value="2"
                id="female"
                required
              />
              <label for="female">female</label>
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
