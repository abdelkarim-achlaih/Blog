<?php
session_start();
$title = 'Account | '.ucfirst($_SESSION['first_name']).' '.ucfirst($_SESSION['last_name']);
require_once('header.php');
require('functions.php');
error('blog-settings', 1);
?>
<section class="account">
  <div class="container">
    <div class="info">
      <div class="img"><img 
      <?php 
        if(isset($_SESSION['avatar'])) {
          echo '
          src="uploads/avatar/'.$_SESSION['avatar'].'"
          ';
        }
      ?>
      alt="#" /></div>
      <p class="full-name"><?php echo ucfirst($_SESSION['first_name']).' '.ucfirst($_SESSION['last_name']); ?></p>
      <p class="user-name"><?php echo $_SESSION['username']; ?></p>
      <a href="settings.php" class="main-button">Edit profile</a>
      <div class="stats soon">
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
    <div class="user-blogs">
      <div class="blogs-container">
        <div class="title">
          <?php
            require('blogs.php');
            $user['id'] = $_SESSION['id'];
            $blogs = get_user_blogs($user);
            if (isset($blogs)) {
              $num_of_blogs = number_of_user_blogs($user);
              $num_of_pending_blogs = number_of_user_pending_blogs($user);
              $num_of_existed_blogs = $num_of_blogs - $num_of_pending_blogs;
              if($num_of_existed_blogs > 0 && $num_of_pending_blogs > 0) {
                echo '
                      <i class="fas fa-file-alt"></i>
                      '.ucfirst($_SESSION['first_name']).'\'s blogs ( <span>'.$num_of_existed_blogs.'</span> )
                    </div><!-- .title closed -->
                    <div class="blogs">
                ';
                for ($i = 0; $i < count($blogs); $i = $i + 1) {
                  if($blogs[$i]['pending'] == 0) {
                    echo '
                      <div class="blog">
                        <div class="blog-image">
                          <img src="uploads/bg/'.$blogs[$i]['bg'].'" alt="" />
                        </div>
                        <div class="blog-info">
                          <div class="title"><a href="blog.php?blog_id='.$blogs[$i]['id'].'">'.$blogs[$i]['title'].'</a></div>
                          <div class="type">'.$blogs[$i]['category'].'</div>
                          <div class="date"><i class="far fa-clock"></i>'.edit_date($blogs[$i]['creation_date']).'</div>
                          <div class="edit">
                            <a href="blog-settings.php?blog='.$blogs[$i]['id'].'">
                              <i class="far fa-keyboard"></i>Edit blog
                            </a>
                          </div>
                        </div>
                      </div><!-- .blog closed -->
                
                ';
                  }
                }
                echo '</div><!-- .blogs closed -->';
                echo '</div><!-- .blogs-container closed -->';
                echo '
                  <div class="blogs-container">
                    <div class="title">
                    <i class="fas fa-hourglass-half"></i>
                    '.ucfirst($_SESSION['first_name']).'\'s pending blogs ( <span>'.$num_of_pending_blogs.'</span> )
                    </div><!-- .title closed -->
                    <div class="blogs">
                ';
                for ($i = 0; $i < count($blogs); $i = $i + 1) {
                  if($blogs[$i]['pending'] == 1) {
                    echo '
                      <div class="blog">
                        <div class="blog-image">
                          <img src="uploads/bg/'.$blogs[$i]['bg'].'" alt="" />
                        </div>
                        <div class="blog-info">
                          <div class="pending"><i class="fas fa-hourglass-half"></i>Pending</div>
                          <div class="title"><a href="#">'.$blogs[$i]['title'].'</a></div>
                          <div class="type">'.$blogs[$i]['category'].'</div>
                          <div class="date"><i class="far fa-clock"></i>'.edit_date($blogs[$i]['creation_date']).'</div>
                          <div class="edit">
                            <a href="blog-settings.php?blog='.$blogs[$i]['id'].'">
                              <i class="far fa-keyboard"></i>Edit blog
                            </a>
                          </div>
                        </div>
                      </div><!-- .blog closed -->
                    ';
                  }
                }
                echo '</div><!-- .blogs closed -->';
                echo '</div><!-- .blogs-container closed -->';
              }
              if($num_of_existed_blogs > 0 && $num_of_pending_blogs == 0) {
                echo '
                      <i class="fas fa-file-alt"></i>
                      '.ucfirst($_SESSION['first_name']).'\'s blogs ( <span>'.$num_of_existed_blogs.'</span> )
                    </div><!-- .title closed -->
                    <div class="blogs">
                ';
                for ($i = 0; $i < count($blogs); $i = $i + 1) {
                  if($blogs[$i]['pending'] == 0) {
                    echo '
                      <div class="blog">
                        <div class="blog-image">
                          <img src="uploads/bg/'.$blogs[$i]['bg'].'" alt="" />
                        </div>
                        <div class="blog-info">
                          <div class="title"><a href="blog.php?blog_id='.$blogs[$i]['id'].'">'.$blogs[$i]['title'].'</a></div>
                          <div class="type">'.$blogs[$i]['category'].'</div>
                          <div class="date"><i class="far fa-clock"></i>'.edit_date($blogs[$i]['creation_date']).'</div>
                          <div class="edit">
                            <a href="blog-settings.php?blog='.$blogs[$i]['id'].'">
                              <i class="far fa-keyboard"></i>Edit blog
                            </a>
                          </div>
                        </div>
                      </div><!-- .blog closed -->
                
                ';
                  }
                }
                echo '</div><!-- .blogs closed -->';
                echo '</div><!-- .blogs-container closed -->';
                echo '
                  <div class="blogs-container">
                    <div class="title">
                      <i class="fas fa-hourglass-half"></i>
                      '.ucfirst($_SESSION['first_name']).'\'s pending blogs ( You don\'t have any pending blog start blogging <span><a href="post.php">now</a></span> )
                    </div>
                  </div>
                ';

              }
              if($num_of_existed_blogs == 0 && $num_of_pending_blogs > 0) {
                  echo '
                    <i class="fas fa-file-alt"></i>
                    '.ucfirst($_SESSION['first_name']).'\'s blogs ( You don\'t have any blog start blogging <span><a href="post.php">now</a></span> )
                  </div>
                </div>
                ';
                  echo '
                  <div class="blogs-container">
                    <div class="title">
                    <i class="fas fa-hourglass-half"></i>
                    '.ucfirst($_SESSION['first_name']).'\'s pending blogs ( <span>'.$num_of_pending_blogs.'</span> )
                    </div><!-- .title closed -->
                    <div class="blogs">
                ';
                for ($i = 0; $i < count($blogs); $i = $i + 1) {
                  if($blogs[$i]['pending'] == 1) {
                    echo '
                      <div class="blog">
                        <div class="blog-image">
                          <img src="uploads/bg/'.$blogs[$i]['bg'].'" alt="" />
                        </div>
                        <div class="blog-info">
                          <div class="pending"><i class="fas fa-hourglass-half"></i>Pending</div>
                          <div class="title"><a href="#">'.$blogs[$i]['title'].'</a></div>
                          <div class="type">'.$blogs[$i]['category'].'</div>
                          <div class="date"><i class="far fa-clock"></i>'.edit_date($blogs[$i]['creation_date']).'</div>
                          <div class="edit">
                            <a href="blog-settings.php?blog='.$blogs[$i]['id'].'">
                              <i class="far fa-keyboard"></i>Edit blog
                            </a>
                          </div>
                        </div>
                      </div><!-- .blog closed -->
                    ';
                  }
                }
                echo '</div><!-- .blogs closed -->';
                echo '</div><!-- .blogs-container closed -->';
              }
            }
            else {
              echo '
                    <i class="fas fa-file-alt"></i>
                    '.ucfirst($_SESSION['first_name']).'\'s blogs ( You don\'t have any blog start blogging <span><a href="post.php">now</a></span> )
                  </div>
                </div>
                <div class="blogs-container">
                  <div class="title">
                    <i class="fas fa-hourglass-half"></i>
                    '.ucfirst($_SESSION['first_name']).'\'s pending blogs ( You don\'t have any pending blog start blogging <span><a href="post.php">now</a></span> )
                  </div>
                </div>
              ';
            }
          ?>
        
    </div>

  </div>
</section>
<?php 
  require_once('footer.php');
?>