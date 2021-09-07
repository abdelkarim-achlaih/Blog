<?php
$title = 'Home';
require_once('session.php');
require('functions.php');
if(isset($_SESSION['message_source'])) {
  if($_SESSION['message_source'] == 'config.php') {
    if(isset($_SESSION['message_index'])) {
      show_index_message($_SESSION['message_index']);
      unset($_SESSION['message_index']);
    }
  }
}
?>
<section class="landing">
  <div class="container">
    <h1>Blog</h1>
    <p>
      Stories to help you bring your best ideas to life. Subscribe to get
      the best prototyping tips, tricks, and tutorials in your inbox.
    </p>
    <form action="config.php?option=subscribe" method="POST">
      <input type="text" name="email" id="email" placeholder="Your email" required />
      <input type="submit" value="Subscribe" class="main-button"/>
    </form>
  </div>
</section>
<section class="articles">
  <div class="container">
    <?php 
      require('blogs.php');
      $number_of_blogs = number_of_blogs();
      for($i = 2; $i <= $number_of_blogs + 1; $i = $i + 1) {
        $blog[$i] = get_blog($i);
        echo '
          <a class="article" href="#">
            <div class="image"><img src="images/'.$blog[$i]['category'].'.jpg" /></div>
            <div class="content">
              <div class="type">'.$blog[$i]['category'].'</div>
              <div class="title">'.$blog[$i]['title'].'</div>
              <div class="date">'.edit_date($blog[$i]['creation_date']).'</div>
            </div>
          </a>
        ';
      }
    ?>
  </div>
</section>
<?php require_once('footer.php');
?>
</body>
</html>
