<?php
session_start();
$title = 'Blog post | ### ';
require_once('header.php');
?>
<section class="blog-page">
  <div class="container">
    <article>
      <div class="image">
        <img src="images/technology.jpg" alt="Blog photo" />
        <div class="author-image">
          <img src="images/avatar-man.png" alt="Blog author" />
        </div>
      </div>
      <div class="info">
        <div class="title">
          <i class="fas fa-heading"></i>Lorem ipsum dolor sit amet
          consectetur adipisicing elit.
        </div>
        <div class="author">
          <i class="fas fa-pencil-alt"></i>Abdelkarim Achlaih
        </div>
        <div class="num-of-comments">
          <i class="fas fa-comments"></i>28 comments
        </div>
        <div class="date">
          <i class="fas fa-calendar-alt"></i>21 Avril 2021
        </div>
      </div>
      <div class="content">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
        eos ut odio harum exercitationem nesciunt repudiandae commodi
        obcaecati libero saepe quasi dolor incidunt ullam numquam dolorum
        voluptates dolores ipsam fugiat. Lorem ipsum dolor sit amet
        consectetur adipisicing elit. Aperiam, eos ut odio harum
        exercitationem nesciunt repudiandae commodi obcaecati libero saepe
        quasi dolor incidunt ullam numquam dolorum voluptates dolores ipsam
        fugiat. Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Aperiam, eos ut odio harum exercitationem nesciunt repudiandae
        commodi obcaecati libero saepe quasi dolor incidunt ullam numquam
        dolorum voluptates dolores ipsam fugiat.
      </div>
      <div class="tags">
        Tags:
        <div class="tag"><a href="#">School</a></div>
        <div class="tag"><a href="#">Work</a></div>
        <div class="tag"><a href="#">self-development</a></div>
        <div class="tag"><a href="#">Nature</a></div>
      </div>
      <div class="nav-buttons">
        <div class="prev">
          <a href="#"><i class="fas fa-hand-point-left"></i>Prev</a>
        </div>
        <div class="next">
          <a href="#"><i class="fas fa-hand-point-right"></i>Next</a>
        </div>
      </div>
      <hr />
      <div class="comments">
        <div class="div-title">02 Comments</div>
        <div class="comment">
          <div class="author-img">
            <img src="images/avatar-man.png" alt="" />
          </div>
          <div class="comment-info">
            <div class="comment-author">
              Abdelkarim Achlaih
              <div class="reply"><i class="fas fa-reply"></i>Reply</div>
            </div>
            <div class="comment-date">21 Avril 2021 23:05:14</div>
            <div class="comment-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Aperiam, eos ut odio harum exercitationem
            </div>
          </div>
        </div>
        <div class="comment">
          <div class="author-img">
            <img src="images/avatar-woman.png" alt="" />
          </div>
          <div class="comment-info">
            <div class="comment-author">
              Hind Benkirane
              <div class="reply"><i class="fas fa-reply"></i>Reply</div>
            </div>
            <div class="comment-date">21 Avril 2021 23:05:14</div>
            <div class="comment-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Aperiam, eos ut odio harum exercitationem
            </div>
          </div>
        </div>
      </div>
      <form action="#" method="POST">
        <div class="div-title">Post Your Comment</div>
        <textarea name="comment" placeholder="Comment"></textarea>
        <input type="submit" value="Post Comment" class="main-button" />
      </form>
    </article>
    <aside>
      <div class="aside-blogs">
        <div class="aside-title">Most popular</div>
        <div class="a-blog">
          <div class="a-blog-image">
            <a href="#"><img src="images/nature.jpg" alt="Blog image" /></a>
          </div>
          <div class="a-blog-info">
            <div class="a-blog-author">
              abdelkarim achlaih
              <div class="a-blog-type">Work</div>
            </div>
            <div class="a-blog-date">2021-08-15</div>
            <div class="a-blog-Content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </div>
          </div>
        </div>
        <div class="a-blog">
          <div class="a-blog-image">
            <a href="#"><img src="images/nature.jpg" alt="Blog image" /></a>
          </div>
          <div class="a-blog-info">
            <div class="a-blog-author">
              abdelkarim achlaih
              <div class="a-blog-type">Work</div>
            </div>
            <div class="a-blog-date">2021-08-15</div>
            <div class="a-blog-Content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </div>
          </div>
        </div>
      </div>
      <div class="aside-blogs">
        <div class="aside-title">Recent posts</div>
        <div class="a-blog">
          <div class="a-blog-image">
            <a href="#"><img src="images/nature.jpg" alt="Blog image" /></a>
          </div>
          <div class="a-blog-info">
            <div class="a-blog-author">
              abdelkarim achlaih
              <div class="a-blog-type">Work</div>
            </div>
            <div class="a-blog-date">2021-08-15</div>
            <div class="a-blog-Content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </div>
          </div>
        </div>
        <div class="a-blog">
          <div class="a-blog-image">
            <a href="#"><img src="images/nature.jpg" alt="Blog image" /></a>
          </div>
          <div class="a-blog-info">
            <div class="a-blog-author">
              abdelkarim achlaih
              <div class="a-blog-type">Work</div>
            </div>
            <div class="a-blog-date">2021-08-15</div>
            <div class="a-blog-Content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </div>
          </div>
        </div>
      </div>
      <div class="aside-blogs">
        <div class="aside-title">Categories</div>
        <ul>
          <li><a href="">Work</a><span class="num">( 2 )</span></li>
          <li><a href="">School</a><span class="num">( 2 )</span></li>
          <li><a href="">Work</a><span class="num">( 2 )</span></li>
          <li><a href="">School</a><span class="num">( 2 )</span></li>
          <li><a href="">Work</a><span class="num">( 2 )</span></li>
        </ul>
      </div>
    </aside>
  </div>
</section>
<?php 
  require_once('footer.php');
?>