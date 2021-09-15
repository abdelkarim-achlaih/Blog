<?php
$_GET['blog_id'] = 2;
require_once('blogs.php');
require_once('users.php');
require_once('comments.php');
require_once('functions.php');
$blog = get_blog($_GET['blog_id']);
$user = get_user_infos_from_id($blog['author']);
$title = 'Blog post | '.$blog['title'];
require_once('header.php');

echo '
<section class="blog-page">
  <div class="container">
    <article>
      <div class="nav-buttons">';
      $j = 0;
for($i = $blog['id'] - 1 ; $i > 1; $i = $i - 1 ) {
  if(blog_id_exists($i)) {
    $prev_blog_id = $i;
    echo '
      <div>
        <a href="blog.php?blog_id='.$prev_blog_id.'"><i class="fas fa-hand-point-left"></i>Prev</a>
      </div>
    ';
    $j = 1;
    break;
  }
}
if ($j == 0) {
  echo '
    <div class="prevented">
      <a href="#"><i class="fas fa-hand-point-left"></i>Prev</a>
    </div>
  ';
}
      $k = 0;

for($i = $blog['id'] + 1 ; $i <= last_blog_id(); $i++) {
  if(blog_id_exists($i) == 20) {
    $next_blog_id = $i;
    echo '
      <div>
        <a href="blog.php?blog_id='.$next_blog_id.'"><i class="fas fa-hand-point-right"></i>Next</a>
      </div>
    ';
    $k = 1;
    break;
  }
}
if ($k == 0) {
  echo '
    <div class="prevented">
      <a href="#"><i class="fas fa-hand-point-right"></i>Next</a>
    </div>
  ';
}

echo '
  </div></article></div></section>
';