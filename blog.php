<?php
require('functions.php');
error('config.php', 2);
error('config.php', 4);
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  if(isset($_GET['blog_id'])) {
    require('blogs.php');
    require('users.php');
    require('comments.php');
    if(blog_exists($_GET['blog_id'])) {
      $blog = get_blog($_GET['blog_id']);
      $blog['views']++;
      add_view($blog);
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
    }
    else {
      $_SESSION['message_source'] = 'blog.php';
      $_SESSION['message_error'] = "Blog not found";
      header('location: error.php');
    }
echo '
<section class="blog-page">
  <div class="container">
    <article>
      <div class="image">
        <img src="uploads/bg/'.$blog['bg'].'" alt="Blog photo" />
        <div class="author-image"><a href="accounts.php?user='.$user['id'].'">
          <img ';
          echo '
          src="uploads/avatar/'.$user['avatar'].'"
          ';
          echo '" alt="Blog author" />
          </a>
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
        <div class="num-of-views">
          <i class="fas fa-eye"></i>'.$blog['views'].' View(s)
        </div>
        <div class="date">
          <i class="fas fa-calendar-alt"></i>'.edit_date($blog['creation_date']).'
        </div>
      </div>
      <div class="star soon">
        <i class="far fa-star"></i>Give a star
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
      <p href="#"><i class="fas fa-hand-point-left"></i>Prev</p>
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
      <p href="#"><i class="fas fa-hand-point-right"></i>Next</p>
    </div>
  ';
}
        echo'
      </div>
      <hr />
      <div class="comments">
        <div class="div-title">'.num_of_comments_blog($blog['id']).' Comment(s)</div>';
        $comments = get_blog_comments($blog);
        if (!empty($comments)) {
          foreach($comments as $comment) {
            $author_infos = get_user_infos_from_id($comment['author']);
            echo '
              <div class="comment">
                <div class="author-img"><a href="accounts.php?user='.$author_infos['id'].'">
                  <img src="uploads/avatar/'.$author_infos['avatar'].'"';
                  echo '.png" alt="'.ucfirst($author_infos['first_name']).' '.ucfirst($author_infos['last_name']).'" />
                </a>
                  </div>
                <div class="comment-info">
                  <div class="comment-author">
                    '.ucfirst($author_infos['first_name']).' '.ucfirst($author_infos['last_name']).'
                    <div class="reply soon"><i class="fas fa-reply"></i>Reply</div>
                  </div>
                  <div class="comment-date">'.edit_date($comment['creation_date']).'</div>
                  <div class="comment-content">
                    '.$comment['content'].'
                  </div>
                </div>
              </div>
            ';
          }
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
        <textarea name="content" ';
        if(!isset($_SESSION['id'])) {
          echo ' disabled placeholder="Please sign in first !"';
        }
        else {
          echo ' placeholder="Comment"';
        }
        echo'  ></textarea>
        <input type="submit" value="Post Comment" class="main-button"';
        if(!isset($_SESSION['id'])) {
          echo ' disabled';
        }
        echo ' />
      </form>
    </article>
    <aside>
      <div class="aside-blogs">
        <div class="aside-title">Most seen</div>';
      $blogs_seen = get_blogs('SELECT * FROM blogs WHERE pending = 0 ORDER BY views DESC LIMIT 3');
      foreach($blogs_seen as $blog_seen) {
        $user_seen = get_user_infos_from_id($blog_seen['author']);
        echo '
          <div class="a-blog">
            <div class="a-blog-image">
              <a href="blog.php?blog_id='.$blog_seen['id'].'"><img src="uploads/bg/'.$blog_seen['bg'].'" alt="Blog image" /></a>
            </div>
            <div class="a-blog-info">
              <div class="a-blog-author">
                '.$blog_seen['title'].'
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
        $blogs_latest = get_blogs('SELECT * FROM blogs WHERE pending = 0 ORDER BY creation_date ASC LIMIT 3');
        foreach($blogs_latest as $blog_latest) {
          $user_latest = get_user_infos_from_id($blog_latest['author']);
          echo '
            <div class="a-blog">
              <div class="a-blog-image">
                <a href="blog.php?blog_id='.$blog_latest['id'].'"><img src="uploads/bg/'.$blog_latest['bg'].'" alt="Blog image" /></a>
              </div>
              <div class="a-blog-info">
                <div class="a-blog-author">
                  '.$blog_latest['title'].'
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
            <li><a href="config.php?option=filter_category&category='.$category['id'].'">'.$category['name'].'</a><span class="num">( '.$numbers_of_categories_blogs[$m].' )</span></li>
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
