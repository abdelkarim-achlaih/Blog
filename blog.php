<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  if(isset($_GET['blog_id'])) {
    require('blogs.php');
    require('users.php');
    require('comments.php');
    require('functions.php');
    $blog = get_blog($_GET['blog_id']);
    $user = get_user_infos_from_id($blog['author']);
    $title = 'Blog post | '.$blog['title'];
    require_once('header.php');
    if(isset($_SESSION['message_source'])) {
      if($_SESSION['message_source'] == 'config.php') {
        if(isset($_SESSION['message_index'])) {
          show_index_message($_SESSION['message_index']);
          unset($_SESSION['message_index']);
        }
      }
    }
echo '
<section class="blog-page">
  <div class="container">
    <article>
      <div class="image">
        <img src="images/'.$blog['category'].'.jpg" alt="Blog photo" />
        <div class="author-image">
          <img ';
          if($user['gender'] == 1) {
          echo '
          src="images/avatar-man.png"
          ';
        }
        if($user['gender'] == 2) {
          echo '
          src="images/avatar-woman.png"
          ';
        }
          echo '" alt="Blog author" />
        </div>
      </div>
      <div class="info">
        <div class="title">
          <i class="fas fa-heading"></i>
          '.$blog['title'].'
        </div>
        <div class="author">
          <i class="fas fa-pencil-alt"></i>'.ucfirst($user['first_name']).' '.ucfirst($user['last_name']).'
        </div>
        <div class="num-of-comments">
          <i class="fas fa-comments"></i>'.num_of_comments_blog($blog['id']).' Comment(s)
        </div>
        <div class="date">
          <i class="fas fa-calendar-alt"></i>'.edit_date($blog['creation_date']).'
        </div>
      </div>
      <div class="content">
        '.$blog['content'].'
      </div>
      <div class="tags">
        Tags:
        <div class="tag"><a href="#">'.ucfirst($blog['category']).'</a></div>
      </div>
      <div class="nav-buttons">
        ';
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
        echo'
      </div>
      <hr />
      <div class="comments">
        <div class="div-title">'.num_of_comments_blog($blog['id']).' Comment(s)</div>';
        $comments = get_blog_comments($blog);
        foreach($comments as $comment) {
          $author_infos = get_user_infos_from_id($comment['author']);
          echo '
            <div class="comment">
              <div class="author-img">
                <img src="images/avatar-';
                if($author_infos['gender'] == 1) {
                  echo 'man';
                }
                else {
                  echo 'woman';
                }
                echo '.png" alt="'.ucfirst($author_infos['first_name']).' '.ucfirst($author_infos['last_name']).'" />
              </div>
              <div class="comment-info">
                <div class="comment-author">
                  '.ucfirst($author_infos['first_name']).' '.ucfirst($author_infos['last_name']).'
                  <div class="reply"><i class="fas fa-reply"></i>Reply</div>
                </div>
                <div class="comment-date">'.edit_date($comment['creation_date']).'</div>
                <div class="comment-content">
                  '.$comment['content'].'
                </div>
              </div>
            </div>
          ';
        }
        echo '
      </div>
      <form action="config.php?option=comment-add" method="POST">';
      if(isset($_SESSION['id'])) {
        $_SESSION['comment_author'] = $_SESSION['id'];
      }
      $_SESSION['comment_blog'] = $_GET['blog_id'];
      echo '
        <div class="div-title">Post Your Comment</div>
        <textarea name="content" placeholder="Comment"></textarea>
        <input type="submit" value="Post Comment" class="main-button" />
      </form>
    </article>
    <aside>
      <div class="aside-blogs">
        <div class="aside-title">Most seen</div>';
      $blogs_seen = get_blogs('SELECT * FROM blogs ORDER BY views DESC LIMIT 3');
      foreach($blogs_seen as $blog_seen) {
        $user_seen = get_user_infos_from_id($blog_seen['author']);
        echo '
          <div class="a-blog">
            <div class="a-blog-image">
              <a href="#"><img src="images/'.$blog_seen['category'].'.jpg" alt="Blog image" /></a>
            </div>
            <div class="a-blog-info">
              <div class="a-blog-author">
                '.ucfirst($user_seen['first_name']).' '. ucfirst($user_seen['last_name']).'
                <div class="a-blog-type">'.$blog_seen['category'].'</div>
              </div>
              <div class="a-blog-date">'.edit_date($blog_seen['creation_date']).'</div>
              <div class="a-blog-Content">
                '.substr($blog_seen['content'], 0, 50). '...'.'
              </div>
            </div>
          </div>
        ';
      }
      echo '
      </div>
      <div class="aside-blogs">
        <div class="aside-title">Recent posts</div>';
        $blogs_latest = get_blogs('SELECT * FROM blogs ORDER BY creation_date ASC LIMIT 3');
        foreach($blogs_latest as $blog_latest) {
          $user_latest = get_user_infos_from_id($blog_latest['author']);
          echo '
            <div class="a-blog">
              <div class="a-blog-image">
                <a href="#"><img src="images/'.$blog_latest['category'].'.jpg" alt="Blog image" /></a>
              </div>
              <div class="a-blog-info">
                <div class="a-blog-author">
                  '.ucfirst($user_latest['first_name']).' '. ucfirst($user_latest['last_name']).'
                  <div class="a-blog-type">'.$blog_latest['category'].'</div>
                </div>
                <div class="a-blog-date">'.edit_date($blog_latest['creation_date']).'</div>
                <div class="a-blog-Content">
                  '.substr($blog_latest['content'], 0, 50). '...'.'
                </div>
              </div>
            </div>
          ';
        }
        echo '
      </div>
      <div class="aside-blogs">
        <div class="aside-title">Categories</div>
        <ul>';
        require('categories.php');
        $number_of_categories = number_of_categories();
        $numbers_of_categories_blogs = number_of_categories_blogs($number_of_categories);
        $m = 1;
        while($m <= $number_of_categories) {
          $category = get_category_infos($m);
          echo '
            <li><a href="">'.$category['name'].'</a><span class="num">( '.$numbers_of_categories_blogs[$m].' )</span></li>
          ';
          $m = $m + 1;
        }
        echo '
          </ul>
      </div>
    </aside>
  </div>
</section>
';
  }
  else {
    $_SESSION['message_source'] = 'blog.php';
    $_SESSION['message_error'] = "The page requested is not found";
    header("location: index.php");
  }
}
else {
  $_SESSION['message_source'] = 'blog.php';
  $_SESSION['message_error'] = "The page requested is not found";
  header("location: index.php");
}
require_once('footer.php');
