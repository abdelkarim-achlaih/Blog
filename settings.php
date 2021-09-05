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
<section class="box border">
  <div class="container">
    <div class="box-container update">
      <div class="title">
        <h3><i class="fas fa-user-edit"></i>Update your info</h3>
      </div>
      <form action="config.php?option=update" method="POST" class="sign update-form">
        <div class="field">
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
        </div>
        <div class="field">
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
        </div>
        <div class="field">
          <label for="username" class='disabled'>Username</label>  
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
        </div>
        <div class="field">
          <label for="email" class='disabled'>Email</label>  
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
        </div>
        <div class="field">
          <label for="password">Old password</label>
          <input
          type="password"
          placeholder="Your old password"
          name="password"
          id="password"
          required
          />
        </div>
        <div class="field">
          <label for="new_password">New password</label>
          <input
          type="password"
          placeholder="Your new password"
          name="new_password"
          id="new_password"
          />
        </div>
        <div class="field">
          <label for="re_new_password">Re-tap your new password</label>
          <input
          type="password"
          placeholder="Re-tap your new password"
          name="re_new_password"
          id="re_new_password"
          />
        </div>
        <div class="checkbox-container">
          <div class="checkbox">
            <div class="checkbox-title">
              Categories you are intersted in
            </div>
              <input 
                type="radio"
                name="category"
                value="1"
                id="products"
                required
              />
              <label for="products">products</label>
              <br><br>
              <input
                type="radio"
                name="category"
                value="2"
                id="self-developement"
                required
              />
              <label for="self-developement">self-developement</label>
              <br><br>
              <input
                type="radio"
                name="category"
                value="3"
                id="sport"
                required
              />
              <label for="sport">sport</label>
              <br><br>
              <input
                type="radio"
                name="category"
                value="4"
                id="nature"
                required
              />
              <label for="nature">nature</label>
              <br><br>
              <input
                type="radio"
                name="category"
                value="5"
                id="work"
                required
              />
              <label for="work">work</label>
              <br><br>
              <input
                type="radio"
                name="category"
                value="6"
                id="school"
                required
              />
              <label for="school">school</label>
          </div>
          <div class="checkbox">
            <div class="checkbox-title">
              Gender
            </div>
              <input 
                type="radio"
                name="gender"
                value="1"
                id="male"
                required
              />
              <label for="male">male</label>
              <br><br>
              <input
                type="radio"
                name="gender"
                value="2"
                id="female"
                required
              />
              <label for="female">female</label>
          </div>
        </div>

        <input type="submit" value="Update profile" class="main-button" />
      </form>
    </div>
  </div>
</section>
<section class="box">
  <div class="container">
    <div class="box-container update">
      <div class="title red">
        <h3><i class="fas fa-ban"></i>Delete your account</h3>
      </div>
      <p>Once you delete your account, there is no going back. Please be certain.</p>
      <form action="config.php?option=delete" method="POST" class="sign update-form">
        <div class="field red">
          <label for="password">Password</label>
          <input
          type="password"
          placeholder="Your password"
          name="password"
          id="password"
          required
          />
        </div>
        <input type="submit" class="main-button red" value="Delete your account">
      </form>
    </div>
  </div>
</section>
<?php include('footer.php'); ?>