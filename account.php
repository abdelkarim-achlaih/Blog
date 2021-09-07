<?php
session_start();
$title = 'Account | '.ucfirst($_SESSION['first_name']).' '.ucfirst($_SESSION['last_name']);
require_once('header.php');
?>
<section class="account">
  <div class="container">
    <div class="info">
      <div class="img"><img 
      <?php 
        if($_SESSION['gender'] == 1) {
          echo '
          src="images/avatar-man.png"
          ';
        }
        if($_SESSION['gender'] == 2) {
          echo '
          src="images/avatar-woman.png"
          ';
        }
      ?>
      alt="#" /></div>
      <p class="full-name"><?php echo ucfirst($_SESSION['first_name']).' '.ucfirst($_SESSION['last_name']); ?></p>
      <p class="user-name"><?php echo $_SESSION['username']; ?></p>
      <a href="settings.php" class="main-button">Edit profile</a>
      <div class="stats">
        <i class="fas fa-users"></i>
        <span class="follow">
          <span class="follow-num">0 </span>
          <a href="#"> followers</a>
        </span>
        <span class="point">.</span>
        <span class="follow">
          <span class="follow-num">0 </span>
          <a href="#"> following</a></span>
        <span class="point">.</span>
        <i class="far fa-star"></i>
        <span class="follow"><a href="#">3</a></span>
      </div>
    </div>

    <div class="blogs">
      <div class="blog">
        <div class="blog-image">
          <img src="images/article1.png" alt="" />
        </div>
        <div class="blog-info">
          <div class="title"><a href="#">Blog 1</a></div>
          <div class="type">Product</div>
          <div class="date"><i class="far fa-clock"></i>2021-09-05</div>
        </div>
      </div>
      <div class="blog">
        <div class="blog-image">
          <img src="images/article2.png" alt="" />
        </div>
        <div class="blog-info">
          <div class="title"><a href="#">Blog 1</a></div>
          <div class="type">Product</div>
          <div class="date"><i class="far fa-clock"></i>2021-09-05</div>
        </div>
      </div>
      <div class="blog">
        <div class="blog-image">
          <img src="images/article3.png" alt="" />
        </div>
        <div class="blog-info">
          <div class="title"><a href="#">Blog 1</a></div>
          <div class="type">Product</div>
          <div class="date"><i class="far fa-clock"></i>2021-09-05</div>
        </div>
      </div>
      <div class="blog">
        <div class="blog-image">
          <img src="images/article1.png" alt="" />
        </div>
        <div class="blog-info">
          <div class="title"><a href="#">Blog 1</a></div>
          <div class="type">Product</div>
          <div class="date"><i class="far fa-clock"></i>2021-09-05</div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  require_once('footer.php');
?>