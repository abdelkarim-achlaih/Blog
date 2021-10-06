<?php
session_start();
$error = array();
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['blog'])) {
    require('blogs.php');
    if(blog_exists($_GET['blog'])) {
      $blog = get_all_types_of_blog($_GET['blog']);
      $_SESSION['edited_blog_id'] = $blog['id'];
      if($blog['author'] !== $_SESSION['id']) {
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
}
else {
  $error[] = 1;
}
if (!empty($error)) {
  $_SESSION['message_error'] = "You are not permited to see this page this way: informations are not sent properly";
  header("location: error.php");
  exit;
}
$title = 'Edit '.ucwords($blog['title']);
require_once('header.php');
require('functions.php');
error('blog-settings', 2);
error('blog-settings', 4);
?>
<section class="data">
  <div class="container">
    <div class="form user-update">
      <div class="title">
        <h3><i class="fas fa-plus"></i>Edit post</h3>
      </div>
      <form action="config.php?option=blog-update" method="POST" enctype="multipart/form-data">
        <input type="text" 
          <?php
            if (isset($blog['title'])) {
              echo 'value="'.$blog['title'].'" ';
            }
          ?>
          name='title'
        />
        <textarea
          name="content"
          rows="15"
          cols="15"
        ><?php
              if (isset($blog['content'])) {
                echo $blog['content'];
              }
        ?></textarea>
        <div class="checkbox-container">
          <div class="checkbox">
            <div class="checkbox-title">
              Category of the blog
            </div>
            <input 
              type="radio"
              name="category"
              value="1"
              id="technology"
              required
              <?php
                if(isset($blog['category'])) {
                  if($blog['category'] == 'technology') {
                    echo 'checked';
                  }
                }
              ?>
            />
            <label for="technology">technology</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="2"
              id="self-development"
              required
              <?php
                if(isset($blog['category'])) {
                  if($blog['category'] == 'self-development') {
                    echo 'checked';
                  }
                }
              ?>
            />
            <label for="self-development">self-development</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="3"
              id="sport"
              required
              <?php
                if(isset($blog['category'])) {
                  if($blog['category'] == 'sport') {
                    echo 'checked';
                  }
                }
              ?>
            />
            <label for="sport">sport</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="4"
              id="nature"
              required
              <?php
                if(isset($blog['category'])) {
                  if($blog['category'] == 'nature') {
                    echo 'checked';
                  }
                }
              ?>
            />
            <label for="nature">nature</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="5"
              id="work"
              required
              <?php
                if(isset($blog['category'])) {
                  if($blog['category'] == 'work') {
                    echo 'checked';
                  }
                }
              ?>
            />
            <label for="work">work</label>
            <br><br>
            <input
              type="radio"
              name="category"
              value="6"
              id="school"
              required
              <?php
                if(isset($blog['category'])) {
                  if($blog['category'] == 'school') {
                    echo 'checked';
                  }
                }
              ?>
            />
            <label for="school">school</label>
          </div>
        </div>
        <div class="checkbox-title" style="margin-bottom:20px;margin-top:40px;">
          Update the background of your blog
        </div>
        <input 
          type="file" 
          name="bg" 
          id="bg" 
          class="upload"
        />
        <input 
          type="submit" 
          value="Update Blog" 
          class="main-button" 
        />
      </form>
    </div>
  </div>
</section>

<section class="data">
  <div class="container">
    <div class="form user-delete">
      <div class="title">
        <h3><i class="fas fa-ban"></i>Delete your blog</h3>
      </div>
      <p>Once you delete your blog, there is no going back. Please be certain.</p>
      <form action="config.php?option=blog-delete" method="POST">
        <label for="password">Password</label>
        <input
        type="password"
        placeholder="Your password"
        name="password"
        id="password"
        required
        />
        <input type="submit" class="main-button" value="Delete your blog">
      </form>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>