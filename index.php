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
  if($_SESSION['message_source'] == 'blog.php' OR $_SESSION['message_source'] == 'config.php') {
    if(isset($_SESSION['message_error'])) {
      show_message ($_SESSION['message_error'], 'Error');
      unset($_SESSION['message_error']);
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
<section class="fltr">
      <div class="container">
        <div class="section-title">
          <i class="fas fa-filter"></i>Filter
        </div>
        <form class="filter-container" action="config.php?option=filter" method="POST">
          <div class="filter">
          <div class="filter-title">By Upload date</div>
          <select name="upload_date" id="">
            <option value="1">Today</option>
            <option value="2">This Week</option>
            <option value="3">This Month</option>
            <option value="4" selected>This Year</option>
          </select>
          </div>
          <div class="filter">
            <div class="filter-title">By Popularity</div>
            <select name="popularity" id="">
              <option value="1">Most Seen</option>
              <option value="2">Most commented</option>
            </select>
          </div>
          <div class="filter">
            <div class="filter-title">By Category</div>
            <select name="category" id="">
              <option value="1">technology</option>
              <option value="2">self-development</option>
              <option value="3">sport</option>
              <option value="4">nature</option>
              <option value="5">work</option>
              <option value="6">school</option>
            </select>
          </div>
          <input type="submit" value="Filter" class="main-button">
        </form>
      </div>
    </section>
<section class="articles">
  <div class="container">
    <?php 
      if (isset($_SESSION['filtred_blogs'])):
        $number_of_filtred_blogs = count($_SESSION['filtred_blogs']);
        for($i = 0; $i < $number_of_filtred_blogs; $i++) :
          echo '
            <a class="article" href="blog.php?blog_id='.$_SESSION['filtred_blogs'][$i]['id'].'">
              <div class="image"><img src="images/'.$_SESSION['filtred_blogs'][$i]['category'].'.jpg" /></div>
              <div class="content">
                <div class="type">'.$_SESSION['filtred_blogs'][$i]['category'].'</div>
                <div class="title">'.$_SESSION['filtred_blogs'][$i]['title'].'</div>
                <div class="date">'.edit_date($_SESSION['filtred_blogs'][$i]['creation_date']).'</div>
              </div>
            </a>
          ';
        endfor;
      endif;
    ?>
  </div>
</section>
<?php require_once('footer.php');
?>
</body>
</html>
