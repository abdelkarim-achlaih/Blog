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
    <a class="article" href="#">
      <div class="image"><img src="images/article1.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article2.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article3.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article2.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article3.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article1.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article2.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article3.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
    <a class="article" href="#">
      <div class="image"><img src="images/article1.png" /></div>
      <div class="content">
        <div class="type">Product</div>
        <div class="title">Lorem ipsum dolor, sit amet</div>
        <div class="date">May 17, 2021</div>
      </div>
    </a>
  </div>
</section>
<?php require_once('footer.php');
?>
</body>
</html>
