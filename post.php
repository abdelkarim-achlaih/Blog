<?php
$title = 'Create a new post';
require_once('session.php');
?>
    <section class="box">
      <div class="container">
        <div class="box-container">
          <div class="title">
            <h3>Create a new post</h3>
          </div>
          <div class="author">
            <div class="image"></div>
            <div class="name"></div>
          </div>
          <form action="#" method="POST">
            <input type="text" placeholder="Title of the blog" />
            <textarea
              name="blog"
              placeholder="Your Blog"
              rows="15"
              cols="15"
            ></textarea>
            <input type="submit" value="Publish" class="main-button" />
          </form>
        </div>
      </div>
    </section>
    <?php require_once('footer.php');
    ?>
  </body>
</html>
