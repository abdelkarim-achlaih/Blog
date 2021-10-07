<?php
session_start();
$title = $_SESSION['category'] . ' blogs';
require('header.php');
require('functions.php');
?>
<section class="articles">
  <div class="container">
    <?php 
      if (isset($_SESSION['filtred_blogs_by_categories'])):
        $number_of_filtred_blogs = count($_SESSION['filtred_blogs_by_categories']);
        $supported = 3;
        $number_of_pages = $number_of_filtred_blogs / $supported;
        if(!isset($_GET['page'])) {
          $page = 0;
        }
        else {
          $page = $_GET['page'];
        }
        $end = $page * $supported + $supported;
        if($number_of_filtred_blogs < $supported):
          $end = $number_of_filtred_blogs;
        endif;
        for($i = $page * $supported; $i < $end; $i++) :
          for($m=1; $m<100; $m++):
            if($number_of_filtred_blogs + $m == $end) {
              $end -= $m;
              break;
            }
          endfor;
            echo '
              <a class="article" href="blog.php?blog_id='.$_SESSION['filtred_blogs_by_categories'][$i]['id'].'">
                <div class="image"><img src="uploads/bg/'.$_SESSION['filtred_blogs_by_categories'][$i]['bg'].'" /></div>
                <div class="content">
                  <div class="type">'.$_SESSION['filtred_blogs_by_categories'][$i]['category'].'</div>
                  <div class="title">'.$_SESSION['filtred_blogs_by_categories'][$i]['title'].'</div>
                  <div class="date">'.edit_date($_SESSION['filtred_blogs_by_categories'][$i]['creation_date']).'</div>
                </div>
              </a>
            ';
          
          endfor;
      endif;
    ?>
  </div>
</section>
<section class='pagination'>
  <div class="container">
    <?php
      if(!isset($number_of_pages)) {
          echo 'There is no '.$_SESSION['category'].' blog yet';
        }
        else {
          for ($j = 0; $j < $number_of_pages; $j++):
            echo '<a class="main-button" href="category.php?page='.$j.'">'.($j + 1).'</a>';
          endfor;
        }
      
    ?>
  </div>
</section>
<?php
require('footer.php');
?>