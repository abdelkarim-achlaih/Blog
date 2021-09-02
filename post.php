<?php
$title = 'Create a new post';
require_once('session.php');
require('functions.php');
if(! isset($_SESSION['first_name']) && ! isset($_SESSION['last_name'])) {
  show_message ('You have to log in first, <a href="log.php">Click here to log in<a>', 'Error');
  }
?>
    <section class="box">
      <div class="container">
        <div class="box-container">
          <div class="title">
            <h3>Create a new post</h3>
          </div>
          <div class="author">
            <div class="image"><img src="images/avatar-man.png" alt="User"></div>
            <div class="name">
              <?php
                if (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
                  echo $_SESSION['first_name'].' '.$_SESSION['last_name'];
                }
              ?>
            </div>
          </div>
          <form action="#" method="POST" class="post">
            <input  type="text" 
                    <?php
                      if (! isset($_SESSION['first_name']) && ! isset($_SESSION['last_name'])) {
                        echo 'placeholder="Disabled" ';
                      echo 'disabled';
                      }
                      else {
                        echo 'placeholder="Title of the blog"';
                      }
                    ?>
                    
            />
            <textarea
              name="blog"
              
              rows="15"
              cols="15"
              <?php
                    if (! isset($_SESSION['first_name']) && ! isset($_SESSION['last_name'])) {
                      echo 'placeholder="Disabled" ';
                      echo 'disabled';
                      }
                      else {
                        echo 'placeholder="Your Blog"';
                      }
              ?>
            ></textarea>
            <input 
              type="submit" 
              value="Publish" 
              class="main-button" 
              <?php
                    if (! isset($_SESSION['first_name']) && ! isset($_SESSION['last_name'])) {
                      echo 'disabled ';
                      echo 'style="background-color: rgb(211, 97, 97);" ';
                    }
              ?>
            />
          </form>
        </div>
      </div>
    </section>
    <?php require_once('footer.php');
    ?>
  </body>
</html>
