<?php
session_start();
$title = 'Settings | '.ucfirst($_SESSION['first_name']).' '.ucfirst($_SESSION['last_name']);
require_once('header.php');
require('functions.php');
if(isset($_SESSION['message_source'])) {
  if($_SESSION['message_source'] == 'config.php') {
    if(isset($_SESSION['message_success'])) {
      show_message ($_SESSION['message_success'], 'Success');
      unset($_SESSION['message_success']);
    }
    if(isset($_SESSION['message_error'])) {
      show_message ($_SESSION['message_error'], 'Error');
      unset($_SESSION['message_error']);
    }
  }
}
?>
<section class="data">
  <div class="container">
    <div class="form user-update">
      <div class="title">
        <h3><i class="fas fa-user-edit"></i>Update your info</h3>
      </div>
      <form action="config.php?option=update" method="POST" enctype="multipart/form-data">
        <label for="first_name">first-name</label>
        <input
          type="text"
          placeholder="Your first-name"
          name="first_name"
          id="first_name"
          required
          class='in'
          <?php
            echo ' value="'.$_SESSION['first_name'].'"';
          ?>
        />
        <label for="last_name">last-name</label>  
        <input
          type="text"
          placeholder="Your last-name"
          name="last_name"
          id="last_name"
          required
          <?php
            echo ' value="'.$_SESSION['last_name'].'"';
          ?>
        />
        <label for="username">Username</label>  
        <input
          type="text"
          placeholder="Your username"
          name="username"
          id="username"
          required
          disabled
          <?php
            echo ' value="'.$_SESSION['username'].'"';
          ?>
        />
        <label for="email">Email</label>  
        <input
          type="mail"
          placeholder="Your email"
          name="email"
          id="email"
          required
          disabled
          <?php
            echo ' value="'.$_SESSION['email'].'"';
          ?>
        />
        <label for="password">Old password</label>
        <input
        type="password"
        placeholder="Your old password"
        name="password"
        id="password"
        required
        />
        <label for="new_password">New password</label>
        <input
        type="password"
        placeholder="Your new password"
        name="new_password"
        id="new_password"
        />
        <label for="re_new_password">Re-tap your new password</label>
        <input
        type="password"
        placeholder="Re-tap your new password"
        name="re_new_password"
        id="re_new_password"
        />
        <div class="checkbox-title" style="margin-bottom:20px;">
          Update you avatar
        </div>
        <input 
          type="file" 
          name="avatar" 
          id="avatar" 
          class="upload"
        />
        <div class="checkbox-container">
          <div class="checkbox">
            <div class="checkbox-title">
              Category you are intersted in
            </div>
            <?php 
              require('categories.php');
              $num = number_of_categories();
              for($i=0; $i<$num; $i++) {
                $category = get_category_infos($i+1);
                echo '<input 
                type="radio"
                name="category"
                required';
                echo ' value="'.($i+1).'"
                id="'.  $category['name'].'"';
                if($category['id']==$_SESSION['category']) {
                  echo ' checked';
                }
                echo '/>';
                echo '<label for="'.$category['name'].'">'.$category['name'].'</label>';
                if($i+1 <> $num) {
                  echo '<br><br>';
                }
                else {
                  echo '</div>';
                }
              }
            ?>
          <div class="checkbox">
            <div class="checkbox-title">
              Modify your gender
            </div>
              <input 
                type="radio"
                name="gender"
                value="1"
                id="male"
                <?php 
                  if($_SESSION['gender']==1) {
                    echo ' checked';
                  }
                ?>
                required
              /><label for="male">male</label>
              <br><br>
              <input
                type="radio"
                name="gender"
                value="2"
                id="female"
                <?php 
                  if($_SESSION['gender']==2) {
                    echo ' checked';
                  }
                ?>
                required
              /><label for="female">female</label>
          </div>
        </div>

        <input type="submit" value="Update profile" class="main-button" />
      </form>
    </div>
  </div>
</section>


<section class="data">
  <div class="container">
    <div class="form user-delete">
      <div class="title">
        <h3><i class="fas fa-ban"></i>Delete your account</h3>
      </div>
      <p>Once you delete your account, there is no going back. Please be certain.</p>
      <form action="config.php?option=delete" method="POST">
        <label for="password">Password</label>
        <input
        type="password"
        placeholder="Your password"
        name="password"
        id="password"
        required
        />
        <input type="submit" class="main-button" value="Delete your account">
      </form>
    </div>
  </div>
</section>
<?php include('footer.php'); ?>