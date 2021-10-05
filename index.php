<?php
$title = 'Home';
require_once('session.php');
require('functions.php');
error('config.php', 1);
error('config.php', 4);
?>
<section class="landing">
  <div class="container">
    <div class="content">
      <h1>How to</h1>
      <p>
        Blogs that help you bring your best ideas to life. Join us to view, edit and post
        the best prototyping tips, tricks, and tutorials.
      </p>
      <form action="config.php?option=subscribe" method="POST">
        <input
          type="text"
          name="email"
          id="email"
          placeholder="Your email"
          required
        />
        <input type="submit" value="Join us" class="main-button" />
      </form>
    </div>
    <div class="landing-image">
      <img src="images/landing.png" alt="" />
    </div>
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
          <div class="buttons">
            <?php 
              if (isset($_SESSION['filtred_blogs'])):
                echo '<a href="config.php?option=unfilter" class="main-button">Unfilter</a>';
              endif;
            ?>
            <input type="submit" value="Filter" class="main-button">
          </div>
        </form>
      </div>
    </section>
<section class="articles">
  <div class="container">
    <?php 
      if (isset($_SESSION['filtred_blogs'])):
        $blogs = $_SESSION['filtred_blogs'];
      else:
        $query ='SELECT * FROM blogs ORDER BY creation_date ASC LIMIT 9';
        require('blogs.php');
        $blogs = get_blogs($query);
      endif;
      $number_of_blogs = count($blogs);
        for($i = 0; $i < $number_of_blogs; $i++) :
          echo '
            <a class="article" href="blog.php?blog_id='.$blogs[$i]['id'].'">
              <div class="image"><img src="images/'.$blogs[$i]['category'].'.jpg" /></div>
              <div class="content">
                <div class="type">'.$blogs[$i]['category'].'</div>
                <div class="title">'.$blogs[$i]['title'].'</div>
                <div class="date">'.edit_date($blogs[$i]['creation_date']).'</div>
              </div>
            </a>
          ';
        endfor;
    ?>
  </div>
</section>
<?php require_once('footer.php');
?>
</body>
</html>
