<?php
session_start();
$error = array();
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['user'])) {
    require('users.php');
    if(user_exists($_GET['user'])) {
      $author = get_user_infos_from_id($_GET['user']);
    }
    else {
      $error[] = 1;
    }
  }
  else {
    $error[] = 1;
  }
}
else {
  $error[] = 1;
}
if (!empty($error)) {
  $_SESSION['message_error'] = "You are not permited to see this page this way: informations are not sent properly";
  header("location: index.php");
  exit;
}
$title = 'User | '.ucfirst($author['first_name']).' '.ucfirst($author['last_name']);
require_once('header.php');
require('functions.php');
?>
<section class="account">
      <div class="container">
        <div class="info">
          <div class="img"><img 
          <?php 
            if($author['gender'] == 1) {
              echo '
              src="images/avatar-man.png"
              ';
            }
            if($author['gender'] == 2) {
              echo '
              src="images/avatar-woman.png"
              ';
            }
          ?>
          alt="#" /></div>
          <p class="full-name"><?php echo ucfirst($author['first_name']).' '.ucfirst($author['last_name']); ?></p>
          <p class="user-name"><?php echo $author['username']; ?></p>
          <a href="#" class="main-button soon">Follow</a>
          <div class="stats soon">
            <i class="fas fa-users"></i>
            <span class="follow">
              <span class="follow-num">0 </span>
              <a href="#"> followers</a>
            </span>
            <span class="point">.</span>
            <span class="follow">
              <span class="follow-num">0 </span>
              <a href="#"> following</a></span
            >
            <span class="point">.</span>
            <i class="far fa-star"></i>
            <span class="follow"><a href="#">3</a></span>
          </div>
          <p class="user-date">Memeber since <?php echo edit_date($author['sign_in_date']); ?> </p>
        </div>

<div class="user-blogs">
      <div class="blogs-container">
        <div class="title">
          <?php
            require('blogs.php');
            $blogs = get_user_blogs($author);
            if (isset($blogs)) {
              $num_of_blogs = number_of_user_blogs($author);
              $num_of_pending_blogs = number_of_user_pending_blogs($author);
              $num_of_existed_blogs = $num_of_blogs - $num_of_pending_blogs;
              if($num_of_existed_blogs > 0) {
                echo '
                      <i class="fas fa-file-alt"></i>
                      '.ucfirst($author['first_name']).'\'s blogs ( <span>'.$num_of_existed_blogs.'</span> )
                    </div><!-- .title closed -->
                    <div class="blogs">
                ';
                for ($i = 0; $i < count($blogs); $i = $i + 1) {
                  if($blogs[$i]['pending'] == 0) {
                    echo '
                      <div class="blog">
                        <div class="blog-image">
                          <img src="images/'.$blogs[$i]['category'].'.jpg" alt="" />
                        </div>
                        <div class="blog-info">
                          <div class="title"><a href="blog.php?blog_id='.$blogs[$i]['id'].'">'.$blogs[$i]['title'].'</a></div>
                          <div class="type">'.$blogs[$i]['category'].'</div>
                          <div class="date"><i class="far fa-clock"></i>'.edit_date($blogs[$i]['creation_date']).'</div>
                        </div>
                      </div><!-- .blog closed -->
                    ';
                  }
                }
                echo '</div><!-- .blogs closed -->';
                echo '</div><!-- .blogs-container closed -->';
              }
              else {
                echo ucfirst($author['first_name']). 'has no blogs.
                </div><!-- .title closed -->
                ';
              }
            }
          ?>
        
    </div>
    </div>
    </section>
    <?php require('footer.php');?>