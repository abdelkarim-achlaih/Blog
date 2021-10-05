<?php
session_start();
if(isset($_SESSION['message_source'])) {
  if(isset($_SESSION['message_error'])) :
    $title = 'Error | 404 Not Found !';
    require_once('header.php');
    echo '
    <section style="height: 70vh;"></section>
    <section class="landing" style="top:-50px;">
      <div class="container">
        <div class="content error">
          <div class="message red">
            <h4>Error</h4>
            <div class="message-name">';
              echo $_SESSION['message_error'].'
              <br> Back to <a href="index.php">Home</a>';
              echo '
            </div>
          </div>
        </div>
        <div class="landing-image">
          <img src="images/error.png" alt="" style="width:70%;"/>
        </div>
      </div>
    </section>';
    require('footer.php');
    unset($_SESSION['message_source']);
    unset($_SESSION['message_error']);
  endif;
}
else {
  $_SESSION['message_source'] = "error.php";
  $_SESSION['message_error'] = "You are not permited to see this page this way: url error";
  header('location: error.php');
}