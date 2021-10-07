<?php
$title = 'Create a new post';
require_once('session.php');
require('functions.php');
if(! isset($_SESSION['first_name']) && ! isset($_SESSION['last_name'])) {
  show_message ('You have to log in first, <a href="log.php">Click here to log in<a>', 'Error');
}
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
    <div class="form blog-add">
      <div class="title">
        <h3><i class="fas fa-plus"></i>Create a new post</h3>
      </div>
      <div class="author">
        <?php
          if (isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['gender'])) {
            if ($_SESSION['gender'] == 1) {
              echo '<div class="image"><img src="images/avatar-man.png" alt="User"></div>';
            }
            elseif ($_SESSION['gender'] == 2) {
              echo '<div class="image"><img src="images/avatar-woman.png" alt="User"></div>';
            }
            echo '<a class="name" href="account.php">'.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</a>';
          }
        ?>
      </div>
      <form action="config.php?option=blog-add" method="POST" enctype="multipart/form-data">
        <input type="text" 
          <?php
            if (! isset($_SESSION['first_name']) && ! isset($_SESSION['last_name'])) {
              echo 'placeholder="Disabled" ';
            echo 'disabled';
            }
            else {
              echo 'placeholder="Title of the blog"';
            }
          ?>
          name='title'
        />
        <textarea
          name="content"
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
        <div class="checkbox-container">
          <div class="checkbox">
            <div class="checkbox-title">
              Category of the blog
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
        </div>
        <div class="checkbox-title" style="margin-bottom:20px;margin-top:40px;">
          Set a background for your blog
        </div>
        <input 
          type="file" 
          name="bg" 
          id="bg" 
          class="upload"
          required
        />
        <input 
          type="submit" 
          value="Publish" 
          class="main-button" 
          <?php
            if (! isset($_SESSION['first_name']) && ! isset($_SESSION['last_name'])) {
              echo 'disabled ';
            }
          ?>
        />
      </form>
    </div>
  </div>
</section>
<?php require_once('footer.php');?>